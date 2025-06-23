<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchesTable extends Migration
{
    public function up(): void
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->id(); // id
            $table->string('name'); // name
            $table->boolean('is_active')->default(true); // is_active
            $table->unsignedBigInteger('faculty_id'); // faculty_id
            $table->string('created_by')->nullable(); // created_by
            $table->timestamps(); // created_at & updated_at

            // Optional: foreign key constraint
            $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('batches');
    }
}
