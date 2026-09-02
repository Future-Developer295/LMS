<?php

namespace Database\Seeders;

use App\Models\ClassTiming;
use Illuminate\Database\Seeder;

class ClassTimingSeeder extends Seeder
{
    public function run(): void
    {
        ClassTiming::create([
            'class_timing' => '08:00 AM - 10:00 AM',
        ]);

        ClassTiming::create([
            'class_timing' => '10:00 AM - 12:00 PM',
        ]);

        ClassTiming::create([
            'class_timing' => '12:00 PM - 02:00 PM',
        ]);

        ClassTiming::create([
            'class_timing' => '02:00 PM - 04:00 PM',
        ]);

        ClassTiming::create([
            'class_timing' => '04:00 PM - 06:00 PM',
        ]);

        ClassTiming::create([
            'class_timing' => '06:00 PM - 08:00 PM',
        ]);

        ClassTiming::create([
            'class_timing' => '08:00 PM - 10:00 PM',
        ]);
    }
}