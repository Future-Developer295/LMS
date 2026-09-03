<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'class';

    public $timestamps = false;

    protected $fillable = [
        'class_name',
        'class_code',
        'teacher_id',
        'class_timing',
        'class_days',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function timing()
    {
        return $this->belongsTo(ClassTiming::class, 'class_timing');
    }

    public function day()
    {
        return $this->belongsTo(ClassDay::class, 'class_days');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }
}