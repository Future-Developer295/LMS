<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentAuthController extends Controller
{
    /**
     * Show student login page.
     */
    public function showLogin()
    {
        return view('frontend_theme.login');
    }

    /**
     * Handle student login.
     */
 public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    $student = \App\Models\Student::where(
        'email_address',
        $credentials['email']
    )->first();

    if ($student && \Hash::check($credentials['password'], $student->password)) {

        \Auth::login($student, $request->boolean('remember'));

        $request->session()->regenerate();

        return redirect()->route('index');
    }

    return back()->withErrors([
        'email' => 'The provided email or password is incorrect.',
    ])->onlyInput('email');
}

    /**
     * Handle student logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('student.login');
    }
}