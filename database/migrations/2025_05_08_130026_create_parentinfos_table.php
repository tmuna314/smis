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
        Schema::create('parentinfos', function (Blueprint $table) {
            $table->id();
            $table->string('father_name');
            $table->integer('father_mobile');
            $table->string('father_email');
            $table->string('father_occupation');
            $table->string('mother_name');
            $table->integer('mother_mobile');
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
        Schema::dropIfExists('parentinfos');
    }
};
