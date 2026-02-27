<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classroom>
 */
class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                '1º Ano A',
                '1º Ano B',
                '1º Ano C',
                '2º Ano A',
                '2º Ano B',
                '2º Ano C',
                '3º Ano A',
                '3º Ano B',
            ]),
            'shift' => fake()->randomElement(['morning', 'afternoon', 'night']),
            'school_year' => 2026,
        ];
    }
}
