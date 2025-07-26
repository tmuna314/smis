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
        Schema::create('address_infos', function (Blueprint $table) {
            $table->id();
            $table->morphs('addressable'); // For polymorphic relationship
            $table->enum('type', ['permanent', 'temporary', 'current']);
            $table->string('street_address');
            $table->string('city');
            $table->string('state');
            $table->string('postal_code', 10);
            $table->string('country')->default('Nepal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address_infos');
    }
};
