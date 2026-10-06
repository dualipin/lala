<div class="py-8 lg:py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Header del Noticiero -->
    <div class="mb-10 text-center max-w-3xl mx-auto gsap-reveal">
        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-primary/10 text-primary font-bold text-xs uppercase tracking-wider mb-3">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
            Canal de Comunicación Comercial
        </div>
        <h1 class="font-display font-extrabold text-3xl sm:text-4xl lg:text-5xl text-secondary tracking-tight">
            Noticias y Comunicados LALA
        </h1>
        <p class="text-slate-600 text-sm sm:text-base mt-3 leading-relaxed">
            Mantente informado sobre innovaciones, operaciones de distribución en el CEDIS Atasta de Serra, acuerdos comerciales para minoristas e iniciativas de nutrición familiar.
        </p>
    </div>

    <!-- Barra de Búsqueda y Categorías -->
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-8 bg-white p-4 rounded-2xl border border-slate-200 shadow-sm">
        <!-- Categorías Pills -->
        <div class="flex items-center gap-2 overflow-x-auto w-full sm:w-auto scrollbar-none pb-2 sm:pb-0">
            <button 
                wire:click="selectCategory(null)" 
                class="btn btn-sm rounded-full transition-all duration-200 shrink-0 {{ is_null($selectedCategory) ? 'btn-primary text-white shadow-sm' : 'btn-outline border-slate-300 text-slate-700 hover:bg-slate-100' }}">
                Todos
            </button>
            @foreach($categories as $category)
                <button 
                    wire:click="selectCategory('{{ $category }}')" 
                    class="btn btn-sm rounded-full transition-all duration-200 shrink-0 {{ $selectedCategory === $category ? 'btn-primary text-white shadow-sm' : 'btn-outline border-slate-300 text-slate-700 hover:bg-slate-100' }}">
                    {{ $category }}
                </button>
            @endforeach
        </div>

        <!-- Input de Búsqueda -->
        <div class="relative w-full sm:w-72">
            <input 
                type="text" 
                wire:model.live.debounce.300ms="search" 
                placeholder="Buscar noticia..." 
                class="input input-sm input-bordered w-full pl-9 rounded-xl bg-slate-50 text-xs focus:border-primary focus:outline-none"
            />
            <svg class="w-4 h-4 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        </div>
    </div>

    <!-- Noticia Destacada (Si no hay búsqueda ni categoría activa) -->
    @if(is_null($selectedCategory) && $search === '' && $featured)
        <div class="mb-10 bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden gsap-reveal">
            <div class="grid grid-cols-1 lg:grid-cols-12 items-center">
                <div class="lg:col-span-7 h-64 lg:h-96 relative overflow-hidden">
                    <img 
                        src="{{ $featured->image_url }}" 
                        alt="{{ $featured->title }}" 
                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-500"
                    />
                    <div class="absolute top-4 left-4">
                        <span class="badge badge-primary text-white font-bold text-xs uppercase px-3 py-1 shadow-md">
                            Destacado
                        </span>
                    </div>
                </div>
                <div class="lg:col-span-5 p-6 sm:p-8 lg:p-10 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-slate-500 mb-2">
                            <span class="font-semibold text-secondary">{{ $featured->category }}</span>
                            <span>•</span>
                            <span>{{ $featured->published_at?->diffForHumans() }}</span>
                            <span>•</span>
                            <span>{{ $featured->read_time }}</span>
                        </div>
                        <h2 class="font-display font-extrabold text-2xl sm:text-3xl text-secondary mb-3 leading-snug">
                            {{ $featured->title }}
                        </h2>
                        <p class="text-slate-600 text-sm leading-relaxed mb-6">
                            {{ $featured->excerpt }}
                        </p>
                    </div>

                    <div>
                        <a href="{{ route('noticias.show', $featured->slug) }}" class="btn btn-primary btn-sm rounded-xl text-white font-medium gap-2">
                            <span>Leer artículo completo</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Grid de Noticias con ScrollTrigger -->
    @if($news->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 gsap-stagger-container">
            @foreach($news as $article)
                <article class="card bg-white rounded-3xl shadow-sm hover:shadow-md transition-all duration-300 border border-slate-200 overflow-hidden flex flex-col justify-between gsap-stagger-item group">
                    <div>
                        <!-- Imagen de Portada -->
                        <div class="h-48 relative overflow-hidden bg-slate-100">
                            <img 
                                src="{{ $article->image_url }}" 
                                alt="{{ $article->title }}" 
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                loading="lazy"
                            />
                            <span class="badge badge-sm badge-neutral absolute top-3 left-3 bg-secondary/90 text-white text-[11px] font-medium shadow-sm">
                                {{ $article->category }}
                            </span>
                            <span class="badge badge-sm badge-ghost absolute top-3 right-3 bg-white/90 text-slate-700 text-[11px] font-medium shadow-sm">
                                {{ $article->read_time }}
                            </span>
                        </div>

                        <!-- Contenido -->
                        <div class="p-6">
                            <span class="text-xs text-slate-400 block mb-2 font-medium">
                                Publicado {{ $article->published_at?->format('d M, Y') }}
                            </span>
                            <h3 class="font-display font-bold text-lg text-secondary group-hover:text-primary transition-colors leading-snug mb-2 line-clamp-2">
                                <a href="{{ route('noticias.show', $article->slug) }}">
                                    {{ $article->title }}
                                </a>
                            </h3>
                            <p class="text-xs text-slate-600 leading-relaxed line-clamp-3">
                                {{ $article->excerpt }}
                            </p>
                        </div>
                    </div>

                    <!-- Footer de la Card -->
                    <div class="p-6 pt-0 border-t border-slate-100 mt-2">
                        <a href="{{ route('noticias.show', $article->slug) }}" class="btn btn-ghost btn-sm text-primary hover:bg-primary/10 rounded-xl w-full justify-between font-semibold text-xs mt-3">
                            <span>Leer Noticia</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $news->links() }}
        </div>
    @else
        <div class="bg-white rounded-3xl p-12 text-center border border-slate-200 max-w-lg mx-auto">
            <h3 class="font-display font-bold text-lg text-secondary mb-2">No se encontraron artículos</h3>
            <p class="text-xs text-slate-500 mb-4">No hay publicaciones disponibles para esta categoría o búsqueda.</p>
            <button wire:click="selectCategory(null)" class="btn btn-sm btn-primary rounded-xl text-white">Ver todas las noticias</button>
        </div>
    @endif
</div>
