<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // Default password
            'profile_picture' => $this->faker->imageUrl(200, 200, 'people', true), // Random profile picture
            'remember_token' => Str::random(10),
        ];
    }
}
