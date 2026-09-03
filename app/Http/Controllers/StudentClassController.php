<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ClassStudent;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function joinClass(Request $request)
    {
        $request->validate([
            'class_code' => ['required', 'string'],
        ]);

        $class = ClassModel::where(
            'class_code',
            $request->class_code
        )->first();

        if (!$class) {
            return back()->withErrors([
                'class_code' => 'Invalid class code.',
            ]);
        }

        // Logged-in user
        $user = auth()->user();

        // Find student
        $student = Student::where(
            'email_address',
            $user->email ?? $user->email_address
        )->first();

        if (!$student) {
            return back()->withErrors([
                'class_code' => 'Student profile not found.',
            ]);
        }

        // Check already joined
        $alreadyJoined = ClassStudent::where('class_id', $class->id)
            ->where('student_id', $student->id)
            ->exists();

        if ($alreadyJoined) {
            return back()->withErrors([
                'class_code' => 'You have already joined this class.',
            ]);
        }

        // Save enrollment
        ClassStudent::create([
            'class_id' => $class->id,
            'student_id' => $student->id,
            'joined_at' => now(),
        ]);

        return back()->with(
            'success',
            'Class joined successfully.'
        );
    }
}