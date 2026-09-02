<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('class_student', function (Blueprint $table) {
            $table->id();

            $table->foreignId('class_id')
                ->constrained('class')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('student_id')
                ->constrained('student')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->timestamp('joined_at')->useCurrent();

            $table->unique(['class_id', 'student_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('class_student');
    }
};