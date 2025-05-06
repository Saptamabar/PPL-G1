<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\InventarisHabis;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\history_inventaris_habis>
 */
class history_inventaris_habisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'waktu penggunaan'=>fake()->date(),
            'jumlah'=>fake()->numberBetween(0,199),
            'inventaris_habis'=>InventarisHabis::all()->random()->nama,
            'user_id'=>User::all()->random()->id,
        ];
    }
}
