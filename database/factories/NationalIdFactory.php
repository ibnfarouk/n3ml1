<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NationalId>
 */
class NationalIdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'national_id' => $this->faker->unique()->randomNumber(8),
            'expiry_date' => $this->faker->date(),
            'user_id' => \App\Models\User::factory()
        ];
    }
}
