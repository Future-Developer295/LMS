<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// dashboard

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/dashboard/teacher', [DashboardController::class, 'teacher'])
        ->name('teacher');

    Route::get('/dashboard/teacher/edit', [DashboardController::class, 'teacher_edit'])
        ->name('teacher_edit');

    Route::get('/dashboard/teacher/add', [DashboardController::class, 'teacher_add'])
        ->name('teacher_add');


    Route::get('/dashboard/student', [DashboardController::class, 'student'])
        ->name('student');

    Route::get('/dashboard/student/edit', [DashboardController::class, 'student_edit'])
        ->name('student_edit');

    Route::get('/dashboard/student/add', [DashboardController::class, 'student_add'])
        ->name('student_add');


    Route::get('/dashboard/class', [DashboardController::class, 'class'])
        ->name('dashboard.class');

    Route::get('/dashboard/class/edit', [DashboardController::class, 'class_edit'])
        ->name('class_edit');

    Route::get('/dashboard/class/add', [DashboardController::class, 'class_add'])
        ->name('class_add');


    Route::get('/dashboard/attendance', [DashboardController::class, 'attendance'])
        ->name('attendance');

    Route::get('/dashboard/attendance/edit', [DashboardController::class, 'attendance_edit'])
        ->name('attendance_edit');

    Route::get('/dashboard/attendance/add', [DashboardController::class, 'attendance_add'])
        ->name('attendance_add');


    Route::get('/dashboard/assignment', [DashboardController::class, 'assignment'])
        ->name('assignment');

    Route::get('/dashboard/assignment/edit', [DashboardController::class, 'assignment_edit'])
        ->name('assignment_edit');

    Route::get('/dashboard/assignment/add', [DashboardController::class, 'assignment_add'])
        ->name('assignment_add');


    Route::get('/dashboard/submission', [DashboardController::class, 'submission'])
        ->name('submission');

    Route::get('/dashboard/submission/grade', [DashboardController::class, 'submission_grade'])
        ->name('submission_grade');
});


// frontend

Route::get('/', [FrontendController::class, 'index'])
    ->name('index');

Route::get('/class', [FrontendController::class, 'class'])
    ->name('class');

Route::get('/calendar', [FrontendController::class, 'calendar'])
    ->name('calendar');
    Route::get('/attendance', [FrontendController::class, 'attendance'])
    ->middleware('auth')
    ->name('student.attendance');
    Route::post('/classwork/submit', [FrontendController::class, 'submitAssignment'])
    ->middleware('auth')
    ->name('student.assignment.submit');

Route::get('/classwork', [FrontendController::class, 'classwork'])
    ->middleware('auth')
    ->name('classwork');

Route::get('/classwork/detail', [FrontendController::class, 'detail'])
    ->name('detail');

Route::get('/archived', [FrontendController::class, 'archived'])
    ->name('archived');

Route::get('/steam', [FrontendController::class, 'steam'])
    ->name('steam');

Route::get('/people', [FrontendController::class, 'people'])
    ->name('people');


// brezz profile route

Route::middleware('auth')->group(function () {

    Route::get('/student-profile', function () {
        return view('frontend_theme.student-profile');
    })->middleware('auth')->name('student.profile');

    Route::get('/student-profile/complete', function () {
    $student = auth()->user()->student;

    return view('frontend_theme.complete-profile', compact('student'));
})->name('student.profile.complete');

 Route::post('/student-profile/complete', [StudentProfileController::class, 'store'])
    ->name('student.profile.complete.store');
    Route::post('/student-profile/join-class', [StudentProfileController::class, 'joinClass'])
    ->name('student.join.class');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});




require __DIR__ . '/auth.php';
