<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeacherAttendance>
 */
class TeacherAttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $entry_times = ['07:00:00', '08:30:00', '10:00:00'];
        $departure_times = ['08:30:00', '10:00:00', '11:30:00'];
        $randomIndex = $this->faker->numberBetween(0, 2);
        return [
            'session_dasc_id' => $this->faker->numberBetween(1, 10),
            'comment_id' => $this->faker->numberBetween(1, 10),
            'planning_id' => $this->faker->numberBetween(1, 10),
            'teacher_id' => $this->faker->numberBetween(1, 10),
            'study_plan_id' => $this->faker->numberBetween(1, 10),
            'academic_period_id' => $this->faker->numberBetween(1, 10),
            'date' => $this->faker->date(),
            'entry_time' => $entry_times[$randomIndex],
            'departure_time' => $departure_times[$randomIndex],
            'planned_activity' => $this->faker->text(255),
            'advance_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
