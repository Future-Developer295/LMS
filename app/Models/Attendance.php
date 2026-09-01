<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';

    public $timestamps = false;

    protected $fillable = [
        'batch_code',
        'mark_date',
    ];

    protected $casts = [
        'mark_date' => 'date',
    ];

    public function studentAttendance()
    {
        return $this->hasMany(
            HasMarkAttendance::class,
            'attendance_id'
        );
    }
}