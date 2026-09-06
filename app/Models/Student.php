<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ClassStudent;

class Student extends Authenticatable
{
    use HasFactory;

    protected $table = 'student';

    public $timestamps = false;

    protected $fillable = [
        'full_name',
        'last_name',
        'class_id',
        'batch_code',
        'father_name',
        'cnic',
        'gender',
        'dob',
        'contact_number',
        'email_address',
        'address',
        'password',
        'emergency_contact',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'dob' => 'date',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getEmailForPasswordReset()
    {
        return $this->email_address;
    }

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    public function attendanceRecords()
    {
        return $this->hasMany(HasMarkAttendance::class, 'student_id');
    }

    public function assignmentSubmissions()
    {
        return $this->hasMany(AssignmentHasSubmit::class, 'student_id');
    }

    public function classEnrollments()
    {
        return $this->hasMany(ClassStudent::class, 'student_id');
    }
}