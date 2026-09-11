<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)
            ->where('role', 'user')
            ->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()
                ->withErrors([
                    'email' => 'Invalid student email or password.',
                ])
                ->withInput($request->only('email'));
        }

        Auth::login($user);

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

        if (!Auth::check()) {
            return redirect()->route('student.login');
        }

        $classCode = strtoupper(trim($request->class_code));

        $class = ClassModel::with('teacher')
            ->where('class_code', $classCode)
            ->first();

        if (!$class) {
            return back()
                ->withErrors([
                    'class_code' => 'Invalid class code. Please check the code and try again.',
                ])
                ->withInput();
        }

        $user = Auth::user();

        $student = Student::firstOrNew(['email_address' => $user->email]);
        $student->full_name = $student->full_name ?: $user->name;
        $student->class_id = $class->id;
        $student->batch_code = $student->batch_code ?: $class->class_code;
        $student->password = $student->password ?: $user->password;
        $student->save();

        $request->session()->put('joined_class_code', $class->class_code);
        $request->session()->save();

        return redirect()->route('index');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('student.login');
    }
}