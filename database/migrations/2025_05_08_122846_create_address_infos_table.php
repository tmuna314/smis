<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressInfosTable extends Migration
{
    public function up()
    {
        Schema::create('address_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('province_name');
            $table->string('district_name');
            $table->string('ward_vdc');
            $table->string('tole_street');
            $table->boolean('is_permanent');
            $table->timestamps();
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('address_infos');
    }
}