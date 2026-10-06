<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use App\Models\ProductInnovation;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Show the application landing page.
     */
    public function __invoke(): View
    {
        $categories = Category::query()
            ->withCount('products')
            ->orderBy('name')
            ->get();

        $featuredProducts = Product::query()
            ->with(['category', 'inventory'])
            ->whereIn('name', [
                'Leche Lala Entera 1 L',
                'Leche Lala Deslactosada 1 L',
                'Yogurazo Fresa 1 L',
                'Jamón de Pavo Lala 250 g',
                'Queso Panela Lala 400 g',
                'Battre Chocolate 250 ml',
            ])
            ->get();

        // Fallback if specific products aren't matched
        if ($featuredProducts->isEmpty()) {
            $featuredProducts = Product::query()
                ->with(['category', 'inventory'])
                ->take(6)
                ->get();
        }

        $innovations = ProductInnovation::query()
            ->with(['product.category'])
            ->latest('effective_date')
            ->take(3)
            ->get();

        $latestNews = News::query()
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('home', [
            'categories' => $categories,
            'featuredProducts' => $featuredProducts,
            'innovations' => $innovations,
            'latestNews' => $latestNews,
        ]);
    }
}
