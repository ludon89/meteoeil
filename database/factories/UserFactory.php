<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'avatar' => fake()->randomElement([
                'sample-avatars/sample-avatar1.jpg',
                'sample-avatars/sample-avatar2.jpg',
                'sample-avatars/sample-avatar3.jpg',
                'sample-avatars/sample-avatar4.jpg',
                'sample-avatars/sample-avatar5.jpg',
                'sample-avatars/sample-avatar6.jpg',
                'sample-avatars/sample-avatar7.jpg',
                'sample-avatars/sample-avatar8.jpg',
                'sample-avatars/sample-avatar9.jpg',
                'sample-avatars/sample-avatar10.jpg',
                'sample-avatars/sample-avatar11.jpg',
                'sample-avatars/sample-avatar12.jpg',
            ]),
            'is_admin' => false,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
