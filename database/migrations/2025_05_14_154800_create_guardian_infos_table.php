<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('guardian_infos', function (Blueprint $table) {
            $table->id();
              $table->bigInteger('student_id')->unsigned();  // Foreign key (if needed)
            $table->string('name');  // Guardian's name
            $table->string('mobile');  // Guardian's mobile number
            $table->string('email')->nullable();  // Guardian's email (nullable)
            $table->string('contact_no')->nullable();  // Guardian's contact number (nullable)
            $table->string('contact_address')->nullable();  
            $table->string('relation'); 
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardian_infos');
    }
};
