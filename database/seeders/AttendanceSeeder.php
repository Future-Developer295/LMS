<?php

namespace Database\Seeders;

use App\Models\Attendance;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    public function run(): void
    {
        Attendance::create([
            'batch_code' => 'WD-01',
            'mark_date' => '2026-09-01',
        ]);

        Attendance::create([
            'batch_code' => 'GD-01',
            'mark_date' => '2026-09-01',
        ]);

        Attendance::create([
            'batch_code' => 'LV-01',
            'mark_date' => '2026-09-01',
        ]);

        Attendance::create([
            'batch_code' => 'WD-01',
            'mark_date' => '2026-09-02',
        ]);
    }
}