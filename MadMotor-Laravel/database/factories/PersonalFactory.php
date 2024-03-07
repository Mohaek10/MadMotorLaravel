<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personal>
 */
class PersonalFactory extends Factory
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
            'apellidos' => fake()->lastName(),
            'fecha_nacimiento' => fake()->date(),
            'dni' => fake()->unique()->name(),
            'direccion' => fake()->address(),
            'telefono' => fake()->phoneNumber(),
            'sueldo' => fake()->randomFloat(2, 0, 1000),
            'iban' => fake()->iban(),
            'email' => fake()->unique()->safeEmail(),
            'password' => fake()->password(),
            'role' => 'Personal',
            'isDeleted' => false,

        ];
    }
}
