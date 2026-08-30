<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">
    <meta name="description" content="{{ $settings->site_name }} - Dedicated to innovating, simplifying, and humanizing digital banking.">
    <title>@yield('title', $settings->site_name) - {{ $settings->site_name }}</title>
    <link rel="shortcut icon" href="{{ asset('storage/app/public/' . $settings->favicon) }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '{{ isset($appearanceSettings) ? $appearanceSettings->primary_color_light : "#eef2ff" }}',
                            100: '{{ isset($appearanceSettings) ? $appearanceSettings->primary_color_light : "#e0e7ff" }}',
                            200: '{{ isset($appearanceSettings) ? $appearanceSettings->primary_color_light : "#c7d2fe" }}',
                            300: '{{ isset($appearanceSettings) ? $appearanceSettings->primary_color_light : "#a5b4fc" }}',
                            400: '{{ isset($appearanceSettings) ? $appearanceSettings->primary_color : "#818cf8" }}',
                            500: '{{ isset($appearanceSettings) ? $appearanceSettings->primary_color : "#6366f1" }}',
                            600: '{{ isset($appearanceSettings) ? $appearanceSettings->primary_color : "#4f46e5" }}',
                            700: '{{ isset($appearanceSettings) ? $appearanceSettings->primary_color_dark : "#4338ca" }}',
                            800: '{{ isset($appearanceSettings) ? $appearanceSettings->primary_color_dark : "#3730a3" }}',
                            900: '{{ isset($appearanceSettings) ? $appearanceSettings->primary_color_dark : "#312e81" }}',
                        },
                        accent: {
                            400: '{{ isset($appearanceSettings) ? $appearanceSettings->secondary_color_light : "#34d399" }}',
                            500: '{{ isset($appearanceSettings) ? $appearanceSettings->secondary_color : "#10b981" }}',
                            600: '{{ isset($appearanceSettings) ? $appearanceSettings->secondary_color : "#059669" }}',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', '-apple-system', 'sans-serif'],
                        display: ['Plus Jakarta Sans', 'Inter', 'system-ui', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.6s ease-out forwards',
                        'fade-in-up': 'fadeInUp 0.6s ease-out forwards',
                        'fade-in-down': 'fadeInDown 0.5s ease-out forwards',
                        'slide-in-right': 'slideInRight 0.5s ease-out forwards',
                        'scale-in': 'scaleIn 0.4s ease-out forwards',
                        'float': 'float 6s ease-in-out infinite',
                        'float-slow': 'float 8s ease-in-out infinite',
                        'pulse-glow': 'pulseGlow 2s ease-in-out infinite',
                        'shimmer': 'shimmer 2s linear infinite',
                        'slide-up': 'slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                    },
                    keyframes: {
                        fadeIn: { '0%': { opacity: '0' }, '100%': { opacity: '1' } },
                        fadeInUp: { '0%': { opacity: '0', transform: 'translateY(30px)' }, '100%': { opacity: '1', transform: 'translateY(0)' } },
                        fadeInDown: { '0%': { opacity: '0', transform: 'translateY(-20px)' }, '100%': { opacity: '1', transform: 'translateY(0)' } },
                        slideInRight: { '0%': { opacity: '0', transform: 'translateX(30px)' }, '100%': { opacity: '1', transform: 'translateX(0)' } },
                        scaleIn: { '0%': { opacity: '0', transform: 'scale(0.9)' }, '100%': { opacity: '1', transform: 'scale(1)' } },
                        float: { '0%, 100%': { transform: 'translateY(0px)' }, '50%': { transform: 'translateY(-20px)' } },
                        pulseGlow: { '0%, 100%': { boxShadow: '0 0 20px rgba(99, 102, 241, 0.3)' }, '50%': { boxShadow: '0 0 40px rgba(99, 102, 241, 0.6)' } },
                        shimmer: { '0%': { backgroundPosition: '-200% 0' }, '100%': { backgroundPosition: '200% 0' } },
                        slideUp: { '0%': { opacity: '0', transform: 'translateY(40px)' }, '100%': { opacity: '1', transform: 'translateY(0)' } },
                    }
                }
            }
        }
    </script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* Scroll Reveal */
        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .reveal-on-scroll.revealed { opacity: 1; transform: translateY(0); }
        .reveal-on-scroll.delay-1 { transition-delay: 0.1s; }
        .reveal-on-scroll.delay-2 { transition-delay: 0.2s; }
        .reveal-on-scroll.delay-3 { transition-delay: 0.3s; }
        .reveal-on-scroll.delay-4 { transition-delay: 0.4s; }
        .reveal-on-scroll.delay-5 { transition-delay: 0.5s; }

        /* Glass morphism */
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Gradient text */
        .gradient-text {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 50%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Hover card */
        .hover-card {
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .hover-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.12);
        }

        /* Button shine */
        .btn-shine { position: relative; overflow: hidden; }
        .btn-shine::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }
        .btn-shine:hover::after { left: 100%; }

        /* Preloader */
        .preloader-overlay {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }
        .preloader-overlay.loaded { opacity: 0; visibility: hidden; pointer-events: none; }
        .preloader-ring {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            border: 3px solid #e2e8f0;
            border-top-color: var(--primary);
            animation: spin 0.8s linear infinite;
            position: relative;
        }
        .preloader-ring-inner {
            position: absolute;
            inset: 6px;
            border-radius: 50%;
            border: 3px solid transparent;
            border-bottom-color: var(--secondary);
            animation: spin 1.2s linear infinite reverse;
        }
        @keyframes spin { to { transform: rotate(360deg); } }

        /* Hero mesh */
        .hero-mesh {
            background:
                radial-gradient(ellipse 80% 50% at 50% -20%, rgba(99, 102, 241, 0.1), transparent),
                radial-gradient(ellipse 60% 40% at 80% 50%, rgba(16, 185, 129, 0.05), transparent),
                radial-gradient(ellipse 50% 30% at 20% 80%, rgba(99, 102, 241, 0.04), transparent);
        }

        .stat-number { font-variant-numeric: tabular-nums; }

        /* Image wrapper */
        .img-human {
            position: relative;
            overflow: hidden;
        }
        .img-human::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, var(--primary) 0%, transparent 60%);
            opacity: 0.08;
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
            .reveal-on-scroll { opacity: 1; transform: none; }
        }

        [x-cloak] { display: none !important; }

        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

        ::selection {
            background-color: rgba(99, 102, 241, 0.15);
            color: var(--primary-dark);
        }
    </style>

    <script>
        document.documentElement.style.setProperty('--primary', '{{ isset($appearanceSettings) ? $appearanceSettings->primary_color : "#6366f1" }}');
        document.documentElement.style.setProperty('--primary-dark', '{{ isset($appearanceSettings) ? $appearanceSettings->primary_color_dark : "#4338ca" }}');
        document.documentElement.style.setProperty('--primary-light', '{{ isset($appearanceSettings) ? $appearanceSettings->primary_color_light : "#818cf8" }}');
        document.documentElement.style.setProperty('--secondary', '{{ isset($appearanceSettings) ? $appearanceSettings->secondary_color : "#10b981" }}');
    </script>

    @if(isset($appearanceSettings) && $appearanceSettings->custom_css)
    <style>{!! $appearanceSettings->custom_css !!}</style>
    @endif

    @laravelPWA
