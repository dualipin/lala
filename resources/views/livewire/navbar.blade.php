<header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md shadow-sm border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="navbar px-0 py-2.5">
            <!-- Mobile Hamburger & Brand -->
            <div class="navbar-start flex items-center gap-2">
                <!-- Mobile Dropdown -->
                <div class="dropdown lg:hidden">
                    <button tabindex="0" class="btn btn-ghost btn-circle text-secondary focus:outline-none" aria-label="Abrir Menú">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-3 shadow-xl bg-base-100 rounded-2xl w-64 border border-slate-100">
                        <li class="menu-title text-xs font-bold text-slate-400 uppercase tracking-wider px-2 py-1">Navegación</li>
                        <li>
                            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active bg-primary text-white font-semibold' : 'text-slate-700 hover:text-primary font-medium' }} py-2.5 rounded-xl">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                Inicio
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('catalogo') }}" class="{{ request()->routeIs('catalogo') ? 'active bg-primary text-white font-semibold' : 'text-slate-700 hover:text-primary font-medium' }} py-2.5 rounded-xl">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                                Catálogo de Productos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('innovaciones') }}" class="{{ request()->routeIs('innovaciones') ? 'active bg-primary text-white font-semibold' : 'text-slate-700 hover:text-primary font-medium' }} py-2.5 rounded-xl">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                Innovaciones de Empaque
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('noticias') }}" class="{{ request()->routeIs('noticias*') ? 'active bg-primary text-white font-semibold' : 'text-slate-700 hover:text-primary font-medium' }} py-2.5 rounded-xl">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                                Noticias Comerciales
                            </a>
                        </li>
                        <div class="divider my-1"></div>
                        <li class="px-2 py-1">
                            <div class="flex flex-col p-2 bg-slate-50 rounded-xl text-xs">
                                <span class="font-bold text-secondary">CEDIS Atasta de Serra</span>
                                <span class="text-slate-500">Villahermosa, Tabasco</span>
                                <a href="tel:9933541200" class="text-primary font-semibold mt-1 hover:underline">(993) 354 1200</a>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Brand Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                    <span class="w-11 h-11 rounded-2xl bg-white ring-1 ring-slate-200 overflow-hidden flex items-center justify-center shadow-sm group-hover:scale-105 transition-transform duration-200">
                        <img src="{{ asset('assets/logo.png') }}" alt="Logo LALA" width="36" height="36" class="w-9 h-9 object-contain" />
                    </span>
                    <div class="flex flex-col">
                        <span class="font-display font-extrabold text-2xl tracking-tighter text-secondary leading-none">
                            LALA<span class="text-primary">.</span>
                        </span>
                        <span class="text-[10px] uppercase font-bold tracking-widest text-slate-400">CEDIS Atasta</span>
                    </div>
                </a>
            </div>

            <!-- Desktop Nav Menu -->
            <div class="navbar-center hidden lg:flex">
                <ul class="menu menu-horizontal px-1 gap-1">
                    <li>
                        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'bg-primary/10 text-primary font-bold' : 'text-slate-700 hover:text-primary font-semibold' }} rounded-xl transition-all duration-150 px-4 py-2">
                            Inicio
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('catalogo') }}" class="{{ request()->routeIs('catalogo') ? 'bg-primary/10 text-primary font-bold' : 'text-slate-700 hover:text-primary font-semibold' }} rounded-xl transition-all duration-150 px-4 py-2">
                            Catálogo
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('innovaciones') }}" class="{{ request()->routeIs('innovaciones') ? 'bg-primary/10 text-primary font-bold' : 'text-slate-700 hover:text-primary font-semibold' }} rounded-xl transition-all duration-150 px-4 py-2">
                            Innovaciones
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('noticias') }}" class="{{ request()->routeIs('noticias*') ? 'bg-primary/10 text-primary font-bold' : 'text-slate-700 hover:text-primary font-semibold' }} rounded-xl transition-all duration-150 px-4 py-2">
                            Noticias
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Navbar End: Contact / CEDIS Quick info -->
            <div class="navbar-end flex items-center gap-2 sm:gap-3">
                <a href="tel:9933541200" class="hidden sm:inline-flex items-center gap-2 text-xs font-semibold px-3 py-1.5 rounded-xl bg-slate-100 text-secondary hover:bg-slate-200 transition-colors">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>CEDIS: (993) 354 1200</span>
                </a>

                <a href="{{ route('catalogo') }}" class="btn btn-primary btn-sm rounded-xl text-white font-medium shadow-sm hover:shadow transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    <span class="hidden md:inline">Ver Productos</span>
                </a>
            </div>
        </div>
    </div>
</header>
