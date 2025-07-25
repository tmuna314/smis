<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('leaves', function (Blueprint $table) {
            $table->enum('status', ['pending', 'approved', 'rejected'])
                  ->default('pending')
                  ->change(); // 👈 this line applies the default
        });
    }

    public function down()
    {
        Schema::table('leaves', function (Blueprint $table) {
            $table->enum('status', ['pending', 'approved', 'rejected'])->change(); // remove default
        });
    }
};