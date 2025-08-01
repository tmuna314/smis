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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->char('teacher_id');
            $table->char('batch_id');
            $table->char('semester_id');
            $table->date('date');
            $table->enum('status', ['present', 'absent', 'late']);
            $table->text('remarks')->nullable();
            $table->timestamps();
            
            $table->unique(['student_id', 'subject_id', 'date']);
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
