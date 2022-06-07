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
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123')
        ]);
        $user->assignRole('Admin');

        $direktur = User::create([
            'name' => 'kaprodi',
            'email' => 'kaprodi@gmail.com',
            'password' => Hash::make('kaprodi123')
        ]);
        $direktur->assignRole('Kaprodi');

        $kepala_lab = User::create([
            'name' => 'kepala lab',
            'email' => 'kepalalab@gmail.com',
            'password' => Hash::make('kepalalab123')
        ]);
        $kepala_lab->assignRole('Kepala Lab');
    }
}