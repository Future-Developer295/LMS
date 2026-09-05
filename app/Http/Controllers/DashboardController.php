<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    function index (){
        return view('Backend_theme.dashboard');
    }

    function teacher (){
        $teachers = Teacher::latest()->get();
        return view('backend_theme.teacher.teachers', compact('teachers'));
    }

    function teacher_edit ($id){
        $teacher = Teacher::findOrFail($id);
        return view('backend_theme.teacher.teacher-edit', compact('teacher'));
    }

    function teacher_view ($id){
        $teacher = Teacher::findOrFail($id);
        return view('backend_theme.teacher.teacher-view', compact('teacher'));
    }

    function teacher_add (){
        return view('backend_theme.teacher.teacher-add');
    }

    function teacher_store (Request $request){
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:teacher,email',
            'contact_number' => 'required|string|max:50',
            'address' => 'nullable|string',
            'cnic' => 'required|string|unique:teacher,cnic',
            'gender' => 'required|in:male,female,other',
            'salary' => 'required|numeric',
            'profile_img' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('profile_img')) {
            $data['profile_img'] = $request->file('profile_img')->store('teachers', 'public');
        }

        Teacher::create($data);

        return redirect()->route('teacher')->with('success', 'Teacher added successfully.');
    }

    function teacher_update (Request $request, $id){
        $teacher = Teacher::findOrFail($id);

        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:teacher,email,' . $teacher->id,
            'contact_number' => 'required|string|max:50',
            'address' => 'nullable|string',
            'cnic' => 'required|string|unique:teacher,cnic,' . $teacher->id,
            'gender' => 'required|in:male,female,other',
            'salary' => 'required|numeric',
            'profile_img' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('profile_img')) {
            $data['profile_img'] = $request->file('profile_img')->store('teachers', 'public');
        }

        $teacher->update($data);

        return redirect()->route('teacher')->with('success', 'Teacher updated successfully.');
    }

    function teacher_destroy ($id){
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teacher')->with('success', 'Teacher deleted successfully.');
    }

    function student (){
        $students = Student::with('class')->latest()->get();
        return view('backend_theme.student.students', compact('students'));
    }

    function student_edit ($id){
        $student = Student::findOrFail($id);
        $classes = ClassModel::all();
        return view('backend_theme.student.student-edit', compact('student', 'classes'));
    }

    function student_view ($id){
        $student = Student::with('class')->findOrFail($id);
        return view('backend_theme.student.student-view', compact('student'));
    }

    function student_add (){
        $classes = ClassModel::all();
        return view('backend_theme.student.student-add', compact('classes'));
    }

    function student_store (Request $request){
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'class_id' => 'required|exists:class,id',
            'batch_code' => 'required|string|max:50',
            'father_name' => 'required|string|max:255',
            'cnic' => 'required|string|unique:student,cnic',
            'gender' => 'required|in:male,female,other',
            'dob' => 'required|date',
            'contact_number' => 'required|string|max:50',
            'email_address' => 'nullable|email',
            'address' => 'nullable|string',
            'emergency_contact' => 'required|string|max:50',
        ]);

        $data['password'] = Hash::make($request->cnic);

        Student::create($data);

        return redirect()->route('student')->with('success', 'Student added successfully.');
    }

    function student_update (Request $request, $id){
        $student = Student::findOrFail($id);

        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'class_id' => 'required|exists:class,id',
            'batch_code' => 'required|string|max:50',
            'father_name' => 'required|string|max:255',
            'cnic' => 'required|string|unique:student,cnic,' . $student->id,
            'gender' => 'required|in:male,female,other',
            'dob' => 'required|date',
            'contact_number' => 'required|string|max:50',
            'email_address' => 'nullable|email',
            'address' => 'nullable|string',
            'emergency_contact' => 'required|string|max:50',
        ]);

        $student->update($data);

        return redirect()->route('student')->with('success', 'Student updated successfully.');
    }

    function student_destroy ($id){
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('student')->with('success', 'Student deleted successfully.');
    }
    function attendance (){
        return view('backend_theme.attendance.attendance');
    }
    function attendance_edit (){
        return view('backend_theme.attendance.attendance-edit');
    }
    function attendance_add (){
        return view('backend_theme.attendance.attendance-mark');
    }
    function assignment (){
        return view('backend_theme.assignment.assignments');
    }
    function assignment_edit (){
        return view('backend_theme.assignment.assignment-edit');
    }
    function assignment_add (){
        return view('backend_theme.assignment.assignment-add');
    }

    function submission (){
        return view('backend_theme.submission.submissions');
    }
    function submission_grade (){
        return view('backend_theme.submission.submission-grade');
    }
}