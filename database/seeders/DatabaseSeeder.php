<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RolePermissionSeeder::class);

        $user = User::factory()->create([
            'name' => 'HR Admin',
            'email' => 'hr@bumame.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('Super Admin');
    }
}
