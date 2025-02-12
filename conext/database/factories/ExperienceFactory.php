<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'job_headline' => $this->faker->jobTitle,
            'type' => $this->faker->randomElement(['Full-time', 'Part-time', 'Contract']),
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->optional()->date,
            'location' => $this->faker->city,
            'is_current_role' => $this->faker->boolean,
            'description' => $this->faker->paragraph,
        ];
    }
}
