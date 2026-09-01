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
        Schema::create('assignment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_timing_id')
                ->constrained('class_timing')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->string('assignment_title');

            $table->text('assignment_instruction')->nullable();

            $table->enum('assignment_status', [
                'pending',
                'active',
                'completed',
                'closed'
            ])->default('pending');

            $table->date('assignment_due_date');

            $table->integer('assignment_marks')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignment');
    }
};
