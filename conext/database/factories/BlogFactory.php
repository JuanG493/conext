<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */

use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();
        return [
            'user_id' => User::factory(),
            'title' => $title,
            "slug" => Str::slug($title),
            'content' => $this->faker->paragraphs(3, true),
            'status' => $this->faker->randomElement(['published', 'draft', 'archived']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
