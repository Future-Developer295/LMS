<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\HasMarkAttendance;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Attendance listing
     */
    public function index(Request $request)
    {
        $query = Attendance::with('studentAttendance.student.class.teacher')
            ->withCount('studentAttendance');

        if ($request->filled('date_filter')) {
            switch ($request->date_filter) {
                case 'today':
                    $query->whereDate('mark_date', today());
                    break;
                case 'yesterday':
                    $query->whereDate('mark_date', today()->subDay());
                    break;
                case 'week':
                    $query->whereBetween('mark_date', [now()->startOfWeek(), now()->endOfWeek()]);
                    break;
            }
        }

        if ($request->filled('class_filter')) {
            $query->where('batch_code', $request->class_filter);
        }

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('batch_code', 'LIKE', "%{$search}%")
                    ->orWhereHas('studentAttendance.student.class.teacher', function ($teacherQuery) use ($search) {
                        $teacherQuery->where('full_name', 'LIKE', "%{$search}%")
                            ->orWhere('last_name', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('studentAttendance.student.class', function ($classQuery) use ($search) {
                        $classQuery->where('class_name', 'LIKE', "%{$search}%");
                    });
            });
        }

        $attendances = $query->orderByDesc('mark_date')->paginate(10)->withQueryString();

        $completedLogs = Attendance::whereDate('mark_date', today())->count();

        $allAttendanceRecords = HasMarkAttendance::whereHas('attendance')->count();
        $presentRecords = HasMarkAttendance::where('mark_status', 'present')->count();

        $averageAttendance = $allAttendanceRecords > 0
            ? round(($presentRecords / $allAttendanceRecords) * 100, 1)
            : 0;

        $allBatches = Student::select('batch_code')->distinct()->pluck('batch_code');

        $todayRecordedBatches = Attendance::whereDate('mark_date', today())
            ->pluck('batch_code')
            ->unique();

        $pendingLogs = $allBatches->diff($todayRecordedBatches)->count();

        $batches = Student::select('batch_code')
            ->whereNotNull('batch_code')
            ->distinct()
            ->orderBy('batch_code')
            ->pluck('batch_code');

        return view('backend_theme.attendance.attendance', compact(
            'attendances',
            'averageAttendance',
            'pendingLogs',
            'completedLogs',
            'batches'
        ));
    }

    /**
     * Show attendance marking page
     */
    public function create()
    {
        $batches = Student::select('batch_code', 'class_id')
            ->with('class:id,class_name')
            ->whereNotNull('batch_code')
            ->distinct()
            ->orderBy('batch_code')
            ->get();

        return view('backend_theme.attendance.attendance-mark', compact('batches'));
    }

    /**
     * Get students according to batch
     */
    public function studentsByBatch(string $batch_code)
    {
        $students = Student::where('batch_code', $batch_code)
            ->select('id', 'full_name', 'last_name')
            ->orderBy('full_name')
            ->get();

        return response()->json($students);
    }

    /**
     * Store attendance
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'batch_code'              => ['required', 'string', 'exists:student,batch_code'],
            'mark_date'               => ['required', 'date'],
            'statuses'                => ['required', 'array', 'min:1'],
            'statuses.*.student_id'   => ['required', 'exists:student,id'],
            'statuses.*.mark_status'  => ['required', 'in:present,absent,late,leave'],
        ]);

        $alreadyMarked = Attendance::where('batch_code', $validated['batch_code'])
            ->whereDate('mark_date', $validated['mark_date'])
            ->exists();

        if ($alreadyMarked) {
            return back()
                ->withErrors(['mark_date' => 'Attendance for this batch and date has already been recorded.'])
                ->withInput();
        }

        $attendance = Attendance::create([
            'batch_code' => $validated['batch_code'],
            'mark_date'  => $validated['mark_date'],
        ]);

        foreach ($validated['statuses'] as $status) {
            $attendance->studentAttendance()->create([
                'student_id'  => $status['student_id'],
                'mark_status' => $status['mark_status'],
            ]);
        }

        return redirect()->route('attendance')->with('success', 'Attendance recorded successfully.');
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
     * Update attendance
     */
    public function update(Request $request, Attendance $attendance)
    {
        $validated = $request->validate([
            'mark_date'               => ['required', 'date'],
            'statuses'                => ['required', 'array', 'min:1'],
            'statuses.*.id'           => ['required', 'exists:has_mark_attendance,id'],
            'statuses.*.mark_status'  => ['required', 'in:present,absent,late,leave'],
        ]);

        $duplicate = Attendance::where('batch_code', $attendance->batch_code)
            ->whereDate('mark_date', $validated['mark_date'])
            ->where('id', '!=', $attendance->id)
            ->exists();

        if ($duplicate) {
            return back()
                ->withErrors(['mark_date' => 'Attendance already exists for this batch and date.'])
                ->withInput();
        }

        $attendance->update(['mark_date' => $validated['mark_date']]);

        foreach ($validated['statuses'] as $status) {
            HasMarkAttendance::where('id', $status['id'])
                ->where('attendance_id', $attendance->id)
                ->update(['mark_status' => $status['mark_status']]);
        }

        return redirect()->route('attendance')->with('success', 'Attendance updated successfully.');
    }

    /**
     * Show attendance details
     */
    public function show(Attendance $attendance)
    {
        $attendance->load('studentAttendance.student');

        return view('backend_theme.attendance.attendance-view', compact('attendance'));
    }

    /**
     * Delete attendance
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return redirect()->route('attendance')->with('success', 'Attendance log deleted successfully.');
    }
}