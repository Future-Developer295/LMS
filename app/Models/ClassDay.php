<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassDay extends Model
{
    use HasFactory;

    protected $table = 'class_days';

    public $timestamps = false;

    protected $fillable = [
        'class_days',
    ];

    public function classes()
    {
        return $this->hasMany(ClassModel::class, 'class_days');
    }
}