<?php

namespace Database\Seeders;

use App\Enums\DiscountType;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Database\Seeder;

class PromotionSeeder extends Seeder
{
    /**
     * Seed the product promotions and their discounted products.
     */
    public function run(): void
    {
        $promotions = [
            [
                'name' => 'Semana Láctea',
                'description' => 'Descuento de temporada en leches y yogures LALA.',
                'discount_type' => DiscountType::Percent,
                'discount_value' => 15,
                'starts_at' => now()->subDays(3),
                'ends_at' => now()->addDays(4),
                'is_active' => true,
                'products' => ['Leche Lala Entera 1 L', 'Leche Lala Deslactosada 1 L', 'Yogurazo Fresa 1 L'],
            ],
            [
                'name' => 'Quesos de fin de semana',
                'description' => 'Monto fijo de descuento en la línea de quesos.',
                'discount_type' => DiscountType::Fixed,
                'discount_value' => 10,
                'starts_at' => now()->subDay(),
                'ends_at' => now()->addDays(6),
                'is_active' => true,
                'products' => ['Queso Panela Lala 400 g', 'Queso Manchego Lala 400 g'],
            ],
            [
                'name' => 'Battre de regreso a clases',
                'description' => 'Promoción inactiva que sirve como borrador de campaña.',
                'discount_type' => DiscountType::Percent,
                'discount_value' => 20,
                'starts_at' => now()->addWeek(),
                'ends_at' => now()->addWeeks(3),
                'is_active' => false,
                'products' => ['Battre Chocolate 250 ml', 'Battre Vainilla 250 ml'],
            ],
        ];

        foreach ($promotions as $attributes) {
            $productNames = $attributes['products'];
            unset($attributes['products']);

            $promotion = Promotion::query()->updateOrCreate(['name' => $attributes['name']], $attributes);

            $promotion->products()->sync(
                Product::query()->whereIn('name', $productNames)->pluck('id'),
            );
        }
    }
}
