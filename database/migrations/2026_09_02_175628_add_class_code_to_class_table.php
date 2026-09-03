<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('class', function (Blueprint $table) {
            $table->string('class_code')->unique()->after('class_name');
        });
    }

    public function down(): void
    {
        Schema::table('class', function (Blueprint $table) {
            $table->dropColumn('class_code');
        });
    }
};