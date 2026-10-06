<?php

namespace App\Livewire;

use App\Enums\ProductChangeType;
use App\Models\ProductInnovation;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;

class ProductInnovations extends Component
{
    #[Url(as: 'tipo')]
    public ?string $selectedType = null;

    public function selectType(?string $type): void
    {
        $this->selectedType = $type;
    }

    public function render(): View
    {
        $innovations = ProductInnovation::query()
            ->with(['product.category', 'product.inventory', 'media'])
            ->when($this->selectedType, function ($q) {
                $q->where('change_type', $this->selectedType);
            })
            ->latest('effective_date')
            ->get();

        $types = ProductChangeType::cases();

        return view('livewire.product-innovations', [
            'innovations' => $innovations,
            'types' => $types,
        ]);
    }
}
