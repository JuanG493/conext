<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Level>
 */
class LevelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'level' => $this->faker->word,
            'experience_required' => $this->faker->numberBetween(0, 100),
            // 'created_at' => now(),
            // 'updated_at' => now(),
        ];
    }
}
