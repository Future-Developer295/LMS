<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassModel;
use App\Models\ClassStudent;
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
        return view('frontend_theme.class');
    }

    function calendar()
    {
        return view('frontend_theme.calendar');
    }

    function classwork()
    {
        return view('frontend_theme.classwork');
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
