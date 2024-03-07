<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehiculo>
 */
class VehiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'marca' => fake()->word(),
            'modelo' => fake()->word(),
            'year' => fake()->year(),
            'km' => fake()->randomNumber(5),
            'precio' => fake()->randomFloat(2, 0, 100000),
            'cantidad' => fake()->numberBetween(0, 100),
            'categoria_id' => fake()->numberBetween(1, 10),
            'isDeleted' => false,
        ];
    }
}
