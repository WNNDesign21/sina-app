<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'code' => fake()->bothify('??###'),
            'name' => fake()->sentence(3),
            'sks' => fake()->numberBetween(2, 4),
        ];
    }
}
