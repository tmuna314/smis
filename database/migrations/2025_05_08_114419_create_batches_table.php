<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateBatchesTable extends Migration
{
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('faculty_id')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
         $table->timestamps();

          
        });
    }

    public function down()
    {
        Schema::dropIfExists('batches');
    }
}
