<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\InventarisHabis;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HistoryInventarisHabis>
 */
class HistoryInventarisHabisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'waktu_penggunaan' => fake()->date(),
            'jumlah' => fake()->numberBetween(0, 199),
            'inventaris_habis_id' => InventarisHabis::factory(),
            'user_id' => User::factory(),
        ];
    }
}
