<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Anggrek;
use App\Models\Article;
use App\Models\InventarisHabis;
use Illuminate\Database\Seeder;
use App\Models\InventarisTakHabis;
use App\Models\HistoryInventarisHabis;
use App\Models\HistoryInventarisTakHabis;
use App\Models\history_inventaris_tak_habis;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin123',
            'role' => 'admin',
            'foto_profile' => 'Hero_ebhvs9',
            'no_hp' => "01231231312"
        ]);
        User::factory()->create([
            'name' => 'karyawan',
            'email' => 'Karyawan@gmail.com',
            'password' => 'karyawan123',
            'role' => 'karyawan',
            'foto_profile' => 'Hero_ebhvs9',
            'no_hp' => "01231231312"
        ]);
        Anggrek::factory(11)->create();
        InventarisHabis::factory(2)->create();
        InventarisTakHabis::factory(2)->create();
        Article::factory(11)->create();
        HistoryInventarisHabis::factory(10)->create();
        HistoryInventarisTakHabis::factory(10)->create();
    }
}
