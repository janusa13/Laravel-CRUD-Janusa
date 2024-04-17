<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'alumn_DNI' => $this->faker->unique()->randomNumber(8),
            'nombre' => $this->faker->firstName,
            'apellido' => $this->faker->lastName,
            'asistencias' => $this->faker->numberBetween(0, 30),
            'fecha_nac' => $this->faker->date(),
            'grupo' => $this->faker->randomElement(['A', 'B']),
        ];
    }
}
