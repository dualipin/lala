<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="lala" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Grupo LALA - Nutriendo y Sirviendo Alimentos de Calidad' }}</title>
    <meta name="description" content="Portal web oficial de productos, innovaciones y distribución LALA en Tabasco y sureste de México. CEDIS Atasta de Serra.">
    <link rel="icon" type="image/png" href="{{ asset('assets/logo.png') }}">

    <!-- Google Fonts: Poppins (Display/Headings) & Inter (Body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Styles & Scripts via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="min-h-screen flex flex-col font-sans antialiased bg-base-200 text-base-content selection:bg-primary selection:text-white">

    <!-- Livewire Navbar Component -->
    <livewire:navbar />

    <!-- Main Content Container -->
    <main class="flex-grow">
        {{ $slot ?? '' }}
        @yield('content')
    </main>

    <!-- Global Corporate Footer with CEDIS Atasta de Serra Contact Data -->
    <footer class="bg-secondary text-white pt-14 pb-8 border-t-4 border-primary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                <!-- Columna 1: Identidad Corporativa -->
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <span class="w-11 h-11 rounded-xl bg-white overflow-hidden flex items-center justify-center shadow-md">
                            <img src="{{ asset('assets/logo.png') }}" alt="Logo LALA" width="36" height="36" class="w-9 h-9 object-contain" />
                        </span>
                        <span class="font-display font-extrabold text-2xl tracking-tight text-white">LALA<span class="text-primary font-bold">.</span></span>
                    </div>
                    <p class="text-slate-300 text-sm leading-relaxed mb-4">
                        Comprometidos con nutrir cada momento de la vida de las familias mexicanas con alimentos lácteos y cárnicos de la más alta calidad y frescura garantizada.
                    </p>
                    <div class="flex items-center gap-2">
                        <span class="badge badge-success badge-sm text-white font-medium">Cadena de Frío Certificada</span>
                        <span class="badge badge-outline badge-sm text-slate-300">FSSC 22000</span>
                    </div>
                </div>

                <!-- Columna 2: Navegación Rápida -->
                <div>
                    <h3 class="font-display font-semibold text-lg text-white mb-4 border-b border-white/10 pb-2">
                        Explorar Portal
                    </h3>
                    <ul class="space-y-2 text-sm text-slate-300">
                        <li>
                            <a href="{{ route('home') }}" class="hover:text-primary transition-colors flex items-center gap-2">
                                <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                Inicio Comercial
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('catalogo') }}" class="hover:text-primary transition-colors flex items-center gap-2">
                                <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                                Catálogo de Productos y Stock
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('innovaciones') }}" class="hover:text-primary transition-colors flex items-center gap-2">
                                <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                Innovaciones Visuales de Empaque
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('noticias') }}" class="hover:text-primary transition-colors flex items-center gap-2">
                                <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                                Canal de Noticias y Comunidad
                            </a>
                        </li>
                        <li>
                            <a href="/admin" class="hover:text-primary transition-colors flex items-center gap-2">
                                <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Portal de Administración (CEDIS)
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Columna 3: Centro de Distribución Atasta de Serra -->
                <div class="lg:col-span-2 bg-white/5 rounded-2xl p-6 border border-white/10 backdrop-blur-sm">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2.5 rounded-xl bg-primary text-white">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <span class="text-xs uppercase tracking-wider text-primary font-bold">Distribución Regional</span>
                            <h3 class="font-display font-bold text-xl text-white">CEDIS Atasta de Serra</h3>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-slate-300">
                        <div class="flex items-start gap-2.5">
                            <svg class="w-5 h-5 text-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            <div>
                                <span class="font-semibold text-white block">Ubicación Estratégica:</span>
                                <span>Av. 27 de Febrero, Col. Atasta de Serra, C.P. 86100, Villahermosa, Tabasco, México.</span>
                            </div>
                        </div>

                        <div class="flex items-start gap-2.5">
                            <svg class="w-5 h-5 text-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <div>
                                <span class="font-semibold text-white block">Teléfonos de Contacto:</span>
                                <span>Directo CEDIS: <a href="tel:9933541200" class="text-white font-medium hover:text-primary underline">(993) 354 1200</a></span>
                                <span class="block text-xs text-slate-400 mt-0.5">Línea Nacional: 800-201-5252 (800-00-LALA)</span>
                            </div>
                        </div>

                        <div class="flex items-start gap-2.5">
                            <svg class="w-5 h-5 text-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <div>
                                <span class="font-semibold text-white block">Correo Electrónico:</span>
                                <a href="mailto:contacto.tabasco@grupolala.com" class="text-white hover:text-primary transition-colors">
                                    contacto.tabasco@grupolala.com
                                </a>
                            </div>
                        </div>

                        <div class="flex items-start gap-2.5">
                            <svg class="w-5 h-5 text-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <div>
                                <span class="font-semibold text-white block">Horario de Despacho:</span>
                                <span>Lunes a Sábado: 06:00 - 18:00 hrs.</span>
                                <span class="block text-xs text-emerald-400 font-medium">Atención prioritaria a tenderos y minoristas</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Separador y Copyright -->
            <div class="mt-12 pt-6 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-400">
                <p>&copy; {{ date('Y') }} Grupo LALA, S.A.B. de C.V. Todos los derechos reservados. CEDIS Atasta de Serra, Tabasco.</p>
                <div class="flex items-center gap-6">
                    <span class="hover:text-white cursor-pointer">Aviso de Privacidad</span>
                    <span class="hover:text-white cursor-pointer">Términos Comerciales</span>
                    <span class="hover:text-white cursor-pointer">Garantía de Inocuidad</span>
                </div>
            </div>
        </div>
    </footer>

    @livewireScripts
</body>
</html>
