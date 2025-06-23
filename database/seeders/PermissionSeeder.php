<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

public function run()
{
    $permissions = [
        'view students',
        'create students',
        'edit students',
        'delete students',
        'view faculties',
        'create faculties',
        'edit faculties',
        'delete faculties',
        'view batches',
        'create batches',
        'edit batches',
        'delete batches',
        'create attendance',
        'edit attendance',
        'view attendance',
        'delete attendance',
        // Role permissions
        'view role',
        'create role',
        'edit role',
        'delete role',
        // Add more as needed
    ];

    foreach ($permissions as $permission) {
        Permission::firstOrCreate(['name' => $permission]);
    }
    }
}
