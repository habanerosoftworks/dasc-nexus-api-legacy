<?php

namespace Database\Factories;

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
        $teoric_hours = $this->faker->numberBetween(4, 10);
        $practice_hours = $this->faker->numberBetween(4, 10);
        $total_hours = $teoric_hours + $practice_hours;
        return [
            'semester_id' => $this->faker->numberBetween(1, 10),
            'area_id' => $this->faker->numberBetween(1, 10),
            'code' => substr($this->faker->unique()->word(), 0, 6),
            'teoric_hours' => $teoric_hours,
            'practice_hours' => $practice_hours,
            'credits' => $this->faker->numberBetween(4, 10),
            'character' => $this->faker->word(),
            'name' => $this->faker->sentence(3),
            'total_hours' => $total_hours,
        ];
    }
}
