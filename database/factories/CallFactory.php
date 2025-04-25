<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\WithFaker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Call>
 */
class CallFactory extends Factory
{
    use WithFaker;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => $this->faker()->phoneNumber,
            'duration' => $this->faker()->randomNumber(2, true),
            'type' => $this->faker()->randomElement(['incoming', 'outgoing', 'missed']),
            'user_id' => User::factory(),
            'recording_path' => '',
        ];
    }
}
