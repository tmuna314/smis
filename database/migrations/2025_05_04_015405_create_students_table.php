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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('registration_no')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('college_email');
            $table->string('mobile');
            $table->string('landline');
            $table->string('blood_group');
            $table->string('date_of_birth');
            $table->integer('batch_id');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
