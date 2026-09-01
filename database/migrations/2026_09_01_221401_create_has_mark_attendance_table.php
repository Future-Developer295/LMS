<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('has_mark_attendance', function (Blueprint $table) {
            $table->id();
              $table->foreignId('attendance_id')
                ->constrained('attendance')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('student_id')
                ->constrained('student')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->enum('mark_status', [
                'present',
                'absent',
                'late',
                'leave'
            ]);

            $table->unique(['attendance_id', 'student_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('has_mark_attendance');
    }
};
