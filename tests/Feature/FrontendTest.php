<?php

use App\Enums\ProductChangeType;
use App\Livewire\NewsList;
use App\Livewire\ProductCatalogue;
use App\Livewire\ProductInnovations;
use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use App\Models\ProductInnovation;
use Livewire\Livewire;

test('home page renders successfully with branding, CEDIS info, and sections', function () {
    $category = Category::factory()->create(['name' => 'Leches UHT']);
    $product = Product::factory()->for($category)->create(['name' => 'Leche Lala Entera 1 L']);
    $product->ensureInventory()->update(['physical_stock' => 150]);

    News::factory()->create([
        'title' => 'CEDIS Atasta de Serra fortalece la distribución',
        'slug' => 'cedis-atasta-fortalece-distribucion',
    ]);

    $response = $this->get(route('home'));

    $response->assertOk()
        ->assertSee('CEDIS Atasta de Serra')
        ->assertSee('993) 354 1200', false)
        ->assertSee('Leches UHT')
        ->assertSee('Leche Lala Entera 1 L');
});

test('catalogue page renders and Livewire product catalogue filters in real time', function () {
    $cat1 = Category::factory()->create(['name' => 'Leches UHT']);
    $cat2 = Category::factory()->create(['name' => 'Cárnicos']);

    $p1 = Product::factory()->for($cat1)->create(['name' => 'Leche Lala Entera 1 L', 'price' => 28.00]);
    $p1->ensureInventory()->update(['physical_stock' => 50, 'digital_stock' => 50]);

    $p2 = Product::factory()->for($cat2)->create(['name' => 'Jamón de Pavo Lala 250 g', 'price' => 55.00]);
    $p2->ensureInventory()->update(['physical_stock' => 0, 'digital_stock' => 0]);

    $this->get(route('catalogo'))
        ->assertOk()
        ->assertSeeLivewire(ProductCatalogue::class);

    Livewire::test(ProductCatalogue::class)
        ->assertSee('Leche Lala Entera 1 L')
        ->assertSee('Jamón de Pavo Lala 250 g')
        ->set('search', 'Jamón')
        ->assertSee('Jamón de Pavo Lala 250 g')
        ->assertDontSee('Leche Lala Entera 1 L')
        ->set('search', '')
        ->set('selectedCategory', $cat1->id)
        ->assertSee('Leche Lala Entera 1 L')
        ->assertDontSee('Jamón de Pavo Lala 250 g')
        ->set('selectedCategory', null)
        ->set('onlyInStock', true)
        ->assertSee('Leche Lala Entera 1 L')
        ->assertDontSee('Jamón de Pavo Lala 250 g');
});

test('innovations page renders and filters by change type', function () {
    $category = Category::factory()->create();
    $product = Product::factory()->for($category)->create(['name' => 'Yogurazo Fresa 1 L']);

    ProductInnovation::factory()->for($product)->create([
        'change_type' => ProductChangeType::Empaque,
        'description' => 'Nuevo envase ergonómico reciclable',
    ]);

    $this->get(route('innovaciones'))
        ->assertOk()
        ->assertSeeLivewire(ProductInnovations::class);

    Livewire::test(ProductInnovations::class)
        ->assertSee('Yogurazo Fresa 1 L')
        ->assertSee('Nuevo envase ergonómico reciclable')
        ->set('selectedType', 'empaque')
        ->assertSee('Nuevo envase ergonómico reciclable')
        ->set('selectedType', 'tamano')
        ->assertDontSee('Nuevo envase ergonómico reciclable');
});

test('news list renders and filters articles', function () {
    $article1 = News::factory()->create([
        'title' => 'Avance en CEDIS Atasta de Serra',
        'category' => 'Logística y Operaciones',
        'slug' => 'avance-cedis-atasta',
    ]);

    $article2 = News::factory()->create([
        'title' => 'Nueva presentación de leche',
        'category' => 'Innovación de Producto',
        'slug' => 'nueva-presentacion-leche',
    ]);

    $this->get(route('noticias'))
        ->assertOk()
        ->assertSeeLivewire(NewsList::class);

    Livewire::test(NewsList::class)
        ->assertSee('Avance en CEDIS Atasta de Serra')
        ->assertSee('Nueva presentación de leche')
        ->set('search', 'Atasta')
        ->assertSee('Avance en CEDIS Atasta de Serra')
        ->assertDontSee('Nueva presentación de leche')
        ->set('search', '')
        ->set('selectedCategory', 'Innovación de Producto')
        ->assertSee('Nueva presentación de leche')
        ->assertDontSee('Avance en CEDIS Atasta de Serra');
});

test('single news article page renders with detail and CEDIS contact info', function () {
    $article = News::factory()->create([
        'title' => 'Modernización del Centro de Distribución Atasta',
        'slug' => 'modernizacion-cedis-atasta',
        'content' => 'Detalle completo del proceso de modernización y logística.',
    ]);

    $this->get(route('noticias.show', $article->slug))
        ->assertOk()
        ->assertSee('Modernización del Centro de Distribución Atasta')
        ->assertSee('Detalle completo del proceso de modernización y logística.')
        ->assertSee('(993) 354 1200', false)
        ->assertSee('contacto.tabasco@grupolala.com');
});
