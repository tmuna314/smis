<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Contracts\Role;

class RoleSeeder extends Seeder
{

    public function run(): void
    {
        $roles = [
            'Admin',
            'Student',
            'Teacher',
        ];

        // Create each role if it doesn't exist
        foreach ($roles as $role) {
            \Spatie\Permission\Models\Role::firstOrCreate(['name' => $role]);
        }

        // Define permissions
        $permissions = [
            'view attendance',
            'create attendance',
            'update attendance',
            'delete attendance'
        ];
        foreach ($permissions as $permission) {
            \Spatie\Permission\Models\Permission::firstOrCreate(['name' => $permission]);
        }

        $teacherRole = \Spatie\Permission\Models\Role::where('name', 'Teacher')->first();
        $studentRole = \Spatie\Permission\Models\Role::where('name', 'Student')->first();
        $adminRole = \Spatie\Permission\Models\Role::where('name', 'Admin')->first();

        if ($teacherRole) {
            // Assign all permissions that start with 'view ' or contain 'attendance' to Teacher
            $teacherPermissions = collect($permissions)
                ->filter(fn($perm) => str_starts_with($perm, 'view ') || str_contains($perm, 'attendance'))
                ->values()
                ->all();
            $teacherRole->syncPermissions($teacherPermissions);
        }

        // Assign only view attendance to Student and Admin (plus all permissions to Admin if needed)
        if ($studentRole) {
            $studentRole->syncPermissions(['view attendance']);
        }
        if ($adminRole) {
            $adminRole->syncPermissions($permissions);
        }
    }
}
