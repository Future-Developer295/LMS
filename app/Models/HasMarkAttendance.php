<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasMarkAttendance extends Model
{
    use HasFactory;

    protected $table = 'has_mark_attendance';

    public $timestamps = false;

    protected $fillable = [
        'attendance_id',
        'student_id',
        'mark_status',
    ];

    public function attendance()
    {
        return $this->belongsTo(
            Attendance::class,
            'attendance_id'
        );
    }

    public function student()
    {
        return $this->belongsTo(
            Student::class,
            'student_id'
        );
    }
}