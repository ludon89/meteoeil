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
            'picture' => fake()->randomElement([
                'sample-images/sample-image1.jpg',
                'sample-images/sample-image2.jpg',
                'sample-images/sample-image3.jpg',
                'sample-images/sample-image4.jpg',
                'sample-images/sample-image5.jpg',
                'sample-images/sample-image6.jpg',
                'sample-images/sample-image7.jpg',
                'sample-images/sample-image8.jpg',
                'sample-images/sample-image9.jpg',
                'sample-images/sample-image10.jpg',
                'sample-images/sample-image11.jpg',
                'sample-images/sample-image12.jpg',
            ]),
            'location' => fake()->city(),
            'date' => fake()->dateTimeBetween('-1 year', 'now'),
            'time' => fake()->time('H:i'),
            'departement' => fake()->randomKey(config('departements')),
            'weather' => fake()->randomElement(config('weather')),
            'temperature' => fake()->numberBetween(-5, 35),
            'description' => fake()->paragraph(),
            'user_id' => User::all()->random()->id
        ];
    }
}
