<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Follower>
 */
class FollowerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $followedBy = User::inRandomOrder()->value('id');
        $following = User::where('id', '!=', $followedBy)->inRandomOrder()->value('id');

        return [
            'followed_by' => $followedBy,
            'following' => $following,
        ];
    }
}
