<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('permission:view dashboard')
        ->name('dashboard');


    //  Teacher 

    Route::get('/dashboard/teacher', [DashboardController::class, 'teacher'])
        ->middleware('permission:view teachers')
        ->name('teacher');

    Route::get('/dashboard/teacher/view/{id}', [DashboardController::class, 'teacher_view'])
        ->middleware('permission:view teachers')
        ->name('teacher_view');

    Route::get('/dashboard/teacher/edit/{id}', [DashboardController::class, 'teacher_edit'])
        ->middleware('permission:edit teachers')
        ->name('teacher_edit');

    Route::get('/dashboard/teacher/add', [DashboardController::class, 'teacher_add'])
        ->middleware('permission:create teachers')
        ->name('teacher_add');

    Route::post('/dashboard/teacher/store', [DashboardController::class, 'teacher_store'])
        ->middleware('permission:create teachers')
        ->name('teacher_store');

    Route::put('/dashboard/teacher/update/{id}', [DashboardController::class, 'teacher_update'])
        ->middleware('permission:edit teachers')
        ->name('teacher_update');

    Route::delete('/dashboard/teacher/delete/{id}', [DashboardController::class, 'teacher_destroy'])
        ->middleware('permission:delete teachers')
        ->name('teacher_destroy');


    // Studen

    Route::get('/dashboard/student', [DashboardController::class, 'student'])
        ->middleware('permission:view students')
        ->name('student');

    Route::get('/dashboard/student/view/{id}', [DashboardController::class, 'student_view'])
        ->middleware('permission:view students')
        ->name('student_view');

    Route::get('/dashboard/student/edit/{id}', [DashboardController::class, 'student_edit'])
        ->middleware('permission:edit students')
        ->name('student_edit');

    Route::get('/dashboard/student/add', [DashboardController::class, 'student_add'])
        ->middleware('permission:create students')
        ->name('student_add');

    Route::post('/dashboard/student/store', [DashboardController::class, 'student_store'])
        ->middleware('permission:create students')
        ->name('student_store');

    Route::put('/dashboard/student/update/{id}', [DashboardController::class, 'student_update'])
        ->middleware('permission:edit students')
        ->name('student_update');

    Route::delete('/dashboard/student/delete/{id}', [DashboardController::class, 'student_destroy'])
        ->middleware('permission:delete students')
        ->name('student_destroy');


    //  Class

    Route::get('/dashboard/class', [ClassController::class, 'class'])
        ->middleware('permission:view classes')
        ->name('class');

    Route::get('/dashboard/class/add', [ClassController::class, 'class_add'])
        ->middleware('permission:create classes')
        ->name('class_add');

    Route::post('/dashboard/class/store', [ClassController::class, 'class_store'])
        ->middleware('permission:create classes')
        ->name('class_store');

    Route::get('/dashboard/class/edit/{id}', [ClassController::class, 'class_edit'])
        ->middleware('permission:edit classes')
        ->name('class_edit');

    Route::put('/dashboard/class/update/{id}', [ClassController::class, 'class_update'])
        ->middleware('permission:edit classes')
        ->name('class_update');

    Route::delete('/dashboard/class/delete/{id}', [ClassController::class, 'destroy'])
        ->middleware('permission:delete classes')
        ->name('class_destroy');

    Route::get('/dashboard/class/view/{id}', [ClassController::class, 'view'])
        ->middleware('permission:view classes')
        ->name('class_view');


    //  Attendance

    Route::get('/dashboard/attendance', [AttendanceController::class, 'index'])
        ->middleware('permission:view attendance')
        ->name('attendance');

    Route::get('/dashboard/attendance/add', [AttendanceController::class, 'create'])
        ->middleware('permission:create attendance')
        ->name('attendance_add');

    Route::get('/dashboard/attendance/view/{attendance}', [AttendanceController::class, 'show'])
        ->middleware('permission:view attendance')
        ->name('attendance_view');

    Route::get('/dashboard/attendance/edit/{attendance}', [AttendanceController::class, 'edit'])
        ->middleware('permission:edit attendance')
        ->name('attendance_edit');

    Route::get('/dashboard/attendance/students/{batch_code}', [AttendanceController::class, 'studentsByBatch'])
        ->middleware('permission:view attendance')
        ->name('attendance_students');

    Route::post('/dashboard/attendance/store', [AttendanceController::class, 'store'])
        ->middleware('permission:create attendance')
        ->name('attendance_store');

    Route::put('/dashboard/attendance/update/{attendance}', [AttendanceController::class, 'update'])
        ->middleware('permission:edit attendance')
        ->name('attendance_update');

    Route::delete('/dashboard/attendance/delete/{attendance}', [AttendanceController::class, 'destroy'])
        ->middleware('permission:delete attendance')
        ->name('attendance_destroy');


    // Assignment

    Route::get('/dashboard/assignment', [AssignmentController::class, 'index'])
        ->middleware('permission:view assignments')
        ->name('assignment');

    Route::get('/dashboard/assignment/add', [DashboardController::class, 'assignment_add'])
        ->middleware('permission:create assignments')
        ->name('assignment_add');

    Route::post('/dashboard/assignment/store', [AssignmentController::class, 'store'])
        ->middleware('permission:create assignments')
        ->name('assignment.store');

    Route::get('/dashboard/assignment/{id}', [AssignmentController::class, 'show'])
        ->middleware('permission:view assignments')
        ->name('assignment.show');

    Route::get('/dashboard/assignment/{id}/edit', [AssignmentController::class, 'edit'])
        ->middleware('permission:edit assignments')
        ->name('assignment.edit');

    Route::put('/dashboard/assignment/{id}', [AssignmentController::class, 'update'])
        ->middleware('permission:edit assignments')
        ->name('assignment.update');

    Route::delete('/dashboard/assignment/{id}', [AssignmentController::class, 'destroy'])
        ->middleware('permission:delete assignments')
        ->name('assignment.destroy');


    // Submission

    Route::get('/dashboard/submission', [SubmissionController::class, 'index'])
        ->middleware('permission:view assignment submissions')
        ->name('submission');

    Route::get('/dashboard/submission/export', [SubmissionController::class, 'exportCsv'])
        ->middleware('permission:view assignment submissions')
        ->name('submission.export');

    Route::post('/dashboard/submission/publish', [SubmissionController::class, 'publishGrades'])
        ->middleware('permission:grade assignments')
        ->name('submission.publish');

    Route::get('/dashboard/submission/{id}/grade', [SubmissionController::class, 'grade'])
        ->middleware('permission:grade assignments')
        ->name('submission.grade');

    Route::post('/dashboard/submission/{id}/grade', [SubmissionController::class, 'saveGrade'])
        ->middleware('permission:grade assignments')
        ->name('submission.saveGrade');

    Route::get('/dashboard/submission/{id}', [SubmissionController::class, 'show'])
        ->middleware('permission:view assignment submissions')
        ->name('submission.show');


    // Roles

    Route::get('/roles', [RoleController::class, 'index'])
        ->middleware('permission:view settings')
        ->name('roles.index');

    Route::get('/roles/create', [RoleController::class, 'create'])
        ->middleware('permission:manage settings')
        ->name('roles.create');

    Route::post('/roles', [RoleController::class, 'store'])
        ->middleware('permission:manage settings')
        ->name('roles.store');

    Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])
        ->middleware('permission:manage settings')
        ->name('roles.edit');

    Route::get('/roles/{role}/view', [RoleController::class, 'view'])
        ->middleware('permission:view settings')
        ->name('roles.view');

    Route::put('/roles/{role}', [RoleController::class, 'update'])
        ->middleware('permission:manage settings')
        ->name('roles.update');

    Route::delete('/roles/{role}', [RoleController::class, 'destroy'])
        ->middleware('permission:manage settings')
        ->name('roles.destroy');


    //  Permissions

    Route::get('/permissions', [PermissionController::class, 'index'])
        ->middleware('permission:view settings')
        ->name('permissions.index');

    Route::get('/permissions/create', [PermissionController::class, 'create'])
        ->middleware('permission:manage settings')
        ->name('permissions.create');

    Route::post('/permissions', [PermissionController::class, 'store'])
        ->middleware('permission:manage settings')
        ->name('permissions.store');

    Route::get('/permissions/{permission}/edit', [PermissionController::class, 'edit'])
        ->middleware('permission:manage settings')
        ->name('permissions.edit');

    Route::post('/permissions/{permission}', [PermissionController::class, 'update'])
        ->middleware('permission:manage settings')
        ->name('permissions.update');

    Route::delete('/permissions/{permission}', [PermissionController::class, 'destroy'])
        ->middleware('permission:manage settings')
        ->name('permissions.destroy');


    //  User

    Route::get('/dashboard/user', [UserController::class, 'index'])
        ->middleware('permission:view users')
        ->name('user');

    Route::get('/dashboard/user/view/{id}', [UserController::class, 'view'])
        ->middleware('permission:view users')
        ->name('user_view');

    Route::get('/dashboard/user/edit/{id}', [UserController::class, 'edit'])
        ->middleware('permission:edit users')
        ->name('user_edit');

    Route::get('/dashboard/user/add', [UserController::class, 'add'])
        ->middleware('permission:create users')
        ->name('user_add');

    Route::post('/dashboard/user/store', [UserController::class, 'store'])
        ->middleware('permission:create users')
        ->name('user_store');

    Route::put('/dashboard/user/update/{id}', [UserController::class, 'update'])
        ->middleware('permission:edit users')
        ->name('user_update');

    Route::delete('/dashboard/user/delete/{id}', [UserController::class, 'destroy'])
        ->middleware('permission:delete users')
        ->name('user_destroy');
});


