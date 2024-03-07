<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pieza>
 */
class PiezaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'precio' => fake()->randomFloat(2, 0, 1000),
            'descripcion' => fake()->text(),
            'cantidad' => fake()->numberBetween(0, 100),
            'imagen' => 'https://static.vecteezy.com/system/resources/previews/000/439/863/original/vector-users-icon.jpg',
            'categoria_id' => fake()->numberBetween(1, 10),
            'isDeleted' => false,
        ];
    }
}
