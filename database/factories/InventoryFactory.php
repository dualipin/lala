<?php

namespace Database\Factories;

use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'physical_stock' => fake()->numberBetween(100, 500),
            'digital_stock' => fake()->numberBetween(100, 500),
            'last_counted_at' => fake()->dateTimeBetween('-30 days'),
        ];
    }

    /**
     * Indicate that the product is out of stock.
     */
    public function empty(): static
    {
        return $this->state(fn (array $attributes) => [
            'physical_stock' => 0,
            'digital_stock' => 0,
        ]);
    }
}
