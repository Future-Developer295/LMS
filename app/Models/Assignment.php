<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClassTiming;
use App\Models\AssignmentHasSubmit;

class Assignment extends Model
{
    use HasFactory;

    protected $table = 'assignment';

    public $timestamps = false;

    protected $fillable = [
        'class_timing_id',
        'topic_id',
        'assignment_title',
        'assignment_instruction',
        'assignment_status',
        'assignment_due_date',
        'assignment_marks',
        'posted_at',
        'resource_label',
        'resource_link',
    ];

    protected $casts = [
        'assignment_due_date' => 'date',
        'posted_at' => 'date',
        'assignment_marks' => 'integer',
    ];

    public function classTiming()
    {
        return $this->belongsTo(ClassTiming::class, 'class_timing_id');
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    public function submissions()
    {
        return $this->hasMany(AssignmentHasSubmit::class, 'assignment_id');
    }

    /**
     * Compute a display status for a given student's submission (or lack of one).
     */
    public function statusForSubmission(?AssignmentHasSubmit $submission): string
    {
        if ($submission) {
            if ($submission->published && !is_null($submission->grade)) {
                return 'Graded';
            }
            return 'Turned in';
        }

        if ($this->assignment_due_date && $this->assignment_due_date->isPast()) {
            return 'Missing';
        }

        return 'Assigned';
    }
}