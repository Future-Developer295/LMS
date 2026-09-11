<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('assignment', function (Blueprint $table) {
            $table->foreignId('topic_id')->nullable()->after('class_timing_id')
                ->constrained('topics')->nullOnDelete();
            $table->date('posted_at')->nullable()->after('assignment_due_date');
            $table->string('resource_label')->nullable()->after('assignment_instruction');
            $table->string('resource_link')->nullable()->after('resource_label');
        });
    }

    public function down(): void
    {
        Schema::table('assignment', function (Blueprint $table) {
            $table->dropConstrainedForeignId('topic_id');
            $table->dropColumn(['posted_at', 'resource_label', 'resource_link']);
        });
    }
};