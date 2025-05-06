<?php

namespace Database\Seeders;

use App\Models\Anggrek;
use App\Models\Article;
use App\Models\history_inventaris_habis;
use App\Models\history_inventaris_tak_habis;
use App\Models\InventarisHabis;
use App\Models\InventarisTakHabis;
use App\Models\User;
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
            'foto_profile' => 'asset/Hero.jpg',
            'no_hp' => "01231231312"
        ]);
        User::factory()->create([
            'name' => 'karyawan',
            'email' => 'Karyawan@gmail.com',
            'password' => 'karyawan123',
            'role' => 'karyawan',
            'foto_profile' => 'asset/Hero.jpg',
            'no_hp' => "01231231312"
        ]);
        Anggrek::factory(11)->create();
        InventarisHabis::factory(2)->create();
        InventarisTakHabis::factory(2)->create();
        Article::factory(11)->create();
        history_inventaris_habis::factory(10)->create();
        history_inventaris_tak_habis::factory(10)->create();
    }
}
