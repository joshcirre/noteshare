<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'user_id' => User::factory(),
            'subject' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'recipient' => $this->faker->email,
            'published' => true,
            'send_date' => $this->faker->dateTimeBetween('-30 days', '+30 days')->format('Y-m-d'),
            'heart_count' => $this->faker->numberBetween(0, 100),
        ];
    }
}
