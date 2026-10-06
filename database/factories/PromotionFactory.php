<?php

namespace Database\Factories;

use App\Enums\DiscountType;
use App\Models\Promotion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Promotion>
 */
class PromotionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => Str::title(fake()->unique()->words(3, true)),
            'description' => fake()->sentence(),
            'discount_type' => fake()->randomElement(DiscountType::cases()),
            'discount_value' => fake()->randomFloat(2, 5, 100),
            'starts_at' => now()->subWeek(),
            'ends_at' => now()->addWeek(),
            'is_active' => true,
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes): array => [
            'is_active' => false,
        ]);
    }

    public function percent(): static
    {
        return $this->state(fn (array $attributes): array => [
            'discount_type' => DiscountType::Percent,
            'discount_value' => fake()->numberBetween(5, 50),
        ]);
    }
}
