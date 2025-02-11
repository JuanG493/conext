<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Challenge>
 */
class ChallengeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'creator_id' => User::factory(),
            'description' => $this->faker->paragraph,
            'expected_output' => $this->faker->text,
            'status' => $this->faker->randomElement(['published', 'draft', 'archived']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
