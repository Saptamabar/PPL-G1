<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anggrek>
 */
class AnggrekFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_anggrek' => fake()->unique()->words(2, true),
            'foto'=> 'Hero_ebhvs9',
            'nama_latin' => fake()->unique()->words(2, true),
            'deskripsi' => fake()->unique()->words(2, true),
        ];
    }
}
