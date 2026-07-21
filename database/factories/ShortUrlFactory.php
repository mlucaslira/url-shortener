<?php

namespace Database\Factories;

use App\Models\ShortUrl;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<ShortUrl>
 */
class ShortUrlFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'user_id' => null,
        'original_url' => fake()->url(),
        'short_code' => Str::random(6),
        'title' => fake()->sentence(3),
        'description' => fake()->paragraph(),
        'favicon_url' => fake()->imageUrl(64, 64),
        'is_custom' => false,
        'is_active' => true,
        'clicks' => 0,
        'last_clicked_at' => null,
        'redirect_delay' => 1,
        'expires_at' => null,
        ];
    }
}
