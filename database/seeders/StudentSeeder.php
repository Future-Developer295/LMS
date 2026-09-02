<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\ClassModel;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $web = ClassModel::where('class_name', 'Web Development')->first();
        $graphic = ClassModel::where('class_name', 'Graphic Designing')->first();
        $laravel = ClassModel::where('class_name', 'Laravel Development')->first();

        Student::create([
            'full_name' => 'Hamza',
            'last_name' => 'Ali',
            'class_id' => $web->id,
            'batch_code' => 'WD-01',
            'father_name' => 'Muhammad Ali',
            'cnic' => '35202-4567890-1',
            'gender' => 'male',
            'dob' => '2003-05-15',
            'contact_number' => '03001239876',
            'email_address' => 'hamza@lms.com',
            'address' => 'Lahore, Pakistan',
            'emergency_contact' => '03001112233',
        ]);

        Student::create([
            'full_name' => 'Sara',
            'last_name' => 'Khan',
            'class_id' => $web->id,
            'batch_code' => 'WD-01',
            'father_name' => 'Asif Khan',
            'cnic' => '35202-5678901-2',
            'gender' => 'female',
            'dob' => '2004-08-20',
            'contact_number' => '03111239876',
            'email_address' => 'sara@lms.com',
            'address' => 'Lahore, Pakistan',
            'emergency_contact' => '03112223344',
        ]);

        Student::create([
            'full_name' => 'Ahmed',
            'last_name' => 'Raza',
            'class_id' => $graphic->id,
            'batch_code' => 'GD-01',
            'father_name' => 'Rashid Raza',
            'cnic' => '35202-6789012-3',
            'gender' => 'male',
            'dob' => '2002-11-10',
            'contact_number' => '03221239876',
            'email_address' => 'ahmed@lms.com',
            'address' => 'Gujranwala, Pakistan',
            'emergency_contact' => '03223334455',
        ]);

        Student::create([
            'full_name' => 'Zainab',
            'last_name' => 'Fatima',
            'class_id' => $graphic->id,
            'batch_code' => 'GD-01',
            'father_name' => 'Tariq Ahmed',
            'cnic' => '35202-7890123-4',
            'gender' => 'female',
            'dob' => '2004-02-25',
            'contact_number' => '03331239876',
            'email_address' => 'zainab@lms.com',
            'address' => 'Lahore, Pakistan',
            'emergency_contact' => '03334445566',
        ]);

        Student::create([
            'full_name' => 'Bilal',
            'last_name' => 'Hassan',
            'class_id' => $laravel->id,
            'batch_code' => 'LV-01',
            'father_name' => 'Hassan Ahmed',
            'cnic' => '35202-8901234-5',
            'gender' => 'male',
            'dob' => '2003-09-12',
            'contact_number' => '03451239876',
            'email_address' => 'bilal@lms.com',
            'address' => 'Lahore, Pakistan',
            'emergency_contact' => '03445556677',
        ]);
    }
}