<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

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
            ['email' => 'muna@gmail.com'],
            [
                'name' => 'Muna Thapa',
                'password' => bcrypt('passw0rd'),
            ]
        );

        // Assign the admin role
        if (!$adminUser->hasRole('Admin')) {
            $adminUser->assignRole($adminRole);
        }
    }
}
