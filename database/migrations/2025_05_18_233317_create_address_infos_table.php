<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressInfosTable extends Migration
{
    public function up(): void
    {
        Schema::create('address_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id'); 
            $table->string('province');
            $table->string('district');
            $table->string('ward_or_vdc');
            $table->string('tole_or_street');
            $table->boolean('is_permanent')->default(false);
            $table->timestamps();

            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('address_infos');
    }
}
