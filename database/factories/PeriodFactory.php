<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Period>
 */
class PeriodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name,
            "quota" => fake()->numberBetween(1,100),
            "start_date" => fake()->dateTime,
            "end_date" => fake()->dateTime,
            "is_active" => fake()->boolean,
        ];
    }
}
