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
            'T1' => $this->termGrade(7),
            'A1' => $this->termGrade(3),
            'T2' => $this->termGrade(7),
            'A2' => $this->termGrade(3),
            'T3' => $this->termGrade(7),
            'A3' => $this->termGrade(3),
            'T4' => $this->termGrade(7),
            'A4' => $this->termGrade(3),
            'T5' => $this->termGrade(7),
            'A5' => $this->termGrade(3),
            'T6' => $this->termGrade(7),
            'A6' => $this->termGrade(3),
            'FT' => fake()->boolean(20) ? fake()->randomFloat(2, 0, 10) : 0,
        ];
    }

    private function termGrade(int $max): float
    {
        return fake()->randomFloat(2, 0, $max);
    }
}
