<?php

namespace Database\Factories;

use App\Models\Submission;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Qualification>
 */
class QualificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'submission_id' => Submission::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id, // Usuario que califica
            'feedback' => $this->faker->paragraph(3),
            'exp_points' => $this->faker->numberBetween(10, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
