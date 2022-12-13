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
            'posisi_id' => 1,
            'seksi_id' => 1,
            'pgr_id' => 1,
            'nik' => 123,
            'jenis_kelamin' => 'Laki laki',
            'foto' => 'default.jpg',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123')
        ]);
        $admin->assignRole('Admin');

        $staff = User::create([
            'name' => 'staff',
            'posisi_id' => 2,
            'seksi_id' => 2,
            'pgr_id' => 2,
            'nik' => 123456,
            'jenis_kelamin' => 'Laki laki',
            'foto' => 'default.jpg',
            'email' => 'staff@gmail.com',
            'password' => Hash::make('staff123')
        ]);
        $staff->assignRole('Staff');

        $manager = User::create([
            'name' => 'manager',
            'posisi_id' => 3,
            'seksi_id' => 3,
            'pgr_id' => 3,
            'nik' => 1233211,
            'jenis_kelamin' => 'Laki laki',
            'foto' => 'default.jpg',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('manager123')
        ]);
        $manager->assignRole('Manager');

        $user = User::create([
            'name' => 'user',
            'posisi_id' => 4,
            'seksi_id' => 4,
            'pgr_id' => 4,
            'nik' => 1232222,
            'jenis_kelamin' => 'Laki laki',
            'foto' => 'default.jpg',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user123')
        ]);
        $user->assignRole('User');
    }
}