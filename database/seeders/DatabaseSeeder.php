<?php

namespace Database\Seeders;

use App\Models\Anggrek;
use App\Models\Article;
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
        ]);
        Anggrek::factory(11)->create();
        InventarisHabis::factory(2)->create();
        InventarisTakHabis::factory(2)->create();
        Article::factory(11)->create();
    }
}
