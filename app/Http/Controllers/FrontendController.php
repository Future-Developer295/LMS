<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassModel;
use App\Models\ClassStudent;
use App\Models\Assignment;
use App\Models\Announcement;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    function index()
    {
       $user = Auth::user();

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
       $user = Auth::user();

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

    /**
     * Classwork stream, grouped by topic, for the logged-in student's class.
     */
    function classwork()
    {
        $user = Auth::user();

        $student = null;
        $topics = collect();

        if ($user) {

            $student = Student::where(
                'email_address',
                $user->email ?? $user->email_address
            )->first();

            if ($student && $student->class_id) {

                $topics = Topic::where('class_id', $student->class_id)
                    ->orderBy('order')
                    ->with([
                        'assignments' => function ($query) use ($student) {
                            $query->with([
                                'submissions' => function ($q) use ($student) {
                                    $q->where('student_id', $student->id);
                                }
                            ]);
                        }
                    ])
                    ->get();
            }
        }

        return view(
            'frontend_theme.classwork',
            compact('topics', 'student')
        );
    }

    public function detail(Request $request, int $assignment)
    {
        $assignment = Assignment::with('classTiming')
            ->findOrFail($assignment);

        return view(
            'frontend_theme.classwork-detail',
            compact('assignment')
        );
    }

    function archived()
    {
        return view('frontend_theme.archived');
    }

    function steam()
    {
        $user = auth()->user();

        $student = null;
        $joinedClass = null;
        $feed = collect();
        $upcoming = collect();

        if ($user) {
            $student = Student::where(
                'email_address',
                $user->email ?? $user->email_address
            )->first();

            $joinedClassCode = session('joined_class_code');

            if ($joinedClassCode) {
                $joinedClass = ClassModel::with('teacher')
                    ->whereRaw('UPPER(TRIM(class_code)) = ?', [strtoupper(trim($joinedClassCode))])
                    ->first();
            }

            if ($joinedClass) {
                $assignments = Assignment::with([
                    'submissions' => function ($query) use ($student) {
                        if ($student) {
                            $query->where('student_id', $student->id);
                        }
                    }
                ])
                ->where('class_timing_id', $joinedClass->class_timing)
                ->latest('id')
                ->get();

                $upcoming = $assignments->filter(function ($assignment) {
                    $notSubmitted = $assignment->submissions->isEmpty();
                    $notPastDue = !$assignment->assignment_due_date || $assignment->assignment_due_date->isFuture();
                    return $notSubmitted && $notPastDue;
                })->sortBy('assignment_due_date')->take(5)->values();

                $announcements = Announcement::with('user')
                    ->where('class_id', $joinedClass->id)
                    ->latest('created_at')
                    ->get();

                foreach ($assignments as $assignment) {
                    $feed->push([
                        'type' => 'assignment',
                        'data' => $assignment,
                        'sort_time' => $assignment->created_at,
                    ]);
                }

                foreach ($announcements as $announcement) {
                    $feed->push([
                        'type' => 'announcement',
                        'data' => $announcement,
                        'sort_time' => $announcement->created_at,
                    ]);
                }

                $feed = $feed->sortByDesc(function ($item) {
                    return $item['sort_time'] ?? \Illuminate\Support\Carbon::createFromTimestamp(0);
                })->values();
            }
        }

        return view(
            'frontend_theme.steam',
            compact('joinedClass', 'feed', 'upcoming', 'user')
        );
    }

    function people()
    {
        $classmates = collect();
        $teacher = null;

        $classCode = session('joined_class_code');

        if ($classCode) {

            $class = ClassModel::with('teacher')
                ->where('class_code', $classCode)
                ->first();

            if ($class) {

                $teacher = $class->teacher;

                $classmates = Student::where(
                    'class_id',
                    $class->id
                )->get();
            }
        }

        return view(
            'frontend_theme.people',
            compact('classmates', 'teacher')
        );
    }
}