<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassModel;
use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    public function store(Request $request)
{
    $student = auth()->user()->student;

    $request->validate([
        'full_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'cnic' => ['required', 'string', 'max:255', 'unique:student,cnic,' . ($student->id ?? 'NULL')],
        'gender' => ['required', 'in:male,female,other'],
        'dob' => ['required', 'date'],
        'father_name' => ['required', 'string', 'max:255'],
        'batch_code' => ['required', 'string', 'max:255'],
        'contact_number' => ['required', 'string', 'max:255'],
        'address' => ['nullable', 'string'],
    ]);

    if ($student) {

        $student->update([
            'full_name' => $request->full_name,
            'last_name' => $request->last_name,
            'cnic' => $request->cnic,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'father_name' => $request->father_name,
            'batch_code' => $request->batch_code,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
        ]);

    } else {

        Student::create([
            'user_id' => auth()->id(),
            'full_name' => $request->full_name,
            'last_name' => $request->last_name,
            'cnic' => $request->cnic,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'father_name' => $request->father_name,
            'batch_code' => $request->batch_code,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
        ]);
    }

    return redirect()
        ->route('student.profile')
        ->with('success', 'Student profile saved successfully.');
}
    public function joinClass(Request $request)
{
    $request->validate([
        'class_code' => ['required', 'string', 'max:8', 'alpha_num'],
    ]);

    $class = ClassModel::where('class_code', strtoupper($request->class_code))
        ->first();

    if (!$class) {
        return back()->withErrors([
            'class_code' => 'Invalid class code.'
        ]);
    }

    $student = auth()->user()->student;

    if (!$student) {
        return back()->withErrors([
            'class_code' => 'Please complete your student profile first.'
        ]);
    }

    $student->enrolledClasses()->syncWithoutDetaching([
        $class->id => [
            'joined_at' => now()
        ]
    ]);

    return back()->with('success', 'Class joined successfully.');
}
}