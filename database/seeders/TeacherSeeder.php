<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        Teacher::create([
            'full_name' => 'Ali',
            'last_name' => 'Khan',
            'email' => 'ali.khan@lms.com',
            'contact_number' => '03001234567',
            'address' => 'Lahore, Pakistan',
            'cnic' => '35202-1234567-1',
            'profile_img' => null,
            'gender' => 'male',
            'salary' => 65000,
        ]);

        Teacher::create([
            'full_name' => 'Ayesha',
            'last_name' => 'Ahmed',
            'email' => 'ayesha.ahmed@lms.com',
            'contact_number' => '03111234567',
            'address' => 'Lahore, Pakistan',
            'cnic' => '35202-2345678-2',
            'profile_img' => null,
            'gender' => 'female',
            'salary' => 70000,
        ]);

        Teacher::create([
            'full_name' => 'Usman',
            'last_name' => 'Malik',
            'email' => 'usman.malik@lms.com',
            'contact_number' => '03221234567',
            'address' => 'Gujranwala, Pakistan',
            'cnic' => '35202-3456789-3',
            'profile_img' => null,
            'gender' => 'male',
            'salary' => 60000,
        ]);
    }
}