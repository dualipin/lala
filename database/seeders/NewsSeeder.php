<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => 'CEDIS Atasta de Serra fortalece la cadena de suministro en Tabasco',
                'slug' => 'cedis-atasta-de-serra-fortalece-suministro-tabasco',
                'category' => 'Logística y Operaciones',
                'excerpt' => 'El Centro de Distribución en Atasta de Serra optimiza tiempos de entrega y garantiza la máxima frescura de lácteos y cárnicos en Villahermosa y municipios vecinos.',
                'content' => 'Con el objetivo de acercar productos frescos y nutritivos a familias y minoristas, el Centro de Distribución (CEDIS) LALA ubicado en Atasta de Serra, Villahermosa, ha integrado nuevos sistemas de monitoreo de temperatura en tiempo real y optimización de rutas de reparto. Esta modernización permite abastecer diariamente a más de 1,200 comercios locales con la máxima garantía de higiene e inocuidad.',
                'image_url' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=800&q=80',
                'read_time' => '4 min',
                'is_featured' => true,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Evolución de empaque: Nuevos envases ecoamigables y ergonómicos en la línea Lala Entera',
                'slug' => 'evolucion-empaque-envases-ecoamigables-lala-entera',
                'category' => 'Innovación de Producto',
                'excerpt' => 'Presentamos el renovado diseño de empaque Tetra Pak con tapón vegetal y certificación FSC, garantizando frescura y menor impacto ambiental.',
                'content' => 'Fieles a nuestro compromiso de renovación continua para fidelizar a nuestros consumidores, renovamos la presentación de Leche Lala Entera y Deslactosada de 1 L. El nuevo envase no solo facilita el vertido sin salpicaduras y optimiza el almacenamiento en refrigeradores comerciales, sino que también reduce la huella de carbono un 18%.',
                'image_url' => 'https://images.unsplash.com/photo-1550583724-b2692b85b150?auto=format&fit=crop&w=800&q=80',
                'read_time' => '3 min',
                'is_featured' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Compromiso nutricional: Programas de bienestar escolar y apoyo a productores',
                'slug' => 'compromiso-nutricional-programas-bienestar-escolar',
                'category' => 'Nutrición y Comunidad',
                'excerpt' => 'A través de Fundación LALA, reafirmamos nuestro compromiso con la alimentación infantil saludable en el sureste mexicano mediante desayunos escolares nutritivos.',
                'content' => 'Nutrir con amor y calidad es el corazón de nuestra misión. Durante este ciclo, Fundación LALA ha colaborado con instituciones educativas del estado de Tabasco para asegurar la entrega de porciones diarias de leche UHT fortificada con vitaminas A, D, B1 y B2 a estudiantes en comunidades prioritarias.',
                'image_url' => 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?auto=format&fit=crop&w=800&q=80',
                'read_time' => '5 min',
                'is_featured' => false,
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Alianza con minoristas: Nuevas facilidades de consulta de inventario digital',
                'slug' => 'alianza-con-minoristas-consulta-inventario-digital',
                'category' => 'Comercio Minorista',
                'excerpt' => 'Lanzamos el nuevo portal web dinámico para tenderos y distribuidores, permitiendo verificar existencias de productos LALA en tiempo real.',
                'content' => 'Para apoyar el crecimiento de los comercios tradicionales de barrio y tiendas de autoservicio, ahora los socios comerciales pueden revisar existencias digitales, precios vigentes y fechas de llegada directo desde nuestra plataforma web construida para agilizar pedidos y reposiciones.',
                'image_url' => 'https://images.unsplash.com/photo-1578916171728-46686eac8d58?auto=format&fit=crop&w=800&q=80',
                'read_time' => '3 min',
                'is_featured' => false,
                'published_at' => now()->subDays(14),
            ],
        ];

        foreach ($articles as $article) {
            News::query()->updateOrCreate(['slug' => $article['slug']], $article);
        }
    }
}
