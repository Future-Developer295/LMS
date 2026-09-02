<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Attendance;
use App\Models\HasMarkAttendance;

class FrontendController extends Controller
{
    function index()
    {
        return view('frontend_theme.index');
    }

    public function class()
{
    $student = auth()->user()->student;

    $submissions = collect();

    if ($student) {
        $submissions = \App\Models\AssignmentHasSubmit::with('assignment')
            ->where('student_id', $student->id)
            ->get();
    }

    return view(
        'frontend_theme.class',
        compact('submissions')
    );
}

    function calendar()
    {
        return view('frontend_theme.calendar');
    }
    public function attendance()
    {
        $student = auth()->user()->student;

        $attendance = collect();

        if ($student) {
            $attendance = HasMarkAttendance::with('attendance')
                ->where('student_id', $student->id)
                ->get();
        }

        return view(
            'frontend_theme.attendance',
            compact('attendance')
        );
    }

    function classwork()
    {
        $student = auth()->user()->student;

        $classes = $student
            ? $student->enrolledClasses()->with('teacher')->get()
            : collect();

        $assignments = collect();

        if ($student) {
            $classTimingIds = $classes->pluck('class_timing')->filter()->unique()->values();

            $assignments = Assignment::with([
                'submissions' => function ($query) use ($student) {
                    $query->where('student_id', $student->id);
                }
            ])->whereIn(
                'class_timing_id',
                $classTimingIds
            )->get();
        }

        return view(
            'frontend_theme.classwork',
            compact('classes', 'assignments')
        );
    }
    public function submitAssignment(Request $request)
{
    $request->validate([
        'assignment_id' => ['required', 'exists:assignment,id'],
        'assignment_file' => ['required', 'string'],
        'assignment_remark' => ['nullable', 'string'],
    ]);

    $student = auth()->user()->student;

    if (!$student) {
        return back()->withErrors([
            'assignment_file' => 'Please complete your student profile first.'
        ]);
    }

    \App\Models\AssignmentHasSubmit::updateOrCreate(
        [
            'assignment_id' => $request->assignment_id,
            'student_id' => $student->id,
        ],
        [
            'assignment_file' => $request->assignment_file,
            'assignment_remark' => $request->assignment_remark,
        ]
    );

    return back()->with('success', 'Assignment submitted successfully.');
}

    function detail()
    {
        return view('frontend_theme.classwork-detail');
    }

    function archived()
    {
        return view('frontend_theme.archived');
    }

    function steam()
    {
        return view('frontend_theme.steam');
    }

    function people()
    {
        return view('frontend_theme.people');
    }
}
