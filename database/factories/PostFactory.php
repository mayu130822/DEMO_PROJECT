<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id, 
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraphs(3, true), // Generate multiple paragraphs
            'status' => $this->faker->randomElement(['draft', 'published', 'archived']), // Random status
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
