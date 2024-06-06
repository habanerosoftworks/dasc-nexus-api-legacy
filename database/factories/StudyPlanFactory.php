<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudyPlan>
 */
class StudyPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'major_id' => $this->faker->numberBetween(1, 10),
            'start' => $this->faker->numberBetween(2020, 2024),
            'end' => $this->faker->numberBetween(2024, 2028),
        ];
    }
}
