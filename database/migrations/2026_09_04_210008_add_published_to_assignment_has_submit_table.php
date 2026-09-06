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
    Schema::table('assignment_has_submit', function (Blueprint $table) {
        $table->boolean('published')->default(false)->after('grade');
    });
}
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('assignment_has_submit', function (Blueprint $table) {
        $table->dropColumn('published');
    });
}
};
