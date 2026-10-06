<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(6);

        return [
            'title' => $title,
            'slug' => fake()->unique()->slug(),
            'category' => fake()->randomElement(['Logística y Operaciones', 'Innovación de Producto', 'Nutrición y Comunidad', 'Comercio Minorista']),
            'excerpt' => fake()->paragraph(),
            'content' => fake()->paragraphs(3, true),
            'image_url' => fake()->imageUrl(800, 500, 'food'),
            'read_time' => fake()->randomElement(['2 min', '3 min', '5 min']),
            'is_featured' => fake()->boolean(20),
            'published_at' => fake()->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
