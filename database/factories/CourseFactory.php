<?php

namespace Database\Factories;

use App\Models\CourseCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $courseCategory = CourseCategory::inRandomOrder()->first();
        return [
            'name' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'Fee' => $this->faker->numberBetween(1000, 5000),
            'course_category_id' => $courseCategory ? $courseCategory->id : null,
        ];
    }
}
