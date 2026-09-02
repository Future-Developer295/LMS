<?php

namespace Database\Seeders;

use App\Models\Assignment;
use App\Models\ClassTiming;
use Illuminate\Database\Seeder;

class AssignmentSeeder extends Seeder
{
    public function run(): void
    {
        $timing1 = ClassTiming::where(
            'class_timing',
            '08:00 AM - 10:00 AM'
        )->firstOrFail();

        $timing2 = ClassTiming::where(
            'class_timing',
            '10:00 AM - 12:00 PM'
        )->firstOrFail();

        $timing3 = ClassTiming::where(
            'class_timing',
            '12:00 PM - 02:00 PM'
        )->firstOrFail();

        $timing4 = ClassTiming::where(
            'class_timing',
            '02:00 PM - 04:00 PM'
        )->firstOrFail();

        $timing5 = ClassTiming::where(
            'class_timing',
            '04:00 PM - 06:00 PM'
        )->firstOrFail();

        $timing6 = ClassTiming::where(
            'class_timing',
            '06:00 PM - 08:00 PM'
        )->firstOrFail();

        $timing7 = ClassTiming::where(
            'class_timing',
            '08:00 PM - 10:00 PM'
        )->firstOrFail();

        Assignment::create([
            'class_timing_id' => $timing1->id,
            'assignment_title' => 'HTML & CSS Landing Page',
            'assignment_instruction' => 'Create a responsive landing page using HTML and CSS.',
            'assignment_status' => 'active',
            'assignment_due_date' => '2026-09-10',
            'assignment_marks' => 20,
        ]);

        Assignment::create([
            'class_timing_id' => $timing2->id,
            'assignment_title' => 'Graphic Design Poster',
            'assignment_instruction' => 'Design a professional promotional poster.',
            'assignment_status' => 'active',
            'assignment_due_date' => '2026-09-11',
            'assignment_marks' => 20,
        ]);

        Assignment::create([
            'class_timing_id' => $timing3->id,
            'assignment_title' => 'Laravel CRUD Application',
            'assignment_instruction' => 'Create a basic CRUD application using Laravel.',
            'assignment_status' => 'active',
            'assignment_due_date' => '2026-09-12',
            'assignment_marks' => 30,
        ]);

        Assignment::create([
            'class_timing_id' => $timing4->id,
            'assignment_title' => 'JavaScript Calculator',
            'assignment_instruction' => 'Create a functional calculator using JavaScript.',
            'assignment_status' => 'active',
            'assignment_due_date' => '2026-09-13',
            'assignment_marks' => 20,
        ]);

        Assignment::create([
            'class_timing_id' => $timing5->id,
            'assignment_title' => 'PHP Form Validation',
            'assignment_instruction' => 'Create a PHP form with server-side validation.',
            'assignment_status' => 'active',
            'assignment_due_date' => '2026-09-14',
            'assignment_marks' => 25,
        ]);

        Assignment::create([
            'class_timing_id' => $timing6->id,
            'assignment_title' => 'UI/UX Dashboard',
            'assignment_instruction' => 'Design a modern dashboard UI in Figma.',
            'assignment_status' => 'active',
            'assignment_due_date' => '2026-09-15',
            'assignment_marks' => 25,
        ]);

        Assignment::create([
            'class_timing_id' => $timing7->id,
            'assignment_title' => 'PHP & MySQL Project',
            'assignment_instruction' => 'Create a small PHP and MySQL based project.',
            'assignment_status' => 'active',
            'assignment_due_date' => '2026-09-16',
            'assignment_marks' => 30,
        ]);
    }
}