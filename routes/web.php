<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClassController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {



    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/teacher', [DashboardController::class, 'teacher'])->name('teacher');
    Route::get('/dashboard/teacher/view/{id}', [DashboardController::class, 'teacher_view'])->name('teacher_view');
    Route::get('/dashboard/teacher/edit/{id}', [DashboardController::class, 'teacher_edit'])->name('teacher_edit');
    Route::get('/dashboard/teacher/add', [DashboardController::class, 'teacher_add'])->name('teacher_add');
    Route::post('/dashboard/teacher/store', [DashboardController::class, 'teacher_store'])->name('teacher_store');
    Route::put('/dashboard/teacher/update/{id}', [DashboardController::class, 'teacher_update'])->name('teacher_update');
    Route::delete('/dashboard/teacher/delete/{id}', [DashboardController::class, 'teacher_destroy'])->name('teacher_destroy');

    Route::get('/dashboard/student', [DashboardController::class, 'student'])->name('student');
    Route::get('/dashboard/student/view/{id}', [DashboardController::class, 'student_view'])->name('student_view');
    Route::get('/dashboard/student/edit/{id}', [DashboardController::class, 'student_edit'])->name('student_edit');
    Route::get('/dashboard/student/add', [DashboardController::class, 'student_add'])->name('student_add');
    Route::post('/dashboard/student/store', [DashboardController::class, 'student_store'])->name('student_store');
    Route::put('/dashboard/student/update/{id}', [DashboardController::class, 'student_update'])->name('student_update');
    Route::delete('/dashboard/student/delete/{id}', [DashboardController::class, 'student_destroy'])->name('student_destroy');

    Route::get('/dashboard/class', [ClassController::class, 'class'])->name('class');
    Route::get('/dashboard/class/add', [ClassController::class, 'class_add'])->name('class_add');
    Route::post('/dashboard/class/store', [ClassController::class, 'class_store'])->name('class_store');
    Route::get('/dashboard/class/edit/{id}', [ClassController::class, 'class_edit'])->name('class_edit');
    Route::put('/dashboard/class/update/{id}', [ClassController::class, 'class_update'])->name('class_update');
    Route::delete('/dashboard/class/delete/{id}', [ClassController::class, 'destroy'])->name('class_destroy');
    Route::get('/dashboard/class/view/{id}', [ClassController::class, 'view'])->name('class_view');








    //attendeance 



 Route::get('/dashboard/attendance', [AttendanceController::class, 'index'])
    ->name('attendance');

Route::get('/dashboard/attendance/add', [AttendanceController::class, 'create'])
    ->name('attendance_add');

Route::get('/dashboard/attendance/view/{attendance}', [AttendanceController::class, 'show'])
    ->name('attendance_view');

Route::get('/dashboard/attendance/edit/{attendance}', [AttendanceController::class, 'edit'])
    ->name('attendance_edit');

Route::get('/dashboard/attendance/students/{batch_code}', [AttendanceController::class, 'studentsByBatch'])
    ->name('attendance_students');

Route::post('/dashboard/attendance/store', [AttendanceController::class, 'store'])
    ->name('attendance_store');

Route::put('/dashboard/attendance/update/{attendance}', [AttendanceController::class, 'update'])
    ->name('attendance_update');

Route::delete('/dashboard/attendance/delete/{attendance}', [AttendanceController::class, 'destroy'])
    ->name('attendance_destroy');











    Route::get('/dashboard/assignment', [DashboardController::class, 'assignment'])->name('assignment');
    Route::get('/dashboard/assignment/edit', [DashboardController::class, 'assignment_edit'])->name('assignment_edit');
    Route::get('/dashboard/assignment/add', [DashboardController::class, 'assignment_add'])->name('assignment_add');

    Route::get('/dashboard/submission', [DashboardController::class, 'submission'])->name('submission');
    Route::get('/dashboard/submission/grade', [DashboardController::class, 'submission_grade'])->name('submission_grade');
});

// Frontend Theme

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/class', [FrontendController::class, 'class'])->name('frontend_class');
Route::get('/calendar', [FrontendController::class, 'calendar'])->name('calendar');
Route::get('/classwork', [FrontendController::class, 'classwork'])->name('classwork');
Route::get('/classwork/detail', [FrontendController::class, 'detail'])->name('detail');
Route::get('/archived', [FrontendController::class, 'archived'])->name('archived');
Route::get('/steam', [FrontendController::class, 'steam'])->name('steam');
Route::get('/people', [FrontendController::class, 'people'])->name('people');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';