<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        $adminRole = Role::create(['name' => 'Admin']);
        $accountantRole = Role::create(['name' => 'Accountant']);

        // Create admin user
        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // Use a strong password in production
        ]);
        $adminUser->role()->associate($adminRole);
        $adminUser->save();

        // Create accountant user
        $accountantUser = User::create([
            'name' => 'Accountant User',
            'email' => 'accountant@example.com',
            'password' => bcrypt('password'), // Use a strong password in production
        ]);
        $accountantUser->role()->associate($accountantRole);
        $accountantUser->save();
    }
}
