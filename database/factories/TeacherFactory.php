<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $specializations = [
            "Graduação (Licenciatura)",
            "Graduação (Bacharelado)",
            "Pós-Graduação (Lato Sensu)",
            "Especialização",
            "MBA",
            "Mestrado Acadêmico",
            "Mestrado Profissional",
            "Doutorado",
            "Pós-Doutorado (PhD)",
            "Livre-Docência"
        ];

        $subjects = [
            "Português",
            "Matemática",
            "História",
            "Geografia",
            "Biologia",
            "Física",
            "Química",
            "Filosofia",
            "Sociologia",
            "Inglês",
            "Educação Física",
            "Artes"
        ];

        return [
            'user_id' => User::factory(),
            'specialization' => fake()->randomElement($specializations) . 'em' . fake()->randomElement($subjects),
            'workload' => fake()->numberBetween(20, 40),
            'salary' => fake()->randomFloat(2, 2500, 8000),
        ];
    }
}
