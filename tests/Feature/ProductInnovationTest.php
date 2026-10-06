<?php

use App\Enums\ProductChangeType;
use App\Filament\Resources\Products\Pages\EditProduct;
use App\Filament\Resources\Products\RelationManagers\InnovationsRelationManager;
use App\Models\Product;
use App\Models\ProductInnovation;
use App\Models\User;
use Filament\Actions\CreateAction;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

test('relates its history to the product', function () {
    $product = Product::factory()->create();
    $innovation = ProductInnovation::factory()->for($product)->create();

    expect($innovation->product->is($product))->toBeTrue()
        ->and($product->innovations->pluck('id'))->toContain($innovation->id);
});

test('casts the change type and the effective date', function () {
    $innovation = ProductInnovation::factory()->create([
        'change_type' => ProductChangeType::Tamano,
        'effective_date' => '2026-03-15',
    ]);

    expect($innovation->change_type)->toBe(ProductChangeType::Tamano)
        ->and($innovation->change_type->getLabel())->toBe('Cambio de tamaño')
        ->and($innovation->effective_date->toDateString())->toBe('2026-03-15');
});

test('keeps a catalog of multiple images for graphical evolution', function () {
    Storage::fake('public');

    $innovation = ProductInnovation::factory()->create();

    $innovation->addMedia(UploadedFile::fake()->image('evolucion-1.jpg'))->toMediaCollection('images');
    $innovation->addMedia(UploadedFile::fake()->image('evolucion-2.jpg'))->toMediaCollection('images');

    expect($innovation->getMedia('images'))->toHaveCount(2)
        ->and($innovation->getMedia('images')->every(fn ($media) => $media->hasGeneratedConversion('thumb')))->toBeTrue();
});

test('shows the evolution table on the product edit page and allows adding new evolutions', function () {
    $product = Product::factory()->create();
    $innovation = ProductInnovation::factory()->for($product)->create([
        'description' => 'Rediseño de botella ergonómica',
        'change_type' => ProductChangeType::Empaque,
    ]);

    $this->actingAs(User::factory()->create())
        ->get("/admin/products/{$product->getKey()}/edit")
        ->assertOk()
        ->assertSee('Evolución del producto')
        ->assertSee('Rediseño de botella ergonómica');

    Livewire::actingAs(User::factory()->create())
        ->test(InnovationsRelationManager::class, [
            'ownerRecord' => $product,
            'pageClass' => EditProduct::class,
        ])
        ->assertSuccessful()
        ->assertCanSeeTableRecords([$innovation])
        ->callTableAction(CreateAction::class, data: [
            'change_type' => ProductChangeType::Presentacion->value,
            'effective_date' => '2026-11-01',
            'description' => 'Nueva etiqueta conmemorativa',
        ])
        ->assertHasNoTableActionErrors();

    expect($product->innovations()->where('description', 'Nueva etiqueta conmemorativa')->exists())->toBeTrue();
});
