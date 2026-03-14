<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Create permissions
        $permissions = [
            'manage_departments',
            'manage_positions',
            'create_employee',
            'edit_employee',
            'create_certificate',
            'download_certificate',
            'manage_settings',
            'view_logs',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles and assign permissions
        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin']);
        $superAdmin->syncPermissions(Permission::all());

        $hrAdmin = Role::firstOrCreate(['name' => 'HR Admin']);
        $hrAdmin->syncPermissions([
            'create_employee',
            'edit_employee',
            'create_certificate',
            'download_certificate',
        ]);

        $hrManager = Role::firstOrCreate(['name' => 'HR Manager']);
        $hrManager->syncPermissions([
            'create_certificate',
            'download_certificate',
            'view_logs',
        ]);
    }
}
