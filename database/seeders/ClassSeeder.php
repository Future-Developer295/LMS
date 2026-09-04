<?php

namespace Database\Seeders;

use App\Models\ClassDay;
use App\Models\ClassModel;
use App\Models\ClassTiming;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    public function run(): void
    {
        $teacher1 = Teacher::where('email', 'ali.khan@lms.com')->firstOrFail();
        $teacher2 = Teacher::where('email', 'ayesha.ahmed@lms.com')->firstOrFail();
        $teacher3 = Teacher::where('email', 'usman.malik@lms.com')->firstOrFail();

        $timing1 = ClassTiming::where('class_timing', '08:00 AM - 10:00 AM')->firstOrFail();
        $timing2 = ClassTiming::where('class_timing', '10:00 AM - 12:00 PM')->firstOrFail();
        $timing3 = ClassTiming::where('class_timing', '12:00 PM - 02:00 PM')->firstOrFail();
        $timing4 = ClassTiming::where('class_timing', '02:00 PM - 04:00 PM')->firstOrFail();
        $timing5 = ClassTiming::where('class_timing', '04:00 PM - 06:00 PM')->firstOrFail();
        $timing6 = ClassTiming::where('class_timing', '06:00 PM - 08:00 PM')->firstOrFail();
        $timing7 = ClassTiming::where('class_timing', '08:00 PM - 10:00 PM')->firstOrFail();

        $day1 = ClassDay::where('class_days', 'Monday, Wednesday, Friday')->firstOrFail();
        $day2 = ClassDay::where('class_days', 'Tuesday, Thursday, Saturday')->firstOrFail();
        $day3 = ClassDay::where('class_days', 'Monday, Tuesday, Wednesday')->firstOrFail();

        ClassModel::create([
            'class_name' => 'Web Development',
            'class_code' => 'WD-001',
            'teacher_id' => $teacher1->id,
            'class_timing' => $timing1->id,
            'class_days' => $day1->id,
        ]);

        ClassModel::create([
            'class_name' => 'Graphic Designing',
            'class_code' => 'GD-001',
            'teacher_id' => $teacher2->id,
            'class_timing' => $timing2->id,
            'class_days' => $day2->id,
        ]);

        ClassModel::create([
            'class_name' => 'Laravel Development',
            'class_code' => 'LD-001',
            'teacher_id' => $teacher3->id,
            'class_timing' => $timing3->id,
            'class_days' => $day3->id,
        ]);

        ClassModel::create([
            'class_name' => 'Frontend Development',
            'class_code' => 'FD-001',
            'teacher_id' => $teacher1->id,
            'class_timing' => $timing4->id,
            'class_days' => $day1->id,
        ]);

        ClassModel::create([
            'class_name' => 'Backend Development',
            'class_code' => 'BD-001',
            'teacher_id' => $teacher3->id,
            'class_timing' => $timing5->id,
            'class_days' => $day2->id,
        ]);

        ClassModel::create([
            'class_name' => 'UI/UX Designing',
            'class_code' => 'UX-001',
            'teacher_id' => $teacher2->id,
            'class_timing' => $timing6->id,
            'class_days' => $day3->id,
        ]);

        ClassModel::create([
            'class_name' => 'PHP & MySQL',
            'class_code' => 'PM-001',
            'teacher_id' => $teacher3->id,
            'class_timing' => $timing7->id,
            'class_days' => $day1->id,
        ]);
    }
}