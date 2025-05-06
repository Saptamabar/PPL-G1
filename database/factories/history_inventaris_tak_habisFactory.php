<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\InventarisHabis;
use App\Models\InventarisTakHabis;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\history_inventaris_tak_habis>
 */
class history_inventaris_tak_habisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'waktu peminjaman'=>fake()->date(),
            'waktu pengembalian'=>fake()->date(),
            'inventaris_tak_habis'=>InventarisTakHabis::all()->random()->nama,
            'user_id'=>User::all()->random()->id
        ];
    }
}
