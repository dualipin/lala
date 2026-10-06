<?php

namespace Database\Seeders;

use App\Enums\ProductChangeType;
use App\Models\Product;
use App\Models\ProductInnovation;
use Illuminate\Database\Seeder;

class ProductInnovationSeeder extends Seeder
{
    /**
     * Seed the visual innovation history of the products.
     */
    public function run(): void
    {
        $innovations = [
            ['product' => 'Leche Lala Entera 1 L', 'change_type' => ProductChangeType::Empaque, 'description' => 'Rediseño del empaque con la nueva identidad de marca LALA.', 'effective_date' => '2025-04-01'],
            ['product' => 'Yogurazo Fresa 1 L', 'change_type' => ProductChangeType::Presentacion, 'description' => 'Nueva presentación en botella ergonómica de 1 L.', 'effective_date' => '2025-06-15'],
            ['product' => 'Queso Panela Lala 400 g', 'change_type' => ProductChangeType::Tamano, 'description' => 'Ampliación del tamaño a 400 g para mayor rendimiento.', 'effective_date' => '2025-09-01'],
            ['product' => 'Crema para Café Lala 200 ml', 'change_type' => ProductChangeType::Empaque, 'description' => 'Cambio a envase Tetra Pak con cierre reutilizable.', 'effective_date' => '2026-01-20'],
        ];

        foreach ($innovations as $innovation) {
            $product = Product::query()->where('name', $innovation['product'])->firstOrFail();
            unset($innovation['product']);

            ProductInnovation::query()->firstOrCreate(
                ['product_id' => $product->id, 'description' => $innovation['description']],
                $innovation,
            );
        }
    }
}
