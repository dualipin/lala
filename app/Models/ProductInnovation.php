<?php

namespace App\Models;

use App\Enums\ProductChangeType;
use Database\Factories\ProductInnovationFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * Historial de modificaciones visuales de un producto para retener la lealtad a la marca.
 */
#[Fillable(['product_id', 'change_type', 'description', 'effective_date'])]
class ProductInnovation extends Model implements HasMedia
{
    /** @use HasFactory<ProductInnovationFactory> */
    use HasFactory, InteractsWithMedia;

    protected function casts(): array
    {
        return [
            'change_type' => ProductChangeType::class,
            'effective_date' => 'date',
        ];
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(400)
            ->height(400)
            ->nonQueued();
    }
}
