<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Observation>
 */
class ObservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'picture' => '',
            'location' => fake()->city(),
            'date' => fake()->date(),
            'time' => fake()->time(),
            'departement' => fake()->departmentNumber(),
            'weather' => fake()->randomElement([
                'Ensoleillé',
                'Nuageux',
                'Couvert',
                'Pluie faible',
                'Pluie forte',
                'Neige',
                'Pluie et neige mêlées',
                'Orage',
                'Brouillard'
            ]),
            'temperature' => fake()->numberBetween(-40, 50),
            'description' => fake()->paragraph(),
            'user_id' => User::all()->random()->id
        ];
    }
}
