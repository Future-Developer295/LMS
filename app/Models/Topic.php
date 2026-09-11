<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';

    protected $fillable = [
        'class_id',
        'topic_name',
        'order',
    ];

    public function classModel()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'topic_id')
            ->orderBy('assignment_due_date');
    }
}