<?php

namespace Database\Factories;

use App\Models\Level;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // return [
        //     'name' => fake()->name(),
        //     'email' => fake()->unique()->safeEmail(),
        //     'email_verified_at' => now(),
        //     'password' => static::$password ??= Hash::make('password'),
        //     'remember_token' => Str::random(10),
        // ];

        $userName = $this->faker->userName();
        return [
            'name' => $this->faker->name(),
            'last_name' => $this->faker->lastName,
            "username"  => $userName,
            'slug' => Str::slug($userName),
            'email' => $this->faker->unique()->safeEmail,
            'phone_number' => $this->faker->phoneNumber,
            'phone_visibility' => $this->faker->boolean,
            'website' => $this->faker->url,
            'website_visibility' => $this->faker->boolean,
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            "total_experience" => fake()->biasedNumberBetween(10, 100),
            'profile_picture' => $this->faker->imageUrl(200, 200, 'people'),
            'level_id' => Level::inRandomOrder()->value('id'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
