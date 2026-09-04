<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\ClassTiming;

class DashboardController extends Controller
{
    function index (){
        return view('Backend_theme.dashboard');
    }
    function teacher (){
        return view('backend_theme.teacher.teachers');
    }
    function teacher_edit (){
        return view('backend_theme.teacher.teacher-edit');
    }
    function teacher_add (){
        return view('backend_theme.teacher.teacher-add');
    }
    function student (){
        return view('backend_theme.student.students');
    }
    function student_edit (){
        return view('backend_theme.student.student-edit');
    }
    function student_add (){
        return view('backend_theme.student.student-add');
    }
    function class (){
        return view('backend_theme.class.classes');
    }
    function class_edit (){
        return view('backend_theme.class.class-edit');
    }
    function class_add (){
        return view('backend_theme.class.class-add');
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
function assignment_add()
{
    $classes = ClassModel::orderBy('class_name')
        ->get();

    return view(
        'backend_theme.assignment.assignment-add',
        compact('classes')
    );
}
    function submission (){
        return view('backend_theme.submission.submissions');
    }
    function submission_grade (){
        return view('backend_theme.submission.submission-grade');
    }
}