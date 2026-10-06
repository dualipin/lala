<div class="py-8 lg:py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Header de Innovaciones -->
    <div class="text-center max-w-3xl mx-auto mb-10 gsap-reveal">
        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-primary/10 text-primary font-bold text-xs uppercase tracking-wider mb-3">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            Lealtad e Innovación Continua LALA
        </div>
        <h1 class="font-display font-extrabold text-3xl sm:text-4xl lg:text-5xl text-secondary tracking-tight">
            Evolución y Cambios de Empaque
        </h1>
        <p class="text-slate-600 text-sm sm:text-base mt-3 leading-relaxed">
            Conoce las renovaciones de diseño, presentación y ergonomía aplicadas a tus productos favoritos de la familia LALA para garantizar mayor frescura, sostenibilidad y practicidad.
        </p>
    </div>

    <!-- Filtros por Tipo de Cambio -->
    <div class="flex items-center justify-center gap-2 mb-10 flex-wrap">
        <button 
            wire:click="selectType(null)" 
            class="btn btn-sm rounded-full transition-all duration-200 {{ is_null($selectedType) ? 'btn-primary text-white shadow-sm' : 'btn-outline border-slate-300 text-slate-700 hover:bg-slate-100' }}">
            Todas las Innovaciones ({{ $innovations->count() }})
        </button>
        @foreach($types as $type)
            <button 
                wire:click="selectType('{{ $type->value }}')" 
                class="btn btn-sm rounded-full transition-all duration-200 {{ $selectedType === $type->value ? 'btn-primary text-white shadow-sm' : 'btn-outline border-slate-300 text-slate-700 hover:bg-slate-100' }}">
                {{ $type->getLabel() }}
            </button>
        @endforeach
    </div>

    <!-- Grid de Tarjetas de Innovación con Efecto Flip GSAP -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 gsap-stagger-container">
        @forelse($innovations as $innovation)
            @php
                $product = $innovation->product;
                $changeBadgeColor = match($innovation->change_type->value) {
                    'empaque' => 'badge-info text-white',
                    'presentacion' => 'badge-warning text-slate-900',
                    'tamano' => 'badge-success text-white',
                    default => 'badge-neutral text-white',
                };
            @endphp
            <div class="flip-card perspective-1000 min-h-[480px] w-full gsap-stagger-item" data-flipped="false">
                <div class="flip-card-inner relative w-full h-full transform-style-3d transition-transform duration-700">
                    
                    <!-- Cara Frontal (Front Face) -->
                    <div class="card absolute inset-0 backface-hidden bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden flex flex-col justify-between p-6">
                        <div>
                            <!-- Header de la tarjeta -->
                            <div class="flex items-center justify-between gap-2 mb-4">
                                <span class="badge {{ $changeBadgeColor }} font-bold text-xs py-1 px-2.5 rounded-full shadow-sm">
                                    {{ $innovation->change_type->getLabel() }}
                                </span>
                                <span class="text-xs font-semibold text-slate-400 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    Vigente: {{ $innovation->effective_date?->format('d/m/Y') }}
                                </span>
                            </div>

                            <!-- Imagen del producto / Innovación gráfica -->
                            @php
                                $hasEvolutionMedia = $innovation->hasMedia('images');
                                $cardImageUrl = $hasEvolutionMedia
                                    ? ($innovation->getFirstMediaUrl('images', 'thumb') ?: $innovation->getFirstMediaUrl('images'))
                                    : $product->image_url;
                            @endphp
                            <div class="h-44 bg-gradient-to-b from-slate-50 to-slate-100 rounded-2xl flex items-center justify-center p-4 mb-4 relative overflow-hidden group">
                                <img 
                                    src="{{ $cardImageUrl }}" 
                                    alt="{{ $product->name }}" 
                                    class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300"
                                />
                                <span class="badge badge-sm badge-neutral absolute bottom-2 left-2 bg-secondary/80 text-white text-[11px]">
                                    {{ $product->category?->name }}
                                </span>
                                @if($hasEvolutionMedia)
                                    <span class="badge badge-sm badge-primary text-white absolute bottom-2 right-2 text-[10px] shadow-sm flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        {{ $innovation->getMedia('images')->count() }} fotos
                                    </span>
                                @endif
                            </div>

                            <!-- Título y descripción de la innovación -->
                            <h3 class="font-display font-bold text-lg text-secondary mb-1">
                                {{ $product->name }}
                            </h3>
                            <p class="text-xs text-slate-600 leading-relaxed mb-4">
                                {{ $innovation->description }}
                            </p>

                            <!-- Mini badges de atributos actuales -->
                            <div class="grid grid-cols-2 gap-2 text-xs bg-slate-50 p-2.5 rounded-xl border border-slate-100">
                                <div>
                                    <span class="text-slate-400 block text-[10px] uppercase font-bold">Empaque actual:</span>
                                    <span class="font-semibold text-slate-800">{{ $product->packaging }}</span>
                                </div>
                                <div>
                                    <span class="text-slate-400 block text-[10px] uppercase font-bold">Tamaño actual:</span>
                                    <span class="font-semibold text-slate-800">{{ $product->size }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Botón para voltear la tarjeta con GSAP -->
                        <div class="pt-4 border-t border-slate-100">
                            <button 
                                type="button" 
                                onclick="window.flipCard(this)" 
                                class="btn btn-outline btn-primary btn-sm w-full rounded-xl gap-2 font-medium">
                                <svg class="w-4 h-4 animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                                <span>Ver Comparativa (Girar tarjeta)</span>
                            </button>
                        </div>
                    </div>

                    <!-- Cara Trasera (Back Face - Comparativa Antes vs Ahora) -->
                    <div class="card absolute inset-0 backface-hidden rotate-y-180 bg-gradient-to-br from-secondary to-slate-900 text-white rounded-3xl shadow-xl border border-secondary/50 overflow-hidden flex flex-col justify-between p-6">
                        <div>
                            <div class="flex items-center justify-between mb-4 border-b border-white/10 pb-3">
                                <div class="flex items-center gap-2">
                                    <span class="w-3 h-3 rounded-full bg-primary"></span>
                                    <span class="font-display font-bold text-sm tracking-wide text-white">Evolución de Producto</span>
                                </div>
                                <span class="badge badge-primary badge-xs text-white uppercase font-bold">Fidelidad LALA</span>
                            </div>

                            <h4 class="font-display font-bold text-lg text-white mb-2">
                                {{ $product->name }}
                            </h4>
                            <p class="text-xs text-slate-300 leading-relaxed mb-4">
                                {{ $innovation->description }}
                            </p>

                            <!-- Tabla Comparativa y Catálogo -->
                            <div class="space-y-2.5 text-xs">
                                @if($hasEvolutionMedia)
                                    <div class="bg-white/10 rounded-xl p-2.5 border border-white/10">
                                        <span class="text-amber-300 font-bold block mb-1 text-[11px] flex items-center gap-1">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                            Catálogo Visual de la Evolución ({{ $innovation->getMedia('images')->count() }})
                                        </span>
                                        <div class="flex items-center gap-2 overflow-x-auto py-1">
                                            @foreach($innovation->getMedia('images') as $mediaItem)
                                                <img 
                                                    src="{{ $mediaItem->getUrl('thumb') ?: $mediaItem->getUrl() }}" 
                                                    alt="Evolución {{ $product->name }}" 
                                                    class="w-12 h-12 object-cover rounded-lg border border-white/20 shadow-sm shrink-0" 
                                                />
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <div class="bg-white/10 rounded-xl p-2.5 border border-white/10">
                                    <span class="text-emerald-400 font-bold block mb-1">Beneficio Clave para el Cliente:</span>
                                    <p class="text-slate-200 text-[11px] leading-relaxed">
                                        Mayor vida de anaquel, cierre hermético reutilizable y materiales 100% reciclables que conservan la frescura del producto intacta.
                                    </p>
                                </div>

                                <div class="bg-white/10 rounded-xl p-2.5 border border-white/10">
                                    <span class="text-amber-300 font-bold block mb-1">Disponibilidad en CEDIS Atasta:</span>
                                    <p class="text-slate-200 text-[11px]">
                                        Disponible para surtido inmediato en rutas de Villahermosa y distribución a minoristas.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Botón para regresar a cara frontal -->
                        <div class="pt-4 border-t border-white/10">
                            <button 
                                type="button" 
                                onclick="window.flipCard(this)" 
                                class="btn btn-primary btn-sm w-full rounded-xl text-white font-medium gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 0118 0z"/></svg>
                                <span>Volver al Producto</span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        @empty
            <div class="col-span-full bg-white rounded-3xl p-12 text-center border border-slate-200">
                <p class="text-slate-500">No hay innovaciones registradas para este filtro.</p>
            </div>
        @endforelse
    </div>
</div>
