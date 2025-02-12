<?php

namespace Database\Factories;

use App\Models\Qualification;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class QualificationSkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'qualification_id' => Qualification::inRandomOrder()->first()->id,
            'skill_id' => Skill::inRandomOrder()->first()->id,
            'points' => $this->faker->numberBetween(1, 20), // Puntos de habilidad asignados
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
