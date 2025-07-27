<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'create user',
            'create notice',
            'create student',
            'create teacher',
            'create faculties',
            'create batch',
            'create subject',
            'create semester',
            'create configuration',

            'view subjects',
            'view grades',
            'view notices',
            'view students',
            'view batches',

            'edit student',
            'edit teacher',
            'edit faculties',
            'edit batch',
            'edit subject',
            'edit semester',
            'edit configuration',
            'edit grades',
            'edit attendance',

            'delete student',
            'delete teacher',
            'delete faculties',
            'delete batch',
            'delete subject',
            'delete semester',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $teacher = Role::firstOrCreate(['name' => 'Teacher']);
        $student = Role::firstOrCreate(['name' => 'Student']);

        $admin->givePermissionTo(Permission::all());

        $teacher->givePermissionTo([
            'view subjects',
            'view students',
            'view batches',
            'edit grades',
            'edit attendance',
        ]);

        $student->givePermissionTo([
            'view subjects',
            'view grades',
            'view notices',
        ]);
    }
}
