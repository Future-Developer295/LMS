<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Student;
use App\Models\HasMarkAttendance;
use Illuminate\Database\Seeder;

class HasMarkAttendanceSeeder extends Seeder
{
    public function run(): void
    {
        $wdAttendance = Attendance::where('batch_code', 'WD-01')
            ->where('mark_date', '2026-09-01')
            ->first();

        $gdAttendance = Attendance::where('batch_code', 'GD-01')
            ->where('mark_date', '2026-09-01')
            ->first();

        $lvAttendance = Attendance::where('batch_code', 'LV-01')
            ->where('mark_date', '2026-09-01')
            ->first();

        $wdAttendance2 = Attendance::where('batch_code', 'WD-01')
            ->where('mark_date', '2026-09-02')
            ->first();

        $hamza = Student::where('email_address', 'hamza@lms.com')->first();
        $sara = Student::where('email_address', 'sara@lms.com')->first();
        $ahmed = Student::where('email_address', 'ahmed@lms.com')->first();
        $zainab = Student::where('email_address', 'zainab@lms.com')->first();
        $bilal = Student::where('email_address', 'bilal@lms.com')->first();

        HasMarkAttendance::create([
            'attendance_id' => $wdAttendance->id,
            'student_id' => $hamza->id,
            'mark_status' => 'present',
        ]);

        HasMarkAttendance::create([
            'attendance_id' => $wdAttendance->id,
            'student_id' => $sara->id,
            'mark_status' => 'absent',
        ]);

        HasMarkAttendance::create([
            'attendance_id' => $gdAttendance->id,
            'student_id' => $ahmed->id,
            'mark_status' => 'present',
        ]);

        HasMarkAttendance::create([
            'attendance_id' => $gdAttendance->id,
            'student_id' => $zainab->id,
            'mark_status' => 'late',
        ]);

        HasMarkAttendance::create([
            'attendance_id' => $lvAttendance->id,
            'student_id' => $bilal->id,
            'mark_status' => 'present',
        ]);

        HasMarkAttendance::create([
            'attendance_id' => $wdAttendance2->id,
            'student_id' => $hamza->id,
            'mark_status' => 'present',
        ]);

        HasMarkAttendance::create([
            'attendance_id' => $wdAttendance2->id,
            'student_id' => $sara->id,
            'mark_status' => 'present',
        ]);
    }
}