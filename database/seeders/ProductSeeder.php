<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Seed the commercial catalogue and its inventory records.
     */
    public function run(): void
    {
        $products = [
            ['category' => 'Leches UHT', 'name' => 'Leche Lala Entera 1 L', 'price' => 27.90, 'packaging' => 'Tetra Pak', 'presentation' => 'Entera', 'size' => '1 L'],
            ['category' => 'Leches UHT', 'name' => 'Leche Lala Deslactosada 1 L', 'price' => 29.50, 'packaging' => 'Tetra Pak', 'presentation' => 'Deslactosada', 'size' => '1 L'],
            ['category' => 'Leches UHT', 'name' => 'Leche Lala Sin Lactosa 1 L', 'price' => 31.00, 'packaging' => 'Tetra Pak', 'presentation' => 'Sin lactosa', 'size' => '1 L'],
            ['category' => 'Leches UHT', 'name' => 'Leche Lala Entera 2 L', 'price' => 52.90, 'packaging' => 'Cubeta', 'presentation' => 'Entera', 'size' => '2 L'],
            ['category' => 'Yogures', 'name' => 'Yogurazo Fresa 1 L', 'price' => 34.50, 'packaging' => 'Botella', 'presentation' => 'Fresa', 'size' => '1 L'],
            ['category' => 'Yogures', 'name' => 'Yogurazo Vainilla 1 L', 'price' => 34.50, 'packaging' => 'Botella', 'presentation' => 'Vainilla', 'size' => '1 L'],
            ['category' => 'Yogures', 'name' => 'Yogur Lala Natural 125 g', 'price' => 12.50, 'packaging' => 'Vaso', 'presentation' => 'Natural', 'size' => '125 g'],
            ['category' => 'Quesos y Cremeras', 'name' => 'Queso Panela Lala 400 g', 'price' => 68.00, 'packaging' => 'Bolsa', 'presentation' => 'Panela', 'size' => '400 g'],
            ['category' => 'Quesos y Cremeras', 'name' => 'Queso Manchego Lala 400 g', 'price' => 79.90, 'packaging' => 'Bolsa', 'presentation' => 'Manchego', 'size' => '400 g'],
            ['category' => 'Quesos y Cremeras', 'name' => 'Crema para Café Lala 200 ml', 'price' => 24.90, 'packaging' => 'Tetra Pak', 'presentation' => 'Crema', 'size' => '200 ml'],
            ['category' => 'Bebidas Lácteas', 'name' => 'Battre Chocolate 250 ml', 'price' => 18.50, 'packaging' => 'Tetra Pak', 'presentation' => 'Chocolate', 'size' => '250 ml'],
            ['category' => 'Bebidas Lácteas', 'name' => 'Battre Vainilla 250 ml', 'price' => 18.50, 'packaging' => 'Tetra Pak', 'presentation' => 'Vainilla', 'size' => '250 ml'],
            ['category' => 'Cárnicos', 'name' => 'Jamón de Pavo Lala 250 g', 'price' => 56.90, 'packaging' => 'Bolsa', 'presentation' => 'Rebanado', 'size' => '250 g'],
            ['category' => 'Cárnicos', 'name' => 'Tocino Ahumado Lala 200 g', 'price' => 62.50, 'packaging' => 'Bolsa', 'presentation' => 'Ahumado', 'size' => '200 g'],
        ];

        foreach ($products as $attributes) {
            $category = Category::query()->where('name', $attributes['category'])->firstOrFail();
            unset($attributes['category']);

            $product = Product::query()->updateOrCreate(
                ['name' => $attributes['name']],
                $attributes + ['category_id' => $category->id],
            );

            $inventory = $product->ensureInventory();

            if ($inventory->wasRecentlyCreated) {
                $inventory->update([
                    'last_counted_at' => fake()->dateTimeBetween('-15 days'),
                ]);
            }
        }
    }
}
