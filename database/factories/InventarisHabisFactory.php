<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InventarisHabis>
 */
class InventarisHabisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'nama'=>fake()->name(),
          'jenis'=>fake()->unique()->word(2,true),
          'jumlah'=>fake()->numberBetween(1,100),
        ];
    }
}
