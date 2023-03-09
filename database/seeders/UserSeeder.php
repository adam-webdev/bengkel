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
            'jenis_kelamin' => 'Laki laki',
            'foto' => 'default.jpg',
            'no_hp' => '089778788867',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123')
        ]);
        $admin->assignRole('Admin');

        $adminbengkel = User::create([
            'name' => 'adminbengkel',
            'jenis_kelamin' => 'Laki laki',
            'no_hp' => '089778737267',

            'foto' => 'default.jpg',
            'email' => 'adminbengkel@gmail.com',
            'password' => Hash::make('adminbengkel123')
        ]);
        $adminbengkel->assignRole('Admin Bengkel');

        $user = User::create([
            'name' => 'user',
            'jenis_kelamin' => 'Laki laki',
            'no_hp' => '089778712867',
            'foto' => 'default.jpg',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user123')
        ]);
        $user->assignRole('User');
    }
}