</head>

<body class="font-sans bg-white text-slate-900 antialiased" x-data="{ mobileOpen: false, scrolled: false }" @scroll.window="scrolled = (window.scrollY > 20)">

    @include('components.preloader')

    {{-- Navigation --}}
    <header class="fixed top-0 left-0 right-0 z-50 transition-all duration-500"
            :class="scrolled ? 'bg-white/80 backdrop-blur-2xl shadow-[0_1px_3px_rgba(0,0,0,0.05)] border-b border-slate-100/80' : 'bg-transparent'"
            x-data="{ mobileOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-[72px]">
                <a href="/" class="flex items-center gap-2.5 flex-shrink-0 group">
                    <img src="{{ asset('storage/app/public/' . $settings->logo) }}" alt="{{ $settings->site_name }}" class="h-8 lg:h-9 w-auto transition-transform duration-300 group-hover:scale-105">
                </a>

                <nav class="hidden lg:flex items-center gap-0.5">
                    <a href="/" class="nav-link px-4 py-2 text-[13px] font-medium rounded-lg transition-all duration-200 {{ request()->is('/') ? 'text-brand-600 bg-brand-50/80' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">Home</a>
                    <a href="about" class="nav-link px-4 py-2 text-[13px] font-medium rounded-lg transition-all duration-200 {{ request()->is('about') ? 'text-brand-600 bg-brand-50/80' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">About</a>
                    <a href="business" class="nav-link px-4 py-2 text-[13px] font-medium rounded-lg transition-all duration-200 {{ request()->is('business') ? 'text-brand-600 bg-brand-50/80' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">Business</a>
                    <a href="personal" class="nav-link px-4 py-2 text-[13px] font-medium rounded-lg transition-all duration-200 {{ request()->is('personal') ? 'text-brand-600 bg-brand-50/80' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">Personal</a>
                    <a href="cards" class="nav-link px-4 py-2 text-[13px] font-medium rounded-lg transition-all duration-200 {{ request()->is('cards') ? 'text-brand-600 bg-brand-50/80' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">Cards</a>
                    <a href="loans" class="nav-link px-4 py-2 text-[13px] font-medium rounded-lg transition-all duration-200 {{ request()->is('loans') ? 'text-brand-600 bg-brand-50/80' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">Loans</a>
                    <a href="contact" class="nav-link px-4 py-2 text-[13px] font-medium rounded-lg transition-all duration-200 {{ request()->is('contact') ? 'text-brand-600 bg-brand-50/80' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">Support</a>
                </nav>

                <div class="hidden lg:flex items-center gap-3">
                    <a href="{{ route('login') }}" class="text-[13px] font-medium text-slate-600 hover:text-slate-900 px-4 py-2 rounded-lg hover:bg-slate-50 transition-all duration-200">Sign In</a>
                    <a href="{{ route('register') }}" class="text-[13px] font-semibold text-white bg-brand-600 hover:bg-brand-700 px-5 py-2.5 rounded-xl shadow-lg shadow-brand-600/20 hover:shadow-brand-600/40 transition-all duration-300 hover:-translate-y-0.5">Get Started</a>
                </div>

                <button @click="mobileOpen = !mobileOpen" class="lg:hidden relative p-2 rounded-lg text-slate-500 hover:bg-slate-50 transition-colors" aria-label="Toggle menu">
                    <svg x-show="!mobileOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="mobileOpen" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        <div x-show="mobileOpen" x-cloak
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="lg:hidden bg-white/95 backdrop-blur-2xl border-b border-slate-100 shadow-xl shadow-slate-900/5">
            <div class="max-w-7xl mx-auto px-4 py-5 space-y-1">
                <a href="/" class="block px-4 py-3 text-sm font-medium rounded-xl {{ request()->is('/') ? 'text-brand-600 bg-brand-50/80' : 'text-slate-600 hover:bg-slate-50' }}">Home</a>
                <a href="about" class="block px-4 py-3 text-sm font-medium rounded-xl {{ request()->is('about') ? 'text-brand-600 bg-brand-50/80' : 'text-slate-600 hover:bg-slate-50' }}">About</a>
                <a href="business" class="block px-4 py-3 text-sm font-medium rounded-xl {{ request()->is('business') ? 'text-brand-600 bg-brand-50/80' : 'text-slate-600 hover:bg-slate-50' }}">Business</a>
                <a href="personal" class="block px-4 py-3 text-sm font-medium rounded-xl {{ request()->is('personal') ? 'text-brand-600 bg-brand-50/80' : 'text-slate-600 hover:bg-slate-50' }}">Personal</a>
                <a href="cards" class="block px-4 py-3 text-sm font-medium rounded-xl {{ request()->is('cards') ? 'text-brand-600 bg-brand-50/80' : 'text-slate-600 hover:bg-slate-50' }}">Cards</a>
                <a href="loans" class="block px-4 py-3 text-sm font-medium rounded-xl {{ request()->is('loans') ? 'text-brand-600 bg-brand-50/80' : 'text-slate-600 hover:bg-slate-50' }}">Loans</a>
                <a href="contact" class="block px-4 py-3 text-sm font-medium rounded-xl {{ request()->is('contact') ? 'text-brand-600 bg-brand-50/80' : 'text-slate-600 hover:bg-slate-50' }}">Support</a>
                <div class="border-t border-slate-100 my-3"></div>
                <a href="{{ route('login') }}" class="block px-4 py-3 text-sm font-medium text-slate-600 hover:bg-slate-50 rounded-xl">Sign In</a>
                <a href="{{ route('register') }}" class="block px-4 py-3 text-sm font-semibold text-white bg-brand-600 hover:bg-brand-700 rounded-xl text-center mt-2 shadow-lg shadow-brand-600/20">Get Started</a>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-slate-950 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="pt-16 pb-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 lg:gap-8">
                <div class="lg:col-span-2">
                    <a href="/" class="inline-block mb-5">
                        <img src="{{ asset('storage/app/public/' . $settings->logo) }}" alt="{{ $settings->site_name }}" class="h-8 w-auto brightness-0 invert opacity-90">
                    </a>
                    <p class="text-slate-400 text-sm leading-relaxed max-w-sm mb-6">
                        We are now one of the largest digital banking providers, dedicated to innovating, simplifying, and humanizing banking.
                    </p>
                    <div class="flex items-center gap-2.5">
                        <a href="https://facebook.com/" target="_blank" rel="noopener" class="w-9 h-9 rounded-lg bg-white/5 hover:bg-brand-600 flex items-center justify-center transition-all duration-300 hover:-translate-y-0.5" aria-label="Facebook">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="https://twitter.com/" target="_blank" rel="noopener" class="w-9 h-9 rounded-lg bg-white/5 hover:bg-brand-600 flex items-center justify-center transition-all duration-300 hover:-translate-y-0.5" aria-label="Twitter">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                        <a href="https://instagram.com/" target="_blank" rel="noopener" class="w-9 h-9 rounded-lg bg-white/5 hover:bg-brand-600 flex items-center justify-center transition-all duration-300 hover:-translate-y-0.5" aria-label="Instagram">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        <a href="https://linkedin.com/" target="_blank" rel="noopener" class="w-9 h-9 rounded-lg bg-white/5 hover:bg-brand-600 flex items-center justify-center transition-all duration-300 hover:-translate-y-0.5" aria-label="LinkedIn">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="text-xs font-semibold text-white/60 uppercase tracking-widest mb-5">Company</h4>
                    <ul class="space-y-3">
                        <li><a href="about" class="text-sm text-slate-400 hover:text-white transition-colors duration-200">About Us</a></li>
                        <li><a href="business" class="text-sm text-slate-400 hover:text-white transition-colors duration-200">Business Banking</a></li>
                        <li><a href="personal" class="text-sm text-slate-400 hover:text-white transition-colors duration-200">Personal Banking</a></li>
                        <li><a href="cards" class="text-sm text-slate-400 hover:text-white transition-colors duration-200">Credit Cards</a></li>
                        <li><a href="loans" class="text-sm text-slate-400 hover:text-white transition-colors duration-200">Loans</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-xs font-semibold text-white/60 uppercase tracking-widest mb-5">Resources</h4>
                    <ul class="space-y-3">
                        <li><a href="contact" class="text-sm text-slate-400 hover:text-white transition-colors duration-200">Contact Us</a></li>
                        <li><a href="faq" class="text-sm text-slate-400 hover:text-white transition-colors duration-200">FAQ</a></li>
                        <li><a href="privacy-policy" class="text-sm text-slate-400 hover:text-white transition-colors duration-200">Privacy Policy</a></li>
                        <li><a href="terms-of-service" class="text-sm text-slate-400 hover:text-white transition-colors duration-200">Terms & Conditions</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-xs font-semibold text-white/60 uppercase tracking-widest mb-5">Contact</h4>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-2.5">
                            <i data-lucide="map-pin" class="w-4 h-4 text-white/30 mt-0.5 flex-shrink-0"></i>
                            <span class="text-sm text-slate-400">{{ $settings->address }}</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <i data-lucide="phone" class="w-4 h-4 text-white/30 flex-shrink-0"></i>
                            <a href="{{ $settings->whatsapp }}" class="text-sm text-slate-400 hover:text-white transition-colors">VIP ONLY</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-white/5 py-6">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <p class="text-sm text-slate-500">&copy; {{ date('Y') }} {{ $settings->site_name }}. All rights reserved.</p>
                    <div class="flex items-center gap-5 text-sm text-slate-500">
                        <a href="privacy-policy" class="hover:text-white transition-colors">Privacy</a>
                        <a href="terms-of-service" class="hover:text-white transition-colors">Terms</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <button @click="window.scrollTo({top: 0, behavior: 'smooth'})"
            x-show="scrolled"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90 translate-y-4"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="fixed bottom-6 right-6 z-40 w-11 h-11 bg-brand-600 hover:bg-brand-700 text-white rounded-xl shadow-lg shadow-brand-600/25 flex items-center justify-center transition-all duration-300 hover:-translate-y-0.5"
            aria-label="Back to top">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/></svg>
    </button>

    <script>lucide.createIcons();</script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (prefersReduced) return;
            var observerOptions = { threshold: 0.1, rootMargin: '0px 0px -60px 0px' };
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);
            document.querySelectorAll('.reveal-on-scroll').forEach(function(el) {
                observer.observe(el);
            });
        });
    </script>

    @if($settings->tido)
    <script src="//code.tidio.co/{{ $settings->tido }}" async></script>
    @endif

    @yield('scripts')
</body>
</html>
