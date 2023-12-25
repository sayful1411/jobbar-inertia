<?php

namespace Database\Factories;

use App\Enums\EmploymentType;
use Illuminate\Support\Number;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->realText(70),
            'employment_type' => fake()->randomElement(EmploymentType::cases())->value,
            'company_name' => fake()->company(),
            'role' => fake()->jobTitle(),
            'apply_url' => fake()->url(),
            'company_logo' => fake()->imageUrl(150, 150),
            'description' => fake()->realText(700),
            'salary' => Number::currency(fake()->numberBetween(500, 10000)) .
                    ' - ' . Number::currency(fake()->numberBetween(500, 10000))
        ];
    }
}
