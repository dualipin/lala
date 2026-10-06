<?php

namespace App\Filament\Widgets;

use App\Models\Promotion;
use Filament\Widgets\Widget;
use Illuminate\Support\Collection;

class ActivePromotionsWidget extends Widget
{
    protected string $view = 'filament.widgets.active-promotions-widget';

    protected static ?string $heading = 'Promociones activas';

    protected int|string|array $columnSpan = 1;

    protected static ?int $sort = 3;

    /**
     * @return Collection<int, Promotion>
     */
    public function getPromotions(): Collection
    {
        return Promotion::query()
            ->where('is_active', true)
            ->where('starts_at', '<=', now())
            ->where('ends_at', '>=', now())
            ->with('products')
            ->orderBy('ends_at')
            ->limit(5)
            ->get();
    }
}
