<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentRegisterController extends Controller
{
    /**
     * Show student signup page.
     */
    public function showRegister()
    {
        return view('frontend_theme.register');
    }

    /**
     * Handle student signup.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        // Create normal Laravel user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'user',
        ]);

        // Create student record
        Student::create([
            'full_name' => $validated['name'],
            'last_name' => '',
            'email_address' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'batch_code' => 'N/A',
        ]);

        return redirect()
            ->route('student.login')
            ->with('success', 'Account created successfully. Please login.');
    }
}