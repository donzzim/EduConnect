<?php

namespace Database\Factories;

use App\Models\Classroom;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->student(),
            'classroom_id' => Classroom::factory(),
            'status' => 'enrolled',
            'guardian' => fake()->name(fake()->randomElement(['male', 'female'])),
            'guardian_contact' => fake()->phoneNumber(),
        ];
    }
}
