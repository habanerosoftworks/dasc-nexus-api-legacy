<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'description' => $this->faker->text(100),
            'location' => $this->faker->sentence(2, true),
            'capacity' => $this->faker->numberBetween(10, 40),
            'building_id' => $this->faker->numberBetween(1, 10),
            'order_id' => $this->faker->randomLetter,
        ];
    }
}
