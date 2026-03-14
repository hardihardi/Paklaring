<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

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
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Create roles and assign permissions
        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'web']);
        $superAdmin->syncPermissions(Permission::all());

        $hrAdmin = Role::firstOrCreate(['name' => 'HR Admin', 'guard_name' => 'web']);
        $hrAdmin->syncPermissions([
            'create_employee',
            'edit_employee',
            'create_certificate',
            'download_certificate',
        ]);

        $hrManager = Role::firstOrCreate(['name' => 'HR Manager', 'guard_name' => 'web']);
        $hrManager->syncPermissions([
            'create_certificate',
            'download_certificate',
            'view_logs',
        ]);
    }
}
