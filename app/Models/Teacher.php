<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teacher';

    public $timestamps = false;

    protected $fillable = [
        'full_name',
        'last_name',
        'email',
        'contact_number',
        'address',
        'cnic',
        'profile_img',
        'gender',
        'salary',
    ];

    protected $casts = [
        'salary' => 'decimal:2',
    ];

    public function classes()
    {
        return $this->hasMany(ClassModel::class, 'teacher_id');
    }
}