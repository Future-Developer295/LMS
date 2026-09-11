<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassModel;
use App\Models\Assignment;
use Illuminate\Http\Request;
class FrontendController extends Controller
{
    function index()
    {
        $user = auth()->user();

        $student = null;

        if ($user) {
            $student = Student::where(
                'email_address',
                $user->email ?? $user->email_address
            )->first();
        }

        return view('frontend_theme.index', compact('student'));
    }

function class()
{
    $user = auth()->user();

    $student = null;
    $classes = collect();
    $assignments = collect();
    $overallGrade = 0;

    if ($user) {

        $student = Student::where(
            'email_address',
            $user->email ?? $user->email_address
        )->first();

        if ($student && $student->class_id) {

            $class = ClassModel::with(['timing', 'day'])
                ->find($student->class_id);

            if ($class) {

                $classes = collect([$class]);

                $assignments = Assignment::with([
                    'submissions' => function ($query) use ($student) {
                        $query->where('student_id', $student->id);
                    }
                ])
                ->where(
                    'class_timing_id',
                    $class->class_timing
                )
                ->get();
            }
        }
    }

    // Overall Grade Calculation
    $totalMarks = 0;
    $earnedMarks = 0;

    foreach ($assignments as $assignment) {

        $submission = $assignment->submissions->first();

        if ($submission && $submission->grade !== null) {

            $totalMarks += $assignment->assignment_marks;
            $earnedMarks += $submission->grade;
        }
    }

    if ($totalMarks > 0) {

        $overallGrade = round(
            ($earnedMarks / $totalMarks) * 100
        );
    }

    return view(
        'frontend_theme.class',
        compact(
            'classes',
            'assignments',
            'student',
            'overallGrade'
        )
    );
}

    function calendar()
    {
        return view('frontend_theme.calendar');
    }

    function classwork()
    {
        return view('frontend_theme.classwork');
    }

    public function detail(Request $request)
    {
        $assignment = Assignment::with('classTiming')
            ->findOrFail($request->id);

        return view('frontend_theme.classwork-detail', compact('assignment'));
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

