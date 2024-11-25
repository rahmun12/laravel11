<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rak>
 */
class RakFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
                'rak_id' => fake()->numerify(),
                'rak_nama' => fake()->name(),
                'rak_lokasi' => fake()->address(),
                'rak_kapasitas' => fake()->randomDigit(),
            
        ];
    }
}
