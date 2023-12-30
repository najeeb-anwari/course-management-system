<?php

namespace Database\Factories;

use App\Models\CourseCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseCategory>
 */
class CourseCategoryFactory extends Factory
{
    protected $model = CourseCategory::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryName = $this->faker->word();
        $parentCategory = CourseCategory::inRandomOrder()->first();
        return [
            'category_name' => $categoryName,
            'slug' => Str::slug($categoryName),
            'description' => $this->faker->sentence(),
            'parent_category_id' => $parentCategory ? $parentCategory->id : null,
        ];
    }
}
