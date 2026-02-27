<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grade>
 */
class GradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'subject_id' => Subject::factory(),
            'T1' => fake()->randomFloat(2, 0, 7),
            'A1' => fake()->randomFloat(2, 0, 3),
            'T2' => fake()->randomFloat(2, 0, 7),
            'A2' => fake()->randomFloat(2, 0, 3),
            'T3' => fake()->randomFloat(2, 0, 7),
            'A3' => fake()->randomFloat(2, 0, 3),
            'T4' => fake()->randomFloat(2, 0, 7),
            'A4' => fake()->randomFloat(2, 0, 3),
            'T5' => fake()->randomFloat(2, 0, 7),
            'A5' => fake()->randomFloat(2, 0, 3),
            'T6' => fake()->randomFloat(2, 0, 7),
            'A6' => fake()->randomFloat(2, 0, 3),
            'FT' => fake()->randomFloat(2, 0, 10),
            'Total' => fake()->randomFloat(2, 0, 100),
        ];
    }
}
