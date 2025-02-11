<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
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
            'level_required' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement(['published', 'draft', 'archived']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
