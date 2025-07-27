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
        // No foreign keys to add since Subject model doesn't use semester_id
        // The subjects table already has faculty_id and batch_id foreign keys
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Nothing to rollback
    }
};
