<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id();

            $table->string('full_name');


            $table->string('last_name')->nullable();

            // Student baad mein class join karega
            $table->foreignId('class_id')
                ->nullable()
                ->constrained('class')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->string('batch_code')->nullable();

            $table->string('father_name')->nullable();

            $table->string('cnic')->nullable()->unique();

            $table->enum('gender', ['male', 'female', 'other'])->nullable();

            $table->date('dob')->nullable();

            $table->string('contact_number')->nullable();

            $table->string('email_address')->nullable();

            $table->text('address')->nullable();

            $table->string('password');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};