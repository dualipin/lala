@extends('layouts.app')

@section('content')
<div>
    <!-- HERO SECTION / CAROUSEL CON GSAP -->
    <section class="relative bg-gradient-to-b from-white to-slate-100 overflow-hidden border-b border-slate-200">
        <div id="hero-carousel" class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-14">
            
            <!-- Contenedor con Grid Stacking para evitar saltos o parpadeos de layout -->
            <div class="hero-slides-wrapper relative w-full grid grid-cols-1 grid-rows-1 items-center min-h-[540px] sm:min-h-[480px] lg:min-h-[440px]">
                
                <!-- Slide 1: Leches UHT (Línea Insignia) -->
                <div class="hero-slide active col-start-1 row-start-1 w-full grid grid-cols-1 lg:grid-cols-12 gap-8 items-center pointer-events-auto">
                    <div class="lg:col-span-7 space-y-6">
                        <div class="slide-animate inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-primary/10 text-primary font-bold text-xs uppercase tracking-wider">
                            <span class="w-2 h-2 rounded-full bg-primary animate-ping"></span>
                            Nutrición Esencial • Alta Demanda
                        </div>
                        <h1 class="slide-animate font-display font-extrabold text-4xl sm:text-5xl lg:text-6xl text-secondary leading-tight tracking-tight">
                            Nutriendo con Amor y Calidad a <span class="text-primary underline decoration-primary/30">Tabasco</span>
                        </h1>
                        <p class="slide-animate text-slate-600 text-base sm:text-lg leading-relaxed max-w-xl">
                            Descubre nuestra familia de <strong>Leches UHT Entera y Deslactosada</strong> en envase Tetra Pak con abasto garantizado y frescura inigualable desde el <strong>CEDIS Atasta de Serra</strong>.
                        </p>
                        <div class="slide-animate flex flex-wrap items-center gap-4 pt-2">
                            <a href="{{ route('catalogo', ['categoria' => 1]) }}" class="btn btn-primary rounded-2xl text-white font-bold px-6 shadow-md hover:shadow-lg transition-all">
                                Ver Leches UHT
                            </a>
                            <a href="{{ route('innovaciones') }}" class="btn btn-outline border-secondary text-secondary hover:bg-secondary hover:text-white rounded-2xl font-semibold px-6">
                                Nuevo Empaque 2026
                            </a>
                        </div>
                        <div class="slide-animate flex items-center gap-6 pt-4 text-xs text-slate-500 border-t border-slate-200/80">
                            <span class="flex items-center gap-1.5"><strong class="text-secondary text-sm">100%</strong> Leche Pura</span>
                            <span>•</span>
                            <span class="flex items-center gap-1.5"><strong class="text-secondary text-sm">UHT</strong> Larga Vida</span>
                            <span>•</span>
                            <span class="flex items-center gap-1.5"><strong class="text-secondary text-sm">CEDIS</strong> Villahermosa</span>
                        </div>
                    </div>

                    <div class="lg:col-span-5 flex justify-center relative">
                        <div class="w-72 h-72 sm:w-96 sm:h-96 rounded-full bg-primary/5 absolute -z-10 blur-2xl"></div>
                        <div class="relative bg-white/60 p-6 rounded-3xl backdrop-blur-sm border border-white shadow-xl max-w-sm">
                            <img 
                                src="https://images.unsplash.com/photo-1550583724-b2692b85b150?auto=format&fit=crop&w=700&q=80" 
                                alt="Leche Lala Entera UHT" 
                                class="rounded-2xl object-cover h-64 w-full shadow-inner"
                            />
                            <div class="mt-4 flex items-center justify-between">
                                <div>
                                    <span class="badge badge-primary text-white font-semibold text-xs">Familia Insignia</span>
                                    <h3 class="font-display font-bold text-secondary text-lg mt-1">Leche Lala Entera 1 L</h3>
                                    <p class="text-xs text-slate-500">Tetra Pak Ergonómico</p>
                                </div>
                                <div class="text-right">
                                    <span class="text-xs text-slate-400 block font-medium">Sugerido</span>
                                    <span class="font-display font-black text-2xl text-primary">$27.90</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2: Yogures y Derivados -->
                <div class="hero-slide col-start-1 row-start-1 w-full grid grid-cols-1 lg:grid-cols-12 gap-8 items-center opacity-0 pointer-events-none invisible">
                    <div class="lg:col-span-7 space-y-6">
                        <div class="slide-animate inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/10 text-emerald-600 font-bold text-xs uppercase tracking-wider">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            Nueva Botella Ergonómica • Sabor Inigualable
                        </div>
                        <h2 class="slide-animate font-display font-extrabold text-4xl sm:text-5xl lg:text-6xl text-secondary leading-tight tracking-tight">
                            Frescura Diaria con <span class="text-primary">Yogurazo LALA</span>
                        </h2>
                        <p class="slide-animate text-slate-600 text-base sm:text-lg leading-relaxed max-w-xl">
                            Deliciosas presentaciones en botella de 1 L y porciones individuales de fresa y vainilla con probióticos activos y frutas seleccionadas.
                        </p>
                        <div class="slide-animate flex flex-wrap items-center gap-4 pt-2">
                            <a href="{{ route('catalogo', ['categoria' => 2]) }}" class="btn btn-primary rounded-2xl text-white font-bold px-6 shadow-md hover:shadow-lg transition-all">
                                Explorar Yogures
                            </a>
                            <a href="{{ route('catalogo') }}" class="btn btn-outline border-secondary text-secondary hover:bg-secondary hover:text-white rounded-2xl font-semibold px-6">
                                Consultar Stock
                            </a>
                        </div>
                        <div class="slide-animate flex items-center gap-6 pt-4 text-xs text-slate-500 border-t border-slate-200/80">
                            <span class="flex items-center gap-1.5"><strong class="text-emerald-600 text-sm">Con Probióticos</strong></span>
                            <span>•</span>
                            <span class="flex items-center gap-1.5"><strong class="text-secondary text-sm">Nueva Presentación</strong></span>
                        </div>
                    </div>

                    <div class="lg:col-span-5 flex justify-center relative">
                        <div class="w-72 h-72 sm:w-96 sm:h-96 rounded-full bg-emerald-500/10 absolute -z-10 blur-2xl"></div>
                        <div class="relative bg-white/60 p-6 rounded-3xl backdrop-blur-sm border border-white shadow-xl max-w-sm">
                            <img 
                                src="https://images.unsplash.com/photo-1488477181946-6428a0291777?auto=format&fit=crop&w=700&q=80" 
                                alt="Yogurazo Fresa LALA" 
                                class="rounded-2xl object-cover h-64 w-full shadow-inner"
                            />
                            <div class="mt-4 flex items-center justify-between">
                                <div>
                                    <span class="badge badge-success text-white font-semibold text-xs">Favorito Niños y Jóvenes</span>
                                    <h3 class="font-display font-bold text-secondary text-lg mt-1">Yogurazo Fresa 1 L</h3>
                                    <p class="text-xs text-slate-500">Botella Ergonómica</p>
                                </div>
                                <div class="text-right">
                                    <span class="text-xs text-slate-400 block font-medium">Sugerido</span>
                                    <span class="font-display font-black text-2xl text-primary">$34.50</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3: Cárnicos y Embutidos -->
                <div class="hero-slide col-start-1 row-start-1 w-full grid grid-cols-1 lg:grid-cols-12 gap-8 items-center opacity-0 pointer-events-none invisible">
                    <div class="lg:col-span-7 space-y-6">
                        <div class="slide-animate inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-500/10 text-amber-700 font-bold text-xs uppercase tracking-wider">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Proteína de Primera Calidad • Cadena de Frío
                        </div>
                        <h2 class="slide-animate font-display font-extrabold text-4xl sm:text-5xl lg:text-6xl text-secondary leading-tight tracking-tight">
                            Línea Cárnicos y Embutidos <span class="text-primary">LALA</span>
                        </h2>
                        <p class="slide-animate text-slate-600 text-base sm:text-lg leading-relaxed max-w-xl">
                            Jamón de pavo rebanado y tocino ahumado de alta calidad, empacados con tecnología que conserva su textura jugosa y sabor premium.
                        </p>
                        <div class="slide-animate flex flex-wrap items-center gap-4 pt-2">
                            <a href="{{ route('catalogo', ['categoria' => 5]) }}" class="btn btn-primary rounded-2xl text-white font-bold px-6 shadow-md hover:shadow-lg transition-all">
                                Ver Cárnicos
                            </a>
                            <a href="tel:9933541200" class="btn btn-outline border-secondary text-secondary hover:bg-secondary hover:text-white rounded-2xl font-semibold px-6">
                                Pedidos CEDIS Atasta
                            </a>
                        </div>
                        <div class="slide-animate flex items-center gap-6 pt-4 text-xs text-slate-500 border-t border-slate-200/80">
                            <span class="flex items-center gap-1.5"><strong class="text-secondary text-sm">Bajo en Grasa</strong></span>
                            <span>•</span>
                            <span class="flex items-center gap-1.5"><strong class="text-amber-700 text-sm">Rebanado Fino</strong></span>
                        </div>
                    </div>

                    <div class="lg:col-span-5 flex justify-center relative">
                        <div class="w-72 h-72 sm:w-96 sm:h-96 rounded-full bg-amber-500/10 absolute -z-10 blur-2xl"></div>
                        <div class="relative bg-white/60 p-6 rounded-3xl backdrop-blur-sm border border-white shadow-xl max-w-sm">
                            <img 
                                src="https://images.unsplash.com/photo-1607623814075-e51df1bdc82f?auto=format&fit=crop&w=700&q=80" 
                                alt="Jamón de Pavo LALA" 
                                class="rounded-2xl object-cover h-64 w-full shadow-inner"
                            />
                            <div class="mt-4 flex items-center justify-between">
                                <div>
                                    <span class="badge badge-warning text-slate-900 font-semibold text-xs">Proteína Selecta</span>
                                    <h3 class="font-display font-bold text-secondary text-lg mt-1">Jamón de Pavo 250 g</h3>
                                    <p class="text-xs text-slate-500">Empaque Hermético</p>
                                </div>
                                <div class="text-right">
                                    <span class="text-xs text-slate-400 block font-medium">Sugerido</span>
                                    <span class="font-display font-black text-2xl text-primary">$56.90</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Controles del Carrusel (Flechas y Dots con alto z-index) -->
            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex items-center gap-2 z-30">
                <button class="hero-dot w-8 h-2.5 rounded-full bg-primary transition-all duration-300" aria-label="Slide 1"></button>
                <button class="hero-dot w-3 h-2.5 rounded-full bg-slate-300 transition-all duration-300" aria-label="Slide 2"></button>
                <button class="hero-dot w-3 h-2.5 rounded-full bg-slate-300 transition-all duration-300" aria-label="Slide 3"></button>
            </div>

            <button class="hero-prev hidden sm:flex absolute left-4 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-white/90 hover:bg-white text-secondary shadow-lg items-center justify-center transition-all z-30 border border-slate-200 hover:scale-105 active:scale-95" aria-label="Anterior">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button class="hero-next hidden sm:flex absolute right-4 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-white/90 hover:bg-white text-secondary shadow-lg items-center justify-center transition-all z-30 border border-slate-200 hover:scale-105 active:scale-95" aria-label="Siguiente">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </button>
        </div>
    </section>

    <!-- SECCIÓN DE FAMILIAS DE PRODUCTOS (CÁRNICOS, LECHES UHT, YOGURES, ETC.) -->
    <section class="py-14 lg:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-12 gsap-reveal">
                <div>
                    <span class="text-xs font-bold text-primary uppercase tracking-widest block mb-2">Familias de Productos</span>
                    <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-secondary tracking-tight">
                        Nutrición Completa en Cada Familia LALA
                    </h2>
                    <p class="text-slate-600 text-sm sm:text-base mt-2 max-w-2xl">
                        Explora las líneas que alimentan a los hogares y abastecen a los comercios de Villahermosa y la región sureste.
                    </p>
                </div>
                <div>
                    <a href="{{ route('catalogo') }}" class="btn btn-outline btn-primary rounded-xl btn-sm font-semibold gap-2">
                        <span>Ver todas las familias</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>

            <!-- Grid de Tarjetas Animadas de Familias -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 gsap-stagger-container">
                <!-- Tarjeta 1: Leches UHT -->
                <div class="group relative rounded-3xl p-8 bg-gradient-to-br from-red-50 to-white border border-red-100 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden gsap-stagger-item flex flex-col justify-between">
                    <div class="absolute -right-6 -bottom-6 w-36 h-36 bg-primary/10 rounded-full blur-xl group-hover:scale-150 transition-transform duration-500"></div>
                    <div>
                        <div class="w-14 h-14 rounded-2xl bg-primary text-white flex items-center justify-center font-bold mb-6 shadow-md shadow-primary/20 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        </div>
                        <span class="badge badge-primary badge-sm text-white font-semibold mb-2">Línea Insignia</span>
                        <h3 class="font-display font-extrabold text-2xl text-secondary group-hover:text-primary transition-colors">
                            Leches UHT
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
                            Leches enteras, deslactosadas y sin lactosa ultrapasteurizadas. Calidad garantizada y larga duración para tu alacena o punto de venta.
                        </p>
                    </div>
                    <div class="pt-6 mt-6 border-t border-red-100 flex items-center justify-between">
                        <span class="text-xs font-bold text-slate-500">Tetra Pak & Galón</span>
                        <a href="{{ route('catalogo', ['categoria' => 1]) }}" class="btn btn-sm btn-circle btn-primary text-white shadow-sm group-hover:rotate-45 transition-transform">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Tarjeta 2: Yogures y Derivados -->
                <div class="group relative rounded-3xl p-8 bg-gradient-to-br from-emerald-50 to-white border border-emerald-100 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden gsap-stagger-item flex flex-col justify-between">
                    <div class="absolute -right-6 -bottom-6 w-36 h-36 bg-emerald-500/10 rounded-full blur-xl group-hover:scale-150 transition-transform duration-500"></div>
                    <div>
                        <div class="w-14 h-14 rounded-2xl bg-emerald-600 text-white flex items-center justify-center font-bold mb-6 shadow-md shadow-emerald-600/20 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <span class="badge badge-success badge-sm text-white font-semibold mb-2">Digestión & Sabor</span>
                        <h3 class="font-display font-extrabold text-2xl text-secondary group-hover:text-emerald-700 transition-colors">
                            Yogures y Derivados
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
                            Yogurazo, yogur bebible y natural con probióticos activos. Nuevas botellas ergonómicas de 1 L para disfrute diario.
                        </p>
                    </div>
                    <div class="pt-6 mt-6 border-t border-emerald-100 flex items-center justify-between">
                        <span class="text-xs font-bold text-slate-500">Botella & Vasos</span>
                        <a href="{{ route('catalogo', ['categoria' => 2]) }}" class="btn btn-sm btn-circle bg-emerald-600 hover:bg-emerald-700 text-white border-none shadow-sm group-hover:rotate-45 transition-transform">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Tarjeta 3: Cárnicos y Embutidos -->
                <div class="group relative rounded-3xl p-8 bg-gradient-to-br from-amber-50 to-white border border-amber-100 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden gsap-stagger-item flex flex-col justify-between">
                    <div class="absolute -right-6 -bottom-6 w-36 h-36 bg-amber-500/10 rounded-full blur-xl group-hover:scale-150 transition-transform duration-500"></div>
                    <div>
                        <div class="w-14 h-14 rounded-2xl bg-amber-600 text-white flex items-center justify-center font-bold mb-6 shadow-md shadow-amber-600/20 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                        </div>
                        <span class="badge badge-warning badge-sm text-slate-900 font-semibold mb-2">Proteína Selecta</span>
                        <h3 class="font-display font-extrabold text-2xl text-secondary group-hover:text-amber-700 transition-colors">
                            Cárnicos
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
                            Jamón de pavo y tocino ahumado elaborados con carnes seleccionadas e impecable cadena de frío que conserva su sabor y textura.
                        </p>
                    </div>
                    <div class="pt-6 mt-6 border-t border-amber-100 flex items-center justify-between">
                        <span class="text-xs font-bold text-slate-500">Rebanado Hermético</span>
                        <a href="{{ route('catalogo', ['categoria' => 5]) }}" class="btn btn-sm btn-circle bg-amber-600 hover:bg-amber-700 text-white border-none shadow-sm group-hover:rotate-45 transition-transform">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PREVIEW DE INNOVACIONES DE EMPAQUE (FIDELIDAD DE MARCA) -->
    <section class="py-14 lg:py-20 bg-slate-100 border-y border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-10 gsap-reveal">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary font-bold text-xs uppercase tracking-wider mb-2">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        Evolución Continua
                    </div>
                    <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-secondary tracking-tight">
                        Innovaciones Visuales de Empaque y Tamaño
                    </h2>
                    <p class="text-slate-600 text-sm sm:text-base mt-2 max-w-2xl">
                        Diseños ergonómicos, empaques amigables con el medio ambiente y presentaciones optimizadas para minoristas y consumidores.
                    </p>
                </div>
                <div>
                    <a href="{{ route('innovaciones') }}" class="btn btn-primary rounded-xl text-white font-semibold btn-sm gap-2">
                        <span>Ver todas las innovaciones</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>

            <!-- Preview Cards con Flip interactivo GSAP -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 gsap-stagger-container">
                @foreach($innovations as $innov)
                    @php $p = $innov->product; @endphp
                    <div class="flip-card perspective-1000 min-h-[440px] w-full gsap-stagger-item" data-flipped="false">
                        <div class="flip-card-inner relative w-full h-full transform-style-3d transition-transform duration-700">
                            <!-- Cara Frontal -->
                            <div class="card absolute inset-0 backface-hidden bg-white rounded-3xl p-6 shadow-sm border border-slate-200 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="badge badge-info text-white text-xs font-bold">{{ $innov->change_type->getLabel() }}</span>
                                        <span class="text-xs text-slate-400">{{ $innov->effective_date?->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="h-40 bg-slate-50 rounded-2xl flex items-center justify-center p-3 mb-3">
                                        <img src="{{ $p->image_url }}" alt="{{ $p->name }}" class="max-h-full max-w-full object-contain" />
                                    </div>
                                    <h3 class="font-display font-bold text-secondary text-base mb-1">{{ $p->name }}</h3>
                                    <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed">{{ $innov->description }}</p>
                                </div>
                                <button type="button" onclick="window.flipCard(this)" class="btn btn-outline btn-primary btn-xs w-full rounded-xl mt-4">
                                    Ver Comparativa (Girar) ↻
                                </button>
                            </div>

                            <!-- Cara Trasera -->
                            <div class="card absolute inset-0 backface-hidden rotate-y-180 bg-secondary text-white rounded-3xl p-6 shadow-xl flex flex-col justify-between">
                                <div>
                                    <span class="badge badge-primary text-white text-xs font-bold mb-2">Fidelidad de Marca</span>
                                    <h4 class="font-display font-bold text-white text-base mb-2">{{ $p->name }}</h4>
                                    <p class="text-xs text-slate-200 leading-relaxed mb-4">{{ $innov->description }}</p>
                                    <div class="bg-white/10 rounded-xl p-3 text-xs text-slate-200 space-y-1 border border-white/10">
                                        <span class="text-emerald-400 font-bold block">Garantía LALA:</span>
                                        <span>Material reciclable y tapón hermético sin derrames.</span>
                                    </div>
                                </div>
                                <button type="button" onclick="window.flipCard(this)" class="btn btn-primary btn-xs w-full rounded-xl text-white mt-4">
                                    Volver al Producto ↻
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- PRODUCTOS DESTACADOS CON EXISTENCIAS EN VIVO -->
    <section class="py-14 lg:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-10 gsap-reveal">
                <div>
                    <span class="text-xs font-bold text-primary uppercase tracking-widest block mb-2">Disponibilidad en Tiempo Real</span>
                    <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-secondary tracking-tight">
                        Productos de Mayor Demanda
                    </h2>
                    <p class="text-slate-600 text-sm mt-1">
                        Existencias físicas y digitales sincronizadas con el CEDIS Atasta de Serra.
                    </p>
                </div>
                <a href="{{ route('catalogo') }}" class="btn btn-outline border-slate-300 text-secondary hover:bg-slate-100 rounded-xl btn-sm font-semibold">
                    Ir al Catálogo Completo
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 gsap-stagger-container">
                @foreach($featuredProducts as $item)
                    @php
                        $phys = $item->inventory?->physical_stock ?? 0;
                    @endphp
                    <div class="card bg-white rounded-3xl p-5 border border-slate-200 shadow-sm hover:shadow-md transition-all gsap-stagger-item flex flex-col justify-between">
                        <div>
                            <div class="h-44 bg-slate-50 rounded-2xl flex items-center justify-center p-4 mb-4">
                                <img src="{{ $item->image_url }}" alt="{{ $item->name }}" class="max-h-full max-w-full object-contain" />
                            </div>
                            <div class="flex items-center justify-between text-xs text-slate-500 mb-1">
                                <span>{{ $item->category?->name }}</span>
                                <span class="badge badge-success badge-xs text-white">Stock: {{ $phys }} uds</span>
                            </div>
                            <h3 class="font-display font-bold text-secondary text-base mb-1">{{ $item->name }}</h3>
                            <p class="text-xs text-slate-500">Presentación: {{ $item->presentation }} • {{ $item->size }}</p>
                        </div>
                        <div class="pt-4 mt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="font-display font-black text-xl text-primary">${{ number_format($item->price, 2) }}</span>
                            <a href="{{ route('catalogo', ['q' => $item->name]) }}" class="btn btn-xs btn-primary text-white rounded-lg">Consultar</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CANAL DE COMUNICACIÓN (NOTICIAS CON GSAP SCROLLTRIGGER) -->
    <section class="py-14 lg:py-20 bg-slate-50 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-10 gsap-reveal">
                <div>
                    <span class="text-xs font-bold text-primary uppercase tracking-widest block mb-2">Canal de Comunicación</span>
                    <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-secondary tracking-tight">
                        Noticias Comerciales y Comunitarias
                    </h2>
                    <p class="text-slate-600 text-sm mt-1">
                        Novedades operativas de Grupo LALA y del Centro de Distribución en Tabasco.
                    </p>
                </div>
                <a href="{{ route('noticias') }}" class="btn btn-outline btn-primary rounded-xl btn-sm font-semibold">
                    Ver Todo el Blog
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 gsap-stagger-container">
                @foreach($latestNews as $article)
                    <article class="card bg-white rounded-3xl shadow-sm hover:shadow-md transition-all border border-slate-200 overflow-hidden flex flex-col justify-between gsap-stagger-item group">
                        <div>
                            <div class="h-44 overflow-hidden bg-slate-100 relative">
                                <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
                                <span class="badge badge-sm badge-neutral absolute top-3 left-3 bg-secondary/90 text-white text-[11px]">{{ $article->category }}</span>
                            </div>
                            <div class="p-5">
                                <span class="text-xs text-slate-400 block mb-1">{{ $article->published_at?->format('d M, Y') }} • {{ $article->read_time }}</span>
                                <h3 class="font-display font-bold text-secondary text-base group-hover:text-primary transition-colors leading-snug line-clamp-2 mb-2">
                                    <a href="{{ route('noticias.show', $article->slug) }}">{{ $article->title }}</a>
                                </h3>
                                <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed">{{ $article->excerpt }}</p>
                            </div>
                        </div>
                        <div class="p-5 pt-0">
                            <a href="{{ route('noticias.show', $article->slug) }}" class="btn btn-ghost btn-xs text-primary hover:bg-primary/10 rounded-lg w-full justify-between font-semibold">
                                <span>Leer Nota</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- BANNER CEDIS ATASTA DE SERRA (LLAMADA A LA ACCIÓN MINORISTA) -->
    <section class="py-14 bg-secondary text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="bg-gradient-to-r from-primary to-rose-700 rounded-3xl p-8 sm:p-12 shadow-2xl flex flex-col lg:flex-row items-center justify-between gap-8">
                <div class="space-y-3 text-center lg:text-left">
                    <span class="badge badge-outline text-white border-white/40 text-xs font-semibold uppercase tracking-wider">Atención a Minoristas y Tenderos</span>
                    <h3 class="font-display font-extrabold text-3xl sm:text-4xl text-white">
                        ¿Tienes una tienda o negocio en Tabasco?
                    </h3>
                    <p class="text-white/90 text-sm sm:text-base max-w-2xl leading-relaxed">
                        Surte tu negocio directamente con el <strong>CEDIS Atasta de Serra</strong> en Villahermosa. Precios preferenciales, entrega puntual y garantía de refrigeración.
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row items-center gap-4 shrink-0">
                    <a href="tel:9933541200" class="btn bg-white text-primary hover:bg-slate-100 border-none rounded-2xl font-bold px-6 shadow-md gap-2">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span>Llamar al CEDIS: (993) 354 1200</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Script de inicialización de GSAP Hero Carousel al cargar -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof window.initHeroCarousel === 'function') {
            window.initHeroCarousel('hero-carousel');
        }
    });
    document.addEventListener('livewire:navigated', function () {
        if (typeof window.initHeroCarousel === 'function') {
            window.initHeroCarousel('hero-carousel');
        }
    });
</script>
@endsection
