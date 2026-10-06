<?php

use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

test('relates to its promoted products', function () {
    $promotion = Promotion::factory()->create();
    $products = Product::factory()->count(2)->create();

    $promotion->products()->sync($products->pluck('id'));

    expect($promotion->products)->toHaveCount(2)
        ->and($products->first()->promotions->pluck('id')->all())->toContain($promotion->getKey());
});

test('knows when it is currently active', function () {
    expect(Promotion::factory()->create()->isCurrentlyActive())->toBeTrue()
        ->and(Promotion::factory()->inactive()->create()->isCurrentlyActive())->toBeFalse()
        ->and(Promotion::factory()->create([
            'starts_at' => now()->addWeek(),
            'ends_at' => now()->addWeeks(2),
        ])->isCurrentlyActive())->toBeFalse();
});

test('keeps a single banner image', function () {
    Storage::fake('public');

    $promotion = Promotion::factory()->create();

    $promotion->addMedia(UploadedFile::fake()->image('banner.jpg'))->toMediaCollection('banner');
    $promotion->addMedia(UploadedFile::fake()->image('banner-alternativo.jpg'))->toMediaCollection('banner');

    expect($promotion->getMedia('banner'))->toHaveCount(1)
        ->and($promotion->getFirstMedia('banner')->hasGeneratedConversion('thumb'))->toBeTrue();
});

test('keeps a gallery of multiple images', function () {
    Storage::fake('public');

    $promotion = Promotion::factory()->create();

    $promotion->addMedia(UploadedFile::fake()->image('galeria-1.jpg'))->toMediaCollection('gallery');
    $promotion->addMedia(UploadedFile::fake()->image('galeria-2.jpg'))->toMediaCollection('gallery');

    expect($promotion->getMedia('gallery'))->toHaveCount(2)
        ->and($promotion->getMedia('gallery')->every(fn ($media) => $media->hasGeneratedConversion('thumb')))->toBeTrue();
});

test('keeps multiple promotional videos without image conversions', function () {
    Storage::fake('public');

    $promotion = Promotion::factory()->create();

    $promotion->addMedia(UploadedFile::fake()->create('promo-1.mp4', 5000, 'video/mp4'))->toMediaCollection('videos');
    $promotion->addMedia(UploadedFile::fake()->create('promo-2.mp4', 5000, 'video/mp4'))->toMediaCollection('videos');

    expect($promotion->getMedia('videos'))->toHaveCount(2)
        ->and($promotion->getMedia('videos')->every(fn ($media) => ! $media->hasGeneratedConversion('thumb')))->toBeTrue();
});
