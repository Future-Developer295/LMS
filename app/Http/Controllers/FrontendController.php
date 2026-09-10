<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Assignment;
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

