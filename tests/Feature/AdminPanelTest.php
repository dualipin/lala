<?php

use App\Models\Inventory;
use App\Models\InventoryMovement;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\User;

test('guests are redirected to the admin login page', function (string $uri) {
    $this->get($uri)->assertRedirect(route('filament.admin.auth.login'));
})->with([
    '/admin',
    '/admin/categories',
    '/admin/products',
    '/admin/product-innovations',
    '/admin/promotions',
    '/admin/inventories',
    '/admin/inventory-movements',
    '/admin/users',
    '/admin/profile',
]);

test('authenticated users can access the admin dashboard and its navigation', function () {
    $this->actingAs(User::factory()->create())
        ->get('/admin')
        ->assertOk()
        ->assertSee('Familias de producto')
        ->assertSee('Productos')
        ->assertSee('Innovaciones')
        ->assertSee('Promociones')
        ->assertSee('Inventario')
        ->assertSee('Movimientos');
});

test('authenticated users can manage users and edit their profile', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/admin/users')
        ->assertOk()
        ->assertSee('Usuarios');

    $this->actingAs($user)
        ->get('/admin/users/create')
        ->assertOk()
        ->assertSee('Correo electrónico');

    $this->actingAs($user)
        ->get('/admin/profile')
        ->assertOk();
});

test('authenticated users can list every inventory resource', function (string $uri) {
    $this->actingAs(User::factory()->create())
        ->get($uri)
        ->assertOk();
})->with([
    '/admin/categories',
    '/admin/products',
    '/admin/product-innovations',
    '/admin/promotions',
    '/admin/inventories',
    '/admin/inventory-movements',
    '/admin/users',
]);

test('authenticated users can open every create form', function (string $uri) {
    $this->actingAs(User::factory()->create())
        ->get($uri)
        ->assertOk();
})->with([
    '/admin/categories/create',
    '/admin/products/create',
    '/admin/product-innovations/create',
    '/admin/promotions/create',
    '/admin/inventories/create',
    '/admin/inventory-movements/create',
    '/admin/users/create',
]);

test('an inventory record can only be edited to register a stock count', function () {
    $inventory = Inventory::factory()->create();

    $this->actingAs(User::factory()->create())
        ->get("/admin/inventories/{$inventory->getKey()}/edit")
        ->assertOk();
});

test('a product can be edited from the admin panel', function () {
    $product = Product::factory()->create();

    $this->actingAs(User::factory()->create())
        ->get("/admin/products/{$product->getKey()}/edit")
        ->assertOk();
});

test('a promotion can be edited from the admin panel', function () {
    $promotion = Promotion::factory()->create();

    $this->actingAs(User::factory()->create())
        ->get("/admin/promotions/{$promotion->getKey()}/edit")
        ->assertOk();
});

test('inventory movements are append only', function () {
    $movement = InventoryMovement::factory()->create();

    $this->actingAs(User::factory()->create())
        ->get("/admin/inventory-movements/{$movement->getKey()}/edit")
        ->assertNotFound();
});
