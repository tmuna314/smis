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
        Schema::create('parent_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->string('father_name');
            $table->string('father_mobile', 15);
            $table->string('father_email')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('mother_name');
            $table->string('mother_mobile', 15);
            $table->string('mother_email')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parent_infos');
    }
};
