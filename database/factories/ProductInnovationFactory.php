<?php

namespace Database\Factories;

use App\Enums\ProductChangeType;
use App\Models\Product;
use App\Models\ProductInnovation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductInnovation>
 */
class ProductInnovationFactory extends Factory
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
            'change_type' => fake()->randomElement(ProductChangeType::cases()),
            'description' => fake()->sentence(),
            'effective_date' => fake()->dateTimeBetween('-1 year'),
        ];
    }
}
