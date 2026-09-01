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
        Schema::create('class', function (Blueprint $table) {
            $table->id();
            
            $table->string('class_name');

            $table->foreignId('teacher_id')
                ->constrained('teacher')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('class_timing')
                ->constrained('class_timing')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('class_days')
                ->constrained('class_days')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
                
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class');
    }
};
