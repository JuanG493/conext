<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Portfolio>
 */
class PortfolioFactory extends Factory
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
            'user_id' => User::factory(),
            'description' => $this->faker->paragraph,
            'repository' => $this->faker->url(),
            'status' => $this->faker->randomElement(['active', 'paused', 'completed']),
            // 'created_at' => now(),
            // 'updated_at' => now(),
        ];
    }
}
