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
            $table->string('registration_number')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('college_email')->nullable();
            $table->string('mobile', 15);
            $table->string('landline', 15)->nullable();
            $table->string('blood_group', 5)->nullable();
            $table->date('date_of_birth');
            $table->foreignId('batch_id')->constrained()->onDelete('cascade');
            $table->string('father_name');
            $table->string('father_mobile', 15);
            $table->string('father_email');
            $table->string('father_occupation');
            $table->string('mother_name');
            $table->string('mother_mobile', 15);
            $table->string('mother_email');
            $table->string('mother_occupation');
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
