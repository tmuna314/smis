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
         Schema::create('notices', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description')->nullable();
        $table->boolean('isTuRelated')->default(false);
        $table->boolean('isHoliday')->default(false);
        $table->boolean('isForAll')->default(false);
        $table->string('isFor')->nullable();  
        $table->unsignedBigInteger('created_by');  // user who created it
        $table->timestamps();

        $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notices');
    }
};
