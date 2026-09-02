<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') - {{ $settings->site_name }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">
    <meta name="description"
        content="{{ $settings->site_name }} - Account management platform.">
    <link rel="icon" href="{{ asset('storage/app/public/' . $settings->favicon) }}" type="image/png" />

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '{{ isset($appearanceSettings) ? $appearanceSettings->primary_color_light : '#eef2ff' }}',
                            100: '{{ isset($appearanceSettings) ? $appearanceSettings->primary_color_light : '#e0e7ff' }}',
                            200: '{{ isset($appearanceSettings) ? $appearanceSettings->primary_color_light : '#c7d2fe' }}',
                            300: '{{ isset($appearanceSettings) ? $appearanceSettings->primary_color_light : '#a5b4fc' }}',
                            400: '{{ isset($appearanceSettings) ? $appearanceSettings->primary_color : '#818cf8' }}',
                            500: '{{ isset($appearanceSettings) ? $appearanceSettings->primary_color : '#6366f1' }}',
                            600: '{{ isset($appearanceSettings) ? $appearanceSettings->primary_color : '#4f46e5' }}',
                            700: '{{ isset($appearanceSettings) ? $appearanceSettings->primary_color_dark : '#4338ca' }}',
                            800: '{{ isset($appearanceSettings) ? $appearanceSettings->primary_color_dark : '#3730a3' }}',
                            900: '{{ isset($appearanceSettings) ? $appearanceSettings->primary_color_dark : '#312e81' }}',
                        },
                        accent: {
                            400: '{{ isset($appearanceSettings) ? $appearanceSettings->secondary_color_light : '#34d399' }}',
                            500: '{{ isset($appearanceSettings) ? $appearanceSettings->secondary_color : '#10b981' }}',
                            600: '{{ isset($appearanceSettings) ? $appearanceSettings->secondary_color : '#059669' }}',
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
                        'float': 'float 6s ease-in-out infinite',
                        'float-slow': 'float 8s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': {
                                opacity: '0'
                            },
                            '100%': {
                                opacity: '1'
                            }
                        },
                        fadeInUp: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(20px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            }
                        },
                        fadeInDown: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(-15px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            }
                        },
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0px)'
                            },
                            '50%': {
                                transform: 'translateY(-15px)'
                            }
                        },
                    }
                }
            }
        }
    </script>

    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Lucide Icons --}}
    <script src="https://unpkg.com/lucide@latest"></script>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap"
        rel="stylesheet">

    {{-- CSS Variables --}}
    <script>
        document.documentElement.style.setProperty('--primary',
            '{{ isset($appearanceSettings) ? $appearanceSettings->primary_color : '#6366f1' }}');
        document.documentElement.style.setProperty('--primary-dark',
            '{{ isset($appearanceSettings) ? $appearanceSettings->primary_color_dark : '#4338ca' }}');
        document.documentElement.style.setProperty('--primary-light',
            '{{ isset($appearanceSettings) ? $appearanceSettings->primary_color_light : '#818cf8' }}');
        document.documentElement.style.setProperty('--secondary',
            '{{ isset($appearanceSettings) ? $appearanceSettings->secondary_color : '#10b981' }}');
    </script>

    @if (isset($appearanceSettings) && $appearanceSettings->custom_css)
        <style>
            {!! $appearanceSettings->custom_css !!}
        </style>
    @endif

    <style>
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

        .preloader-overlay.loaded {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

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

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Floating elements */
        .floating {
            animation: floating 6s ease-in-out infinite;
        }

        .floating-slow {
            animation: floating 8s ease-in-out infinite;
        }

        .floating-slower {
            animation: floating 10s ease-in-out infinite;
        }

        @keyframes floating {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }
        }

        /* Auth mesh gradient */
        .auth-mesh {
            background:
                radial-gradient(ellipse 80% 50% at 50% -20%, rgba(255, 255, 255, 0.1), transparent),
                radial-gradient(ellipse 60% 40% at 80% 50%, rgba(255, 255, 255, 0.05), transparent);
        }

        /* Grid pattern overlay */
        .auth-grid {
            background-image: radial-gradient(rgba(255, 255, 255, 0.08) 1px, transparent 1px);
            background-size: 24px 24px;
        }

        /* Reduced motion */
        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                transition-duration: 0.01ms !important;
            }
        }

        /* Selection color */
        ::selection {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>

    {{-- @laravelPWA --}}
</head>

<body class="font-sans bg-slate-50 text-slate-900 antialiased">

    {{-- Preloader --}}
    <div id="preloader" class="preloader-overlay">
        <div class="flex flex-col items-center gap-5">
            <div class="preloader-ring">
                <div class="preloader-ring-inner"></div>
            </div>
            <span
                class="text-sm font-semibold text-slate-400 tracking-widest uppercase">{{ $settings->site_name }}</span>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="w-full min-h-screen">
        @yield('content')
    </div>

    {{-- Initialize Lucide Icons --}}
    <script>
        lucide.createIcons();
    </script>

    {{-- Preloader dismiss --}}
    <script>
        window.addEventListener('load', function() {
            var p = document.getElementById('preloader');
            if (p) {
                setTimeout(function() {
                    p.classList.add('loaded');
                    setTimeout(function() {
                        p.remove();
                    }, 500);
                }, 400);
            }
        });
        setTimeout(function() {
            var p = document.getElementById('preloader');
            if (p && !p.classList.contains('loaded')) {
                p.classList.add('loaded');
                setTimeout(function() {
                    p.remove();
                }, 500);
            }
        }, 3500);
    </script>

    @yield('scripts')
</body>

</html>
