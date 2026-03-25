<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

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
        $schoolYear = (int) now()->format('Y');
        $gradeLevel = fake()->numberBetween(1, 3);
        $section = Arr::random(['A', 'B', 'C', 'D']);
        return [
            'name' => sprintf('%dº Ano %s', $gradeLevel, $section),
            'shift' => Arr::random(['morning', 'afternoon', 'night']),
            'school_year' => $schoolYear,
        ];
    }
    public function morning(): static
    {
        return $this->state(fn() => ['shift' => 'morning']);
    }

    public function afternoon(): static
    {
        return $this->state(fn() => ['shift' => 'afternoon']);
    }

    public function night(): static
    {
        return $this->state(fn() => ['shift' => 'night']);
    }
}
