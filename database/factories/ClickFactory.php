<?php

namespace Database\Factories;

use App\Models\Click;
use App\Models\ShortUrl;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Click>
 */
class ClickFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'short_url_id' => ShortUrl::factory(),
        'ip' => fake()->ipv4(),
        'user_agent' => fake()->userAgent(),
        'referrer' => fake()->optional()->url(),
        'clicked_at' => fake()->dateTimeBetween('-30 days'),
        ];
    }
}
