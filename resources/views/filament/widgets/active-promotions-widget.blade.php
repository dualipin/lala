<x-filament-widgets::widget>
    <x-filament::section :heading="__('Promociones activas')">
        @php $promotions = $this->getPromotions(); @endphp

        @if ($promotions->isEmpty())
            <div class="flex flex-col items-center justify-center py-8 text-center">
                <x-filament::icon
                    icon="heroicon-o-tag"
                    class="mb-2 h-10 w-10 text-gray-300 dark:text-gray-600"
                />
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    No hay promociones activas en este momento.
                </p>
            </div>
        @else
            <ul class="divide-y divide-gray-100 dark:divide-white/10">
                @foreach ($promotions as $promotion)
                    <li class="flex items-start gap-3 py-3 first:pt-0 last:pb-0">
                        {{-- Discount badge --}}
                        <span @class([
                            'inline-flex shrink-0 items-center rounded-md px-2 py-1 text-xs font-semibold',
                            'bg-amber-100 text-amber-800 dark:bg-amber-400/20 dark:text-amber-300' => $promotion->discount_type->value === 'percent',
                            'bg-blue-100 text-blue-800 dark:bg-blue-400/20 dark:text-blue-300' => $promotion->discount_type->value === 'fixed',
                        ])>
                            @if ($promotion->discount_type->value === 'percent')
                                {{ number_format($promotion->discount_value, 0) }}%
                            @else
                                ${{ number_format($promotion->discount_value, 2) }}
                            @endif
                        </span>

                        {{-- Name + meta --}}
                        <div class="min-w-0 flex-1">
                            <p class="truncate text-sm font-medium text-gray-900 dark:text-white">
                                {{ $promotion->name }}
                            </p>
                            <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                                Vence {{ $promotion->ends_at->diffForHumans() }}
                                @if ($promotion->products->isNotEmpty())
                                    &middot; {{ $promotion->products->count() }}
                                    {{ Str::plural('producto', $promotion->products->count()) }}
                                @endif
                            </p>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </x-filament::section>
</x-filament-widgets::widget>
