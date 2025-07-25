<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
    }


    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // Drop created_at and updated_at columns
            $table->dropColumn([ 'updated_at']);
        });
        Schema::table('users', function (Blueprint $table) {
            // Drop created_at and updated_at columns
            $table->dropColumn([ 'updated_at']);
        });
    }
};
