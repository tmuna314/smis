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
        Schema::table('students', function (Blueprint $table) {
            $table->string('father_name')->after('batch_id')->nullable();
            $table->string('father_mobile')->after('father_name')->nullable();
            $table->string('father_occupation')->after('father_mobile')->nullable();
            $table->string('mother_name')->after('father_occupation')->nullable();
            $table->string('mother_mobile')->after('mother_name')->nullable();
            $table->string('mother_occupation')->after('mother_mobile')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn([
                'father_name',
                'father_mobile',
                'father_occupation',
                'mother_name',
                'mother_mobile',
                'mother_occupation',
            ]);
        });
    }
};
