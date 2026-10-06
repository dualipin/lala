@extends('layouts.app')

@section('content')
<div class="py-10 lg:py-16 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Breadcrumb -->
    <nav class="text-xs breadcrumbs mb-6 text-slate-500">
        <ul>
            <li><a href="{{ route('home') }}" class="hover:text-primary">Inicio</a></li>
            <li><a href="{{ route('noticias') }}" class="hover:text-primary">Noticias</a></li>
            <li class="text-secondary font-semibold">{{ Str::limit($article->title, 35) }}</li>
        </ul>
    </nav>

    <!-- Header del Artículo -->
    <header class="mb-8">
        <div class="flex items-center gap-3 mb-4">
            <span class="badge badge-primary text-white font-bold text-xs uppercase px-3 py-1">
                {{ $article->category }}
            </span>
            <span class="text-xs text-slate-400 font-medium">
                Publicado el {{ $article->published_at?->format('d \d\e F, Y') }} • {{ $article->read_time }} de lectura
            </span>
        </div>
        <h1 class="font-display font-extrabold text-3xl sm:text-4xl lg:text-5xl text-secondary leading-tight tracking-tight">
            {{ $article->title }}
        </h1>
    </header>

    <!-- Imagen Principal -->
    <div class="rounded-3xl overflow-hidden shadow-md mb-8 bg-slate-100 max-h-[450px]">
        <img 
            src="{{ $article->image_url }}" 
            alt="{{ $article->title }}" 
            class="w-full h-full object-cover"
        />
    </div>

    <!-- Contenido del Artículo -->
    <article class="bg-white rounded-3xl p-6 sm:p-10 shadow-sm border border-slate-200 mb-10">
        <!-- Lead Excerpt -->
        <p class="text-lg font-medium text-slate-700 leading-relaxed pb-6 mb-6 border-b border-slate-100 italic">
            "{{ $article->excerpt }}"
        </p>

        <!-- Body Content -->
        <div class="prose max-w-none text-slate-600 text-base leading-relaxed space-y-4">
            <p>{{ $article->content }}</p>
            <p>
                En Grupo LALA reafirmamos nuestro compromiso constante con la excelencia operativa y la calidad total. Cada uno de nuestros centros de distribución, incluyendo el <strong>CEDIS Atasta de Serra</strong> en Villahermosa, Tabasco, opera bajo estrictos protocolos de inocuidad y control térmico en cada etapa de la cadena de suministro.
            </p>
            <div class="bg-slate-50 border-l-4 border-primary p-4 rounded-r-2xl my-6">
                <h4 class="font-display font-bold text-secondary text-sm mb-1">Compromiso con el Comercio Local:</h4>
                <p class="text-xs text-slate-600">
                    A través de nuestro canal de distribución directa en Tabasco, respaldamos a tenderos y mayoristas con inventario en tiempo real, capacitación en manejo de lácteos y productos frescos garantizados.
                </p>
            </div>
        </div>

        <!-- Botones de Acción -->
        <div class="mt-8 pt-6 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
            <a href="{{ route('noticias') }}" class="btn btn-outline border-slate-300 text-slate-700 hover:bg-slate-100 btn-sm rounded-xl gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <span>Volver a Noticias</span>
            </a>
            
            <a href="tel:9933541200" class="btn btn-primary text-white btn-sm rounded-xl gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                <span>Contactar CEDIS Atasta</span>
            </a>
        </div>
    </article>
</div>
@endsection
