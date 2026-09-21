<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\HasMarkAttendance;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AttendanceController extends Controller
{
    private const STATUSES = ['present', 'absent', 'late', 'leave'];

    /**
     * Attendance home: one row per class / batch with its all-time summary.
     */
    public function index(Request $request)
    {
        $studentsByBatch = Student::with('class.teacher')
            ->whereNotNull('batch_code')
            ->get()
            ->groupBy('batch_code');


        $attendances = Attendance::withCount([
            'studentAttendance as total_count',
            'studentAttendance as present_count' => fn($q) => $q->markedAs('present'),
        ])->get()->groupBy('batch_code');

        $batches = $studentsByBatch
            ->map(function ($group, $code) use ($attendances) {
                $class = $group->first()->class;
                $logs = $attendances->get($code, collect());

                $total = $logs->sum('total_count');
                $present = $logs->sum('present_count');

                return (object) [
                    'batch_code'   => $code,
                    'class_name'   => $class->class_name ?? 'Unknown Class',
                    'teacher'      => trim(($class?->teacher?->full_name ?? '') . ' ' . ($class?->teacher?->last_name ?? '')),
                    'students'     => $group->count(),
                    'sessions'     => $logs->count(),
                    'last_marked'  => $logs->max('mark_date'),
                    'percentage'   => $total > 0 ? round(($present / $total) * 100, 1) : null,
                    'marked_today' => $logs->contains(fn($log) => $log->mark_date->isToday()),
                ];
            })
            ->sortBy('batch_code')
            ->values();

        $totalMarks = $attendances->sum(fn($logs) => $logs->sum('total_count'));
        $presentMarks = $attendances->sum(fn($logs) => $logs->sum('present_count'));

        $averageAttendance = $totalMarks > 0
            ? round(($presentMarks / $totalMarks) * 100, 1)
            : 0;

        $completedLogs = $batches->where('marked_today', true)->count();
        $pendingLogs = $batches->count() - $completedLogs;

        if ($request->filled('search')) {
            $search = strtolower($request->search);

            $batches = $batches
                ->filter(fn($b) => str_contains(
                    strtolower($b->batch_code . ' ' . $b->class_name . ' ' . $b->teacher),
                    $search
                ))
                ->values();
        }

        return view('backend_theme.attendance.attendance', compact(
            'batches',
            'averageAttendance',
            'pendingLogs',
            'completedLogs'
        ));
    }

    /**
     * Class register: every student x every date, plus all-time totals.
     */
    public function register(Request $request, string $batch_code)
    {
        $request->validate([
            'month' => ['nullable', 'date_format:Y-m'],
            'range' => ['nullable', 'in:month,all'],
        ]);

      
        $counts = [
            'attendanceRecords as total_count' => fn($q) => $q->inBatch($batch_code),
        ];

        foreach (self::STATUSES as $status) {
            $counts["attendanceRecords as {$status}_count"] = fn($q) => $q->inBatch($batch_code)->markedAs($status);
        }

        $students = Student::with('class.teacher')
            ->withCount($counts)
            ->where('batch_code', $batch_code)
            ->orderBy('full_name')
            ->get();

        abort_if($students->isEmpty(), 404);

        $class = $students->first()->class;

        $range = $request->query('range', 'month');
        $month = Carbon::createFromFormat('!Y-m', $request->query('month', now()->format('Y-m')));

        $logsQuery = Attendance::with('studentAttendance')
            ->where('batch_code', $batch_code)
            ->orderBy('mark_date');

        if ($range === 'month') {
            $logsQuery->whereBetween('mark_date', [
                $month->copy()->startOfMonth()->toDateString(),
                $month->copy()->endOfMonth()->toDateString(),
            ]);
        }

        $logs = $logsQuery->get();

        // $matrix[student_id][attendance_id] = status
        $matrix = [];
        foreach ($logs as $log) {
            foreach ($log->studentAttendance as $mark) {
                $matrix[$mark->student_id][$log->id] = $mark->mark_status;
            }
        }

        $totalSessions = Attendance::where('batch_code', $batch_code)->count();

        $overallTotal = $students->sum('total_count');
        $overallPercentage = $overallTotal > 0
            ? round(($students->sum('present_count') / $overallTotal) * 100, 1)
            : 0;

        $todayLog = Attendance::where('batch_code', $batch_code)
            ->whereDate('mark_date', today())
            ->first();

        return view('backend_theme.attendance.attendance-register', compact(
            'batch_code',
            'class',
            'students',
            'logs',
            'matrix',
            'range',
            'month',
            'totalSessions',
            'overallPercentage',
            'todayLog'
        ));
    }

    /**
     * Mark attendance page. Pick a batch + date via GET, the students are rendered by Blade.
     */
    public function create(Request $request)
    {
        $request->validate([
            'batch_code' => ['nullable', 'string', 'exists:student,batch_code'],
            'mark_date'  => ['nullable', 'date', 'before_or_equal:today'],
        ]);

        $batches = Student::select('batch_code', 'class_id')
            ->with('class:id,class_name')
            ->whereNotNull('batch_code')
            ->distinct()
            ->orderBy('batch_code')
            ->get();

        $selectedBatch = $request->query('batch_code');
        $selectedDate = $request->query('mark_date', today()->toDateString());

        $students = collect();
        $attendance = null;
        $saved = collect();

        if ($selectedBatch) {
            $students = Student::where('batch_code', $selectedBatch)
                ->select('id', 'full_name', 'last_name')
                ->orderBy('full_name')
                ->get();

            $attendance = Attendance::where('batch_code', $selectedBatch)
                ->whereDate('mark_date', $selectedDate)
                ->first();

            if ($attendance) {
                $saved = $attendance->studentAttendance()->pluck('mark_status', 'student_id');
            }
        }

        return view('backend_theme.attendance.attendance-mark', compact(
            'batches',
            'selectedBatch',
            'selectedDate',
            'students',
            'attendance',
            'saved'
        ));
    }

    /**
     * Store attendance. One log per batch + date: saving again updates it.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'batch_code'             => ['required', 'string', 'exists:student,batch_code'],
            'mark_date'              => ['required', 'date', 'before_or_equal:today'],
            'statuses'               => ['required', 'array', 'min:1'],
            'statuses.*.student_id'  => [
                'required',
                Rule::exists('student', 'id')->where('batch_code', $request->input('batch_code')),
            ],
            'statuses.*.mark_status' => ['required', 'in:present,absent,late,leave'],
        ]);

        $existed = false;

        // Transaction wrapper only, so a half-saved register can't happen. Every query inside is Eloquent.
        DB::transaction(function () use ($validated, &$existed) {
            $attendance = Attendance::firstOrCreate([
                'batch_code' => $validated['batch_code'],
                'mark_date'  => $validated['mark_date'],
            ]);

            $existed = !$attendance->wasRecentlyCreated;

            foreach ($validated['statuses'] as $status) {
                $attendance->studentAttendance()->updateOrCreate(
                    ['student_id' => $status['student_id']],
                    ['mark_status' => $status['mark_status']]
                );
            }
        });

        return redirect()
            ->route('attendance_register', [
                'batch_code' => $validated['batch_code'],
                'month'      => Carbon::parse($validated['mark_date'])->format('Y-m'),
            ])
            ->with('success', $existed
                ? 'Attendance updated successfully.'
                : 'Attendance recorded successfully.');
    }

    /**
     * Edit attendance
     */
    public function edit(Attendance $attendance)
    {
        $attendance->load('studentAttendance.student');

        return view('backend_theme.attendance.attendance-edit', compact('attendance'));
    }

    /**
     * Update attendance statuses (the date is not editable)
     */
    public function update(Request $request, Attendance $attendance)
    {
        $validated = $request->validate([
            'statuses'               => ['required', 'array', 'min:1'],
            'statuses.*.id'          => ['required', 'exists:has_mark_attendance,id'],
            'statuses.*.mark_status' => ['required', 'in:present,absent,late,leave'],
        ]);

        foreach ($validated['statuses'] as $status) {
            HasMarkAttendance::where('id', $status['id'])
                ->where('attendance_id', $attendance->id)
                ->update(['mark_status' => $status['mark_status']]);
        }

        return redirect()
            ->route('attendance_register', [
                'batch_code' => $attendance->batch_code,
                'month'      => $attendance->mark_date->format('Y-m'),
            ])
            ->with('success', 'Attendance updated successfully.');
    }

    /**
     * Show attendance details, with links to the previous / next log of the same batch
     */
    public function show(Attendance $attendance)
    {
        $attendance->load('studentAttendance.student');

        $date = $attendance->mark_date->toDateString();

        $previous = Attendance::where('batch_code', $attendance->batch_code)
            ->where('mark_date', '<', $date)
            ->orderByDesc('mark_date')
            ->first();

        $next = Attendance::where('batch_code', $attendance->batch_code)
            ->where('mark_date', '>', $date)
            ->orderBy('mark_date')
            ->first();

        return view('backend_theme.attendance.attendance-view', compact('attendance', 'previous', 'next'));
    }

    /**
     * Delete attendance
     */
    public function destroy(Attendance $attendance)
    {
        $batch = $attendance->batch_code;
        $month = $attendance->mark_date->format('Y-m');

        $attendance->delete();

        return redirect()
            ->route('attendance_register', ['batch_code' => $batch, 'month' => $month])
            ->with('success', 'Attendance log deleted successfully.');
    }
}