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
        Schema::create('assignment_has_submit', function (Blueprint $table) {
            $table->id();
              $table->foreignId('assignment_id')
                ->constrained('assignment')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('student_id')
                ->constrained('student')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->string('assignment_file')->nullable();

            $table->text('assignment_remark')->nullable();

            $table->text('assignment_remarks_comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignment_has_submit');
    }
};
