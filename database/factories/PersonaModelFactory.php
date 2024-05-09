<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ci' => $this->faker->unique()->numerify('##########'),
            'nombre' => $this->faker->firstName,
            'paterno' => $this->faker->lastName,
            'materno' => $this->faker->lastName,
            'celular' => $this->faker->numerify('########'),
            'expedido' => $this->faker->randomElement(['LP', 'OR', 'CBBA', 'PT', 'SC', 'BN', 'TR', 'PN', 'CH']),
            'fecha_nac' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'correo' => $this->faker->unique()->safeEmail,
            'estado' => $this->faker->randomElement(['0', '1']),
            'genero' => $this->faker->randomElement(['M', 'F']),
            'complemento' => $this->faker->text(5),
        ];
    }
}
