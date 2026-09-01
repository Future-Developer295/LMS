<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $table = 'assignment';

    public $timestamps = false;

    protected $fillable = [
        'class_timing_id',
        'assignment_title',
        'assignment_instruction',
        'assignment_status',
        'assignment_due_date',
        'assignment_marks',
    ];

    protected $casts = [
        'assignment_due_date' => 'date',
        'assignment_marks' => 'integer',
    ];

    public function classTiming()
    {
        return $this->belongsTo(
            ClassTiming::class,
            'class_timing_id'
        );
    }

    public function submissions()
    {
        return $this->hasMany(
            AssignmentHasSubmit::class,
            'assignment_id'
        );
    }
}