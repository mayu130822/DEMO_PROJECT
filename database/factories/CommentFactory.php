<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition()
    {
        return [
            'post_id' => Post::inRandomOrder()->first()->id, // Use an existing post
            'user_id' => User::inRandomOrder()->first()->id, // Use an existing user
            'content' => $this->faker->sentence(), // Random comment content
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
