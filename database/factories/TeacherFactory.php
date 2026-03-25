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

        $colleges = [
            "Universidade de São Paulo",
            "Universidade Estadual de Campinas",
            "Universidade Federal do Rio de Janeiro",
            "Universidade Federal de Minas Gerais",
            "Universidade de Brasília",
            "Universidade Federal do Rio Grande do Sul",
            "Universidade Federal de Santa Catarina",
            "Universidade Federal de Pernambuco",
            "Pontifícia Universidade Católica de São Paulo",
            "Fundação Getulio Vargas",
            "Universidade Presbiteriana Mackenzie",
            "Instituto Tecnológico de Aeronáutica"
        ];

        return [
            'user_id' => User::factory()->teacher(),
            'specialization' => fake()->randomElement($specializations),
            'specialization_college' => fake()->randomElement($colleges),
            'workload' => fake()->numberBetween(20, 40),
            'salary' => fake()->randomFloat(2, 2500, 8000),
        ];
    }
}
