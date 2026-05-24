<?php

namespace Database\Factories;

use App\Models\Catedratico;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'catedratico_id' => Catedratico::factory(),
            'codigo' => strtoupper($this->faker->unique()->bothify('CUR-####')),
            'nombre' => $this->faker->randomElement([
                'Programacion',
                'Base de Datos',
                'Analisis de Sistemas',
                'Desarrollo Web',
                'Redes de Computadoras',
                'Matematica Discreta',
                'Estadistica',
                'Sistemas Operativos',
                'Ingenieria de Software',
                'Arquitectura de Computadoras',
            ]) . ' ' . $this->faker->numberBetween(1, 5),
            'descripcion' => $this->faker->sentence(12),
            'creditos' => $this->faker->numberBetween(2, 5),
            'ciclo' => $this->faker->randomElement(['primer ciclo', 'segundo ciclo', 'interciclo']),
        ];
    }
}
