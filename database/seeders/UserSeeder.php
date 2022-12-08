<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123')
        ]);
        $admin->assignRole('Admin');

        $manager = User::create([
            'name' => 'staff',
            'email' => 'staff@gmail.com',
            'password' => Hash::make('staff123')
        ]);
        $manager->assignRole('Staff');

        $user = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user123')
        ]);
        $user->assignRole('User');
    }
}