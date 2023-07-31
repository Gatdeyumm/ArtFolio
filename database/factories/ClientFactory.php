<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=> $this->faker->sentence(5),
            'description' => $this->faker->sentence(10),
            'artist' => $this->faker->name,
            'email' => $this->faker->safeEmail(),
            'price' => $this->faker->numberBetween(1000, 5000),
        ];
    }
}
