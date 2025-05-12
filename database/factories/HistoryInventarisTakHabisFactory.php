<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\InventarisHabis;
use App\Models\InventarisTakHabis;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\history_inventaris_tak_habis>
 */
class HistoryInventarisTakHabisFactory extends Factory
{
    public function definition(): array
    {
        return [
            'waktu_peminjaman' => fake()->date(),
            'waktu_pengembalian' => fake()->optional()->date(),
            'inventaris_tak_habis_id' => InventarisTakHabis::factory(),
            'user_id' => User::factory()
        ];
    }
}
