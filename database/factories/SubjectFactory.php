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
        $catalog = [
            ['name' => 'Língua Portuguesa', 'workload' => 120],
            ['name' => 'Matemática', 'workload' => 120],
            ['name' => 'História', 'workload' => 80],
            ['name' => 'Geografia', 'workload' => 80],
            ['name' => 'Ciências', 'workload' => 80],
            ['name' => 'Biologia', 'workload' => 80],
            ['name' => 'Física', 'workload' => 80],
            ['name' => 'Química', 'workload' => 80],
            ['name' => 'Filosofia', 'workload' => 40],
            ['name' => 'Sociologia', 'workload' => 40],
            ['name' => 'Arte', 'workload' => 40],
            ['name' => 'Educação Física', 'workload' => 40],
            ['name' => 'Língua Inglesa', 'workload' => 60],
            ['name' => 'Redação', 'workload' => 60],
        ];

        $subject = fake()->randomElement($catalog);

        return [
            'name' => $subject['name'],
            'slug' => Str::slug($subject['name']),
            'description' => fake()->sentence(10),
            'workload' => $subject['workload'],
        ];
    }
}
