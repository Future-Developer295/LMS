<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassTiming extends Model
{
    use HasFactory;

    protected $table = 'class_timing';

    public $timestamps = false;

    protected $fillable = [
        'class_timing',
    ];

    public function classes()
    {
        return $this->hasMany(ClassModel::class, 'class_timing');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'class_timing_id');
    }
}