<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\UniqueConstraintViolationException;

test('relates its products to the category', function () {
    $category = Category::factory()->create();
    $product = Product::factory()->for($category)->create();

    expect($category->products)->toHaveCount(1)
        ->and($category->products->first()->is($product))->toBeTrue()
        ->and($product->category->is($category))->toBeTrue();
});

test('rejects a duplicated category name', function () {
    Category::factory()->create(['name' => 'Yogures']);

    $this->expectException(UniqueConstraintViolationException::class);

    Category::factory()->create(['name' => 'Yogures']);
});
