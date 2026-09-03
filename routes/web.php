<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\StudentRegisterController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {



    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/teacher', [DashboardController::class, 'teacher'])->name('teacher');
    Route::get('/dashboard/teacher/edit', [DashboardController::class, 'teacher_edit'])->name('teacher_edit');
    Route::get('/dashboard/teacher/add', [DashboardController::class, 'teacher_add'])->name('teacher_add');

    Route::get('/dashboard/student', [DashboardController::class, 'student'])->name('student');
    Route::get('/dashboard/student/edit', [DashboardController::class, 'student_edit'])->name('student_edit');
    Route::get('/dashboard/student/add', [DashboardController::class, 'student_add'])->name('student_add');

    Route::get('/dashboard/class', [DashboardController::class, 'class'])->name('class');
    Route::get('/dashboard/class/edit', [DashboardController::class, 'class_edit'])->name('class_edit');
    Route::get('/dashboard/class/add', [DashboardController::class, 'class_add'])->name('class_add');








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



    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/teacher', [DashboardController::class, 'teacher'])->name('teacher');
    Route::get('/dashboard/teacher/edit', [DashboardController::class, 'teacher_edit'])->name('teacher_edit');
    Route::get('/dashboard/teacher/add', [DashboardController::class, 'teacher_add'])->name('teacher_add');







    Route::get('/dashboard/assignment', [DashboardController::class, 'assignment'])->name('assignment');
    Route::get('/dashboard/assignment/edit', [DashboardController::class, 'assignment_edit'])->name('assignment_edit');
    Route::get('/dashboard/assignment/add', [DashboardController::class, 'assignment_add'])->name('assignment_add');

    Route::get('/dashboard/submission', [DashboardController::class, 'submission'])->name('submission');
    Route::get('/dashboard/submission/grade', [DashboardController::class, 'submission_grade'])->name('submission_grade');
});

Route::middleware('guest')->group(function () {

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/class', [FrontendController::class, 'class'])->name('class');
Route::get('/calendar', [FrontendController::class, 'calendar'])->name('calendar');
Route::get('/classwork', [FrontendController::class, 'classwork'])->name('classwork');
Route::get('/classwork/detail', [FrontendController::class, 'detail'])->name('detail');
Route::get('/archived', [FrontendController::class, 'archived'])->name('archived');
Route::get('/steam', [FrontendController::class, 'steam'])->name('steam');
Route::get('/people', [FrontendController::class, 'people'])->name('people');

    Route::post('/student/login', [StudentAuthController::class, 'login'])
        ->name('student.login.submit');
});

Route::post('/student/join-class', [StudentClassController::class, 'joinClass'])
    ->middleware('auth')
    ->name('student.join.class');

Route::post('/student/logout', [StudentAuthController::class, 'logout'])
    ->middleware('auth')
    ->name('student.logout');

Route::get('/student/profile', function () {

    $user = auth()->user();

    $student = \App\Models\Student::where(
        'email_address',
        $user->email ?? $user->email_address
    )->first();

    return view('frontend_theme.student-profile', compact('student'));

})->middleware('auth')->name('student.profile');

Route::get('/student/profile/complete', function () {

    $user = auth()->user();

    $student = \App\Models\Student::where(
        'email_address',
        $user->email ?? $user->email_address
    )->first();

    return view('frontend_theme.complete-profile', compact('student'));

})->middleware('auth')->name('student.profile.complete');

Route::post('/student/profile/complete', function (Illuminate\Http\Request $request) {

    $user = auth()->user();

    $student = \App\Models\Student::where(
        'email_address',
        $user->email ?? $user->email_address
    )->first();

    if (!$student) {
        return back()->withErrors([
            'profile' => 'Student profile not found.'
        ]);
    }

    $validated = $request->validate([
        'full_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'father_name' => ['required', 'string', 'max:255'],
        'cnic' => ['required', 'string', 'max:255'],
        'gender' => ['required', 'in:male,female,other'],
        'dob' => ['required', 'date'],
        'contact_number' => ['required', 'string', 'max:255'],
        'batch_code' => ['required', 'string', 'max:255'],
        'emergency_contact' => ['nullable', 'string', 'max:255'],
        'address' => ['nullable', 'string'],
    ]);

    $student->update($validated);

    return redirect()
        ->route('student.profile')
        ->with('success', 'Profile completed successfully.');

})->middleware('auth')->name('student.profile.complete.store');

Route::middleware('guest')->group(function () {

    Route::get('/student/register', [StudentRegisterController::class, 'showRegister'])
        ->name('student.register');

    Route::post('/student/register', [StudentRegisterController::class, 'register'])
        ->name('student.register.submit');
});

Route::get('/student/dashboard', function () {
    return view('frontend_theme.index');
})->middleware('auth')->name('student.dashboard');

require __DIR__ . '/auth.php';
require __DIR__ . '/auth.php';
