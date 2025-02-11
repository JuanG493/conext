<?php

namespace Database\Factories;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name' => $this->faker->company,
            'company_website' => $this->faker->url,
            'about_company' => $this->faker->paragraph,
            'experience_id' => Experience::factory(),
            // 'created_at' => now(),
            // 'updated_at' => now(),
        ];
    }
}
