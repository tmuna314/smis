<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Batch;
use App\Models\Faculty;

class BatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample faculties first if they don't exist
        $faculty1 = Faculty::firstOrCreate(['name' => 'Computer Science']);

        $faculty2 = Faculty::firstOrCreate(['name' => 'Information Technology']);

        // Create sample batches
        Batch::firstOrCreate(['name' => 'CS 2021'], [
            'faculty_id' => $faculty1->id,
            //'start_year' => 2021,
            //'end_year' => 2025,
        ]);

        Batch::firstOrCreate(['name' => 'IT 2021'], [
            'faculty_id' => $faculty2->id,
            //'start_year' => 2021,
            //'end_year' => 2025
        ]);

        Batch::firstOrCreate(['name' => 'CS 2022'], [
            'faculty_id' => $faculty1->id,
            //'start_year' => 2022,
            //'end_year' => 2026
        ]);
    }
}
