<?php

use App\Http\Controllers\HomeController;
use App\Models\News;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/catalogo', function () {
    return view('catalogo');
})->name('catalogo');

Route::get('/innovaciones', function () {
    return view('innovaciones');
})->name('innovaciones');

Route::get('/noticias', function () {
    return view('noticias');
})->name('noticias');

Route::get('/noticias/{slug}', function (string $slug) {
    $article = News::query()->where('slug', $slug)->firstOrFail();

    return view('news.show', ['article' => $article]);
})->name('noticias.show');