Route::get('/', [FrontendController::class, 'index'])->name('index'); //khdija;

Route::get('/class', [FrontendController::class, 'class'])->name('frontend_class'); //Hana;


Route::get('/calendar', [FrontendController::class, 'calendar'])->name('calendar');

Route::get('/classwork', [FrontendController::class, 'classwork'])->name('classwork');

Route::get('/classwork/detail/{id}', [FrontendController::class, 'detail'])->name('detail'); //dua

Route::get('/archived', [FrontendController::class, 'archived'])->name('archived');

Route::get('/steam', [FrontendController::class, 'steam'])->name('steam');

Route::get('/people', [FrontendController::class, 'people'])->name('people'); //aleena;



Route::get('/student/login', [StudentAuthController::class, 'showLogin'])
    ->name('student.login');

Route::post('/student/login', [StudentAuthController::class, 'login'])
    ->name('student.login.submit');

Route::get('/student/register', [StudentAuthController::class, 'showRegister'])
    ->name('student.register');

Route::post('/student/register', [StudentAuthController::class, 'register'])
    ->name('student.register.submit');

Route::post('/student/logout', [StudentAuthController::class, 'logout'])
    ->name('student.logout');

Route::post('/student/join-class', [StudentAuthController::class, 'join'])
    ->name('student.join.class');

require __DIR__ . '/auth.php';
