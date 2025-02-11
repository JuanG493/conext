<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EducationDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'degree' => $this->faker->word,
            'field_of_study' => $this->faker->word,
            'grade' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'user_id' => User::factory(),
            // 'created_at' => now(),
            // 'updated_at' => now(),
        ];
    }
}
