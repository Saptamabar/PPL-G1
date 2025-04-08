<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Anggrek',
            'email' => 'admin@anggrekindah.com',
            'password' => Hash::make('password123'),
        ]);
        User::create([
            'name' => 'Karyawan Anggrek',
            'email' => 'Karyawan@anggrekindah.com',
            'password' => Hash::make('password123'),
        ]);
        User::create([
            'name' => 'Karyawan',
            'email' => 'Karyawan@gmail.com',
            'password' => Hash::make('password123'),
        ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'admin'
        ]);
    }
}
