<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $adminRole = Role::firstOrCreate(['name' => 'Admin']);

        // Create the admin user if not exists
        $adminUser = User::firstOrCreate(
            ['email' => 'muna1@gmail.com'],
            [
                'name' => 'Muna Thapa',
                'password' => bcrypt('Munadon123'),
            ]
        );

        // Assign the admin role
        if (!$adminUser->hasRole('Admin')) {
            $adminUser->assignRole($adminRole);
        }
    }
}