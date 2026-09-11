<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('assignment_has_submit', function (Blueprint $table) {
            $table->decimal('grade', 8, 2)
                ->nullable()
                ->after('assignment_remarks_comments');
        });
    }

    public function down(): void
    {
        Schema::table('assignment_has_submit', function (Blueprint $table) {
            $table->dropColumn('grade');
        });
    }
};