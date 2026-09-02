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
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('last_name');

            $table->foreignId('class_id')
                ->constrained('class')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->string('batch_code');

            $table->string('father_name');
            $table->string('cnic')->unique();

            $table->enum('gender', ['male', 'female', 'other']);

            $table->date('dob');

            $table->string('contact_number');
            $table->string('email_address')->nullable();

            $table->text('address')->nullable();
            $table->string('emergency_contact');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
