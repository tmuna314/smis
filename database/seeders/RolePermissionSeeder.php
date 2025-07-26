<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        $permissions = [
            'view students',
            'create student',
            'edit student',
            'delete student',
            'view teachers',
            'create teacher',
            'edit teacher',
            'delete teacher',
            'view subjects',
            'create subject',
            'edit subject',
            'delete subject',
            'view batches',
            'create batch',
            'edit batch',
            'delete batch',
            'view faculties',
            'create faculty',
            'edit faculty',
            'delete faculty',
            'view notices',
            'create notice',
            'edit notice',
            'delete notice',
            'view users',
            'create user',
            'edit user',
            'delete user',
            'view roles',
            'create role',
            'edit role',
            'delete role',
            'view attendance',
            'create attendance',
            'edit attendance',
            'delete attendance',
            'view leaves',
            'create leave',
            'edit leave',
            'delete leave',
            'approve leave',
            'reject leave',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $teacherRole = Role::firstOrCreate(['name' => 'Teacher']);
        $studentRole = Role::firstOrCreate(['name' => 'Student']);

        // Assign all permissions to Admin
        $adminRole->givePermissionTo(Permission::all());

        // Assign specific permissions to Teacher
        $teacherRole->givePermissionTo([
            'view students',
            'view teachers',
            'view subjects',
            'view batches',
            'view faculties',
            'view notices',
            'create notice',
            'edit notice',
            'view attendance',
            'create attendance',
            'edit attendance',
            'view leaves',
            'approve leave',
            'reject leave',
        ]);

        // Assign specific permissions to Student
        $studentRole->givePermissionTo([
            'view notices',
            'view attendance',
            'create leave',
            'view leaves',
        ]);
    }
}
