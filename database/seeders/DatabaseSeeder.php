<?php

namespace Database\Seeders;

use App\Models\Anggrek;
use App\Models\User;
use GuzzleHttp\Promise\Create;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin123',
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'karyawan',
            'email' => 'karyawan@gmail.com',
            'password' => 'karyawan123',
            'role' => 'karyawan'
        ]);
        
        Anggrek::factory(5)->create();
    }
}
