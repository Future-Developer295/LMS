<?php

namespace Database\Seeders;

use App\Models\ClassDay;
use Illuminate\Database\Seeder;

class ClassDaySeeder extends Seeder
{
    public function run(): void
    {
        ClassDay::create([
            'class_days' => 'Monday, Wednesday, Friday',
        ]);

        ClassDay::create([
            'class_days' => 'Tuesday, Thursday, Saturday',
        ]);

        ClassDay::create([
            'class_days' => 'Monday, Tuesday, Wednesday',
        ]);
    }
}