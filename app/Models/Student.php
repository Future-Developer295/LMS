<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
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
        'emergency_contact',
    ];

    protected $casts = [
        'dob' => 'date',
    ];

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
}