<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => substr($this->faker->name(), 0, 20),
            'last_name_father' => substr($this->faker->lastName(), 0, 20),
            'last_name_mother' => substr($this->faker->lastName(), 0, 20),
            'birthdate' => $this->faker->date(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->numerify('##########'),
            'address' => $this->faker->address(),
        ];
    }
}
