<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Seed the product families of the catalogue.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Leches UHT', 'description' => 'Leches de larga vida UHT enteras, deslactosadas y sin lactosa.'],
            ['name' => 'Yogures', 'description' => 'Yogures y productos derivados de la leche.'],
            ['name' => 'Quesos y Cremeras', 'description' => 'Quesos, cremas y mantequillas de la línea LALA.'],
            ['name' => 'Bebidas Lácteas', 'description' => 'Bebidas lácteas saborizadas y postres lácteos.'],
            ['name' => 'Cárnicos', 'description' => 'Embutidos y productos cárnicos de la línea de la empresa.'],
        ];

        foreach ($categories as $category) {
            Category::query()->updateOrCreate(['name' => $category['name']], $category);
        }
    }
}
