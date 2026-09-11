<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\ClassTiming;
use App\Models\Assignment;
use App\Models\AssignmentHasSubmit;
use App\Models\Attendance;
use App\Models\HasMarkAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class DashboardController extends Controller
{
    function index (){
        $teachersCount = Teacher::count();
        $studentsCount = Student::count();
        $classesCount = ClassModel::count();
        $assignmentsCount = Assignment::count();
        $submissionsCount = AssignmentHasSubmit::whereNotNull('assignment_file')->count();

        $submissionsThisWeek = AssignmentHasSubmit::whereNotNull('assignment_file')
            ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->count();

        $submissionsLastWeek = AssignmentHasSubmit::whereNotNull('assignment_file')
            ->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])
            ->count();

        $submissionsTrend = $submissionsLastWeek > 0
            ? round((($submissionsThisWeek - $submissionsLastWeek) / $submissionsLastWeek) * 100, 1)
            : null;

        $attendanceThisWeek = HasMarkAttendance::whereHas('attendance', function ($query) {
            $query->whereBetween('mark_date', [now()->startOfWeek(), now()->endOfWeek()]);
        });

        $attendanceRateThisWeek = (clone $attendanceThisWeek)->count() > 0
            ? round(((clone $attendanceThisWeek)->where('mark_status', 'present')->count() / (clone $attendanceThisWeek)->count()) * 100, 1)
            : null;

        $attendanceLastWeek = HasMarkAttendance::whereHas('attendance', function ($query) {
            $query->whereBetween('mark_date', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
        });

        $attendanceRateLastWeek = (clone $attendanceLastWeek)->count() > 0
            ? round(((clone $attendanceLastWeek)->where('mark_status', 'present')->count() / (clone $attendanceLastWeek)->count()) * 100, 1)
            : null;

        $allAttendanceRecords = HasMarkAttendance::count();
        $presentAttendanceRecords = HasMarkAttendance::where('mark_status', 'present')->count();
        $attendanceRate = $allAttendanceRecords > 0
            ? round(($presentAttendanceRecords / $allAttendanceRecords) * 100, 1)
            : 0;

        $attendanceTrend = ($attendanceRateThisWeek !== null && $attendanceRateLastWeek !== null)
            ? round($attendanceRateThisWeek - $attendanceRateLastWeek, 1)
            : null;

        $recentAssignments = Assignment::with('classTiming')
            ->latest('id')
            ->take(4)
            ->get();

        $recentSubmissions = AssignmentHasSubmit::with(['student', 'assignment'])
            ->latest('created_at')
            ->take(5)
            ->get();

        $recentAttendance = Attendance::latest('mark_date')
            ->take(5)
            ->get();

        $activityTimeline = collect();

        foreach ($recentSubmissions as $submission) {
            $activityTimeline->push([
                'title' => trim(($submission->student->full_name ?? 'A student') . ' ' . ($submission->student->last_name ?? '')) . ' submitted ' . ($submission->assignment->assignment_title ?? 'an assignment'),
                'time' => $submission->created_at,
                'color' => 'green',
            ]);
        }

        foreach ($recentAttendance as $attendance) {
            $activityTimeline->push([
                'title' => 'Attendance recorded for batch ' . $attendance->batch_code,
                'time' => $attendance->mark_date,
                'color' => 'blue',
            ]);
        }

        $activityTimeline = $activityTimeline
            ->sortByDesc(fn ($item) => $item['time'])
            ->take(5)
            ->values();

        return view('Backend_theme.dashboard', compact(
            'teachersCount',
            'studentsCount',
            'classesCount',
            'assignmentsCount',
            'submissionsCount',
            'submissionsTrend',
            'attendanceRate',
            'attendanceTrend',
            'recentAssignments',
            'activityTimeline'
        ));
    }

    function teacher (Request $request){
        $query = Teacher::latest();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'LIKE', "%{$search}%")
                    ->orWhere('last_name', 'LIKE', "%{$search}%")
                    ->orWhere('cnic', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('contact_number', 'LIKE', "%{$search}%");
            });
        }

        $teachers = $query->get();

        return view('backend_theme.teacher.teachers', compact('teachers'));
    }

    function teacher_edit ($id){
        $teacher = Teacher::findOrFail($id);
        return view('backend_theme.teacher.teacher-edit', compact('teacher'));
    }

    function teacher_view ($id){
        $teacher = Teacher::findOrFail($id);
        return view('backend_theme.teacher.teacher-view', compact('teacher'));
    }

    function teacher_add (){
        return view('backend_theme.teacher.teacher-add');
    }

    function teacher_store (Request $request){
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:teacher,email',
            'contact_number' => 'required|string|max:50',
            'address' => 'nullable|string',
            'cnic' => 'required|string|unique:teacher,cnic',
            'gender' => 'required|in:male,female,other',
            'salary' => 'required|numeric',
            'profile_img' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('profile_img')) {
            $data['profile_img'] = $request->file('profile_img')->store('teachers', 'public');
        }

        Teacher::create($data);

        return redirect()->route('teacher')->with('success', 'Teacher added successfully.');
    }

    function teacher_update (Request $request, $id){
        $teacher = Teacher::findOrFail($id);

        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:teacher,email,' . $teacher->id,
            'contact_number' => 'required|string|max:50',
            'address' => 'nullable|string',
            'cnic' => 'required|string|unique:teacher,cnic,' . $teacher->id,
            'gender' => 'required|in:male,female,other',
            'salary' => 'required|numeric',
            'profile_img' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('profile_img')) {
            $data['profile_img'] = $request->file('profile_img')->store('teachers', 'public');
        }

        $teacher->update($data);

        return redirect()->route('teacher')->with('success', 'Teacher updated successfully.');
    }

    function teacher_destroy ($id){
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teacher')->with('success', 'Teacher deleted successfully.');
    }

    function student (Request $request){
        $query = Student::with('class')->latest();

        if ($request->filled('class_id')) {
            $query->where('class_id', $request->class_id);
        }

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'LIKE', "%{$search}%")
                    ->orWhere('last_name', 'LIKE', "%{$search}%")
                    ->orWhere('cnic', 'LIKE', "%{$search}%")
                    ->orWhere('batch_code', 'LIKE', "%{$search}%")
                    ->orWhere('contact_number', 'LIKE', "%{$search}%");
            });
        }

        $students = $query->get();
        $classes = ClassModel::all();

        return view('backend_theme.student.students', compact('students', 'classes'));
    }

    function student_edit ($id){
        $student = Student::findOrFail($id);
        $classes = ClassModel::all();
        return view('backend_theme.student.student-edit', compact('student', 'classes'));
    }

    function student_view ($id){
        $student = Student::with('class')->findOrFail($id);
        return view('backend_theme.student.student-view', compact('student'));
    }

    function student_add (){
        $classes = ClassModel::all();
        return view('backend_theme.student.student-add', compact('classes'));
    }

    function student_store (Request $request){
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'class_id' => 'required|exists:class,id',
            'batch_code' => 'required|string|max:50',
            'father_name' => 'required|string|max:255',
            'cnic' => 'required|string|unique:student,cnic',
            'gender' => 'required|in:male,female,other',
            'dob' => 'required|date',
            'contact_number' => 'required|string|max:50',
            'email_address' => 'nullable|email',
            'address' => 'nullable|string',
            'emergency_contact' => 'required|string|max:50',
        ]);

        $data['password'] = Hash::make($request->cnic);

        Student::create($data);

        return redirect()->route('student')->with('success', 'Student added successfully.');
    }

    function student_update (Request $request, $id){
        $student = Student::findOrFail($id);

        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'class_id' => 'required|exists:class,id',
            'batch_code' => 'required|string|max:50',
            'father_name' => 'required|string|max:255',
            'cnic' => 'required|string|unique:student,cnic,' . $student->id,
            'gender' => 'required|in:male,female,other',
            'dob' => 'required|date',
            'contact_number' => 'required|string|max:50',
            'email_address' => 'nullable|email',
            'address' => 'nullable|string',
            'emergency_contact' => 'required|string|max:50',
        ]);

        $student->update($data);

        return redirect()->route('student')->with('success', 'Student updated successfully.');
    }

    function student_destroy ($id){
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('student')->with('success', 'Student deleted successfully.');
    }
    function attendance (){
        return view('backend_theme.attendance.attendance');
    }
    function attendance_edit (){
        return view('backend_theme.attendance.attendance-edit');
    }
    function attendance_add (){
        return view('backend_theme.attendance.attendance-mark');
    }
    function assignment (){
        return view('backend_theme.assignment.assignments');
    }
    function assignment_edit (){
        return view('backend_theme.assignment.assignment-edit');
    }
function assignment_add()
{
    $classes = ClassModel::orderBy('class_name')
        ->get();

    return view(
        'backend_theme.assignment.assignment-add',
        compact('classes')
    );
}
    function submission (){
        return view('backend_theme.submission.submissions');
    }
    function submission_grade (){
        return view('backend_theme.submission.submission-grade');
    }
}