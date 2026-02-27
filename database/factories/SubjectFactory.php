<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subjects = [
            "Português",
            "Matemática 1",
            "Matemática 2",
            "Matemática 3",
            "Matemática 4",
            "História do Mundo",
            "História do Brasil",
            "Geografia do Mundo",
            "Geografia do Brasil",
            "Biologia 1",
            "Biologia 2",
            "Física do Movimento",
            "Física da Energia",
            "Química Orgânica",
            "Química Inorgânica",
            "Filosofia",
            "Sociologia",
            "Inglês",
            "Redação"
        ];

        $subjectPicked = fake()->unique()->randomElement($subjects);

        return [
            'name' => $subjectPicked,
            'slug' => Str::slug($subjectPicked),
            'description' => fake()->sentence(),
            'workload' => fake()->randomElement([40, 60, 80, 120]),
        ];
    }
}
