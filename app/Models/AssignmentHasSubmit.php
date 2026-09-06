<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentHasSubmit extends Model
{
    use HasFactory;

    protected $table = 'assignment_has_submit';

    

   protected $fillable = [
    'assignment_id',
    'student_id',
    'assignment_file',
    'assignment_remark',
    'assignment_remarks_comments',
    'grade',
    'published',
];
    public function assignment()
    {
        return $this->belongsTo(
            Assignment::class,
            'assignment_id'
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