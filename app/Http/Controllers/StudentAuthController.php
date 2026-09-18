<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
class StudentAuthController extends Controller
{

    public function showLogin()
    {
        return view('Frontend_theme.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $student  = Student::where('email_address', $request->email)->first();

        if (!$student) {
            return back()
                ->withErrors([
                    'email' => 'Student email not found.',
                ])
                ->withInput();
        };

        Auth::guard('student')->login($student);

        $request->session()->regenerate();

        return redirect()->route('index');
    }

    public function showRegister()
    {
        return view('Frontend_theme.register');
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('index');
    }


   public function join(Request $request)
{
    $request->validate([
        'class_code' => 'required',
    ]);

    if (!Auth::guard('student')->check()) {
        return redirect()->route('student.login');
    }

    $student = Auth::guard('student')->user();

    $classCode = strtoupper(trim($request->class_code));

    $class = ClassModel::whereRaw(
        'UPPER(TRIM(class_code)) = ?',
        [$classCode]
    )->first();

    if (!$class) {
        return back()
            ->withErrors([
                'class_code' => 'Invalid class code. Please check the code and try again.',
            ])
            ->withInput();
    }

    if ($student->class_id != $class->id) {
        return back()
            ->withErrors([
                'class_code' => 'This class is not assigned to your account.',
            ])
            ->withInput();
    }

    Cookie::queue(
        'joined_class_code',
        $class->class_code,
        60 * 24 * 30
    );

    return redirect()->route('steam');
}

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('student.login');
    }
}
