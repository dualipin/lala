<?php

namespace App\Models;

use App\Enums\DiscountType;
use Database\Factories\PromotionFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * Promoción comercial de productos LALA con elementos multimedia.
 */
#[Fillable(['name', 'description', 'discount_type', 'discount_value', 'starts_at', 'ends_at', 'is_active'])]
class Promotion extends Model implements HasMedia
{
    /** @use HasFactory<PromotionFactory> */
    use HasFactory, InteractsWithMedia;

    protected function casts(): array
    {
        return [
            'discount_type' => DiscountType::class,
            'discount_value' => 'decimal:2',
            'starts_at' => 'datetime',
            'ends_at' => 'datetime',
            'is_active' => 'boolean',
        ];
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('banner')
            ->singleFile();

        $this->addMediaCollection('gallery');

        $this->addMediaCollection('videos');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(400)
            ->height(400)
            ->nonQueued()
            ->performOnCollections('banner', 'gallery');
    }

    public function isCurrentlyActive(): bool
    {
        return $this->is_active
            && $this->starts_at !== null
            && $this->ends_at !== null
            && now()->between($this->starts_at, $this->ends_at);
    }
}
