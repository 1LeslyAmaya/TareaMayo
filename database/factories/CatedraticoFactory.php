<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Catedratico>
 */
class CatedraticoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombres' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName() . ' ' . $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'telefono' => $this->faker->numerify('####-####'),
            'especialidad' => $this->faker->randomElement([
                'Programacion',
                'Bases de datos',
                'Redes',
                'Matematica',
                'Estadistica',
                'Administracion',
                'Sistemas operativos',
            ]),
        ];
    }
}
