<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instructor>
 */
class InstructorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'father_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'position' => $this->faker->jobTitle(),
            'phone_number' => $this->faker->phoneNumber(),
            'photo_url' => "/files/instructors/photos/avatar-5.jpg",
        ];
    }
}
