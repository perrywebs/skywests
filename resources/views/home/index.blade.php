@extends('layouts.public')

@section('title', 'Home')

@section('content')

{{-- ============================================
     HERO SECTION — Light, Human-Centered
     ============================================ --}}
<section class="relative min-h-[92vh] flex items-center overflow-hidden hero-mesh bg-gradient-to-br from-white via-brand-50/20 to-white">
    {{-- Decorative elements --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
        <div class="absolute -top-40 -right-40 w-[600px] h-[600px] bg-brand-400/8 rounded-full blur-[100px] animate-float"></div>
        <div class="absolute -bottom-20 -left-20 w-[500px] h-[500px] bg-accent-400/6 rounded-full blur-[100px] animate-float-slow"></div>
        <div class="absolute inset-0 opacity-[0.025]" style="background-image: radial-gradient(circle, #000 1px, transparent 1px); background-size: 24px 24px;"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 lg:pt-36 lg:pb-24">
        <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">
            {{-- Left: Content --}}
            <div class="max-w-xl">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-brand-50 border border-brand-100 text-brand-700 text-xs font-semibold tracking-wider uppercase mb-8 opacity-0 animate-fade-in-down" style="animation-fill-mode: forwards;">
                    Trusted by Millions Worldwide
                </div>

                <h1 class="font-display text-[2.75rem] sm:text-5xl lg:text-[3.5rem] font-extrabold leading-[1.08] tracking-tight text-slate-900 mb-6 opacity-0 animate-fade-in-up" style="animation-fill-mode: forwards;">
                    Built
                    <span class="gradient-text"> For Real People</span>
                </h1>

                <p class="text-lg text-slate-500 leading-relaxed mb-10 max-w-lg opacity-0 animate-fade-in-up" style="animation-delay: 0.1s; animation-fill-mode: forwards;">
                    {{ $settings->site_name }} transformed the digital banking industry using data and technology. We are one of the largest digital banking providers, dedicated to innovating, simplifying, and humanizing banking.
                </p>

                <div class="flex flex-col sm:flex-row gap-3.5 opacity-0 animate-fade-in-up" style="animation-delay: 0.2s; animation-fill-mode: forwards;">
                    <a href="login" class="btn-shine group inline-flex items-center justify-center gap-2.5 px-8 py-4 bg-brand-600 hover:bg-brand-700 text-white font-semibold rounded-2xl shadow-xl shadow-brand-600/20 hover:shadow-brand-600/35 transition-all duration-300 hover:-translate-y-0.5">
                        Online Banking
                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="about" class="group inline-flex items-center justify-center gap-2.5 px-8 py-4 bg-white hover:bg-slate-50 text-slate-700 font-semibold rounded-2xl border border-slate-200 shadow-sm transition-all duration-300 hover:-translate-y-0.5">
                        Learn More
                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>

                {{-- Trust indicators --}}
                <div class="flex items-center gap-6 mt-12 opacity-0 animate-fade-in-up" style="animation-delay: 0.35s; animation-fill-mode: forwards;">
                    <div class="flex -space-x-2.5">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop&auto=format" alt="User" class="w-9 h-9 rounded-full border-[2.5px] border-white object-cover shadow-sm">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&fit=crop&auto=format" alt="User" class="w-9 h-9 rounded-full border-[2.5px] border-white object-cover shadow-sm">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&h=100&fit=crop&auto=format" alt="User" class="w-9 h-9 rounded-full border-[2.5px] border-white object-cover shadow-sm">
                    </div>
                    <div>
                        <div class="flex items-center gap-0.5 text-amber-400">
                            @for($i = 0; $i < 5; $i++)
                            <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>
                        <p class="text-xs text-slate-400 mt-1">Trusted by <span class="font-semibold text-slate-600">18.5M+</span> users</p>
                    </div>
                </div>
            </div>

            {{-- Right: Human Photo --}}
            <div class="relative hidden lg:block">
                <div class="relative z-10">
                    <img src="https://images.unsplash.com/photo-1513682121497-80211f36a7d3?q=80&w=688&auto=format" alt="Banking Professional" class="rounded-3xl shadow-2xl shadow-slate-900/10 w-full max-w-lg ml-auto object-cover aspect-[4/3]" loading="lazy">
                    {{-- Floating card --}}
                    <div class="absolute -bottom-6 -left-6 glass-card rounded-2xl p-4 shadow-xl animate-float z-20">
                        <div class="flex items-center gap-3">
                            <div class="w-11 h-11 rounded-xl bg-accent-500 flex items-center justify-center shadow-lg shadow-accent-500/20">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-400">Transfer Success</p>
                                <p class="text-sm font-bold text-slate-900">+$2,450.00</p>
                            </div>
                        </div>
                    </div>
                    {{-- Floating stat --}}
                    <div class="absolute -top-5 -right-5 glass-card rounded-2xl p-4 shadow-xl animate-float-slow z-20">
                        <div class="flex items-center gap-3">
                            <div class="w-11 h-11 rounded-xl bg-brand-600 flex items-center justify-center shadow-lg shadow-brand-600/20">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-400">Active Users</p>
                                <p class="text-sm font-bold text-slate-900">18.5M+</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-0 bg-gradient-to-br from-brand-200/15 to-accent-200/15 rounded-3xl transform rotate-2 scale-105 -z-0"></div>
            </div>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full"><path d="M0 60L60 50C120 40 240 20 360 15C480 10 600 20 720 25C840 30 960 30 1080 25C1200 20 1320 10 1380 5L1440 0V60H0Z" fill="white"/></svg>
    </div>
</section>


{{-- ============================================
     STATS BAR
     ============================================ --}}
<section class="bg-white py-10 border-b border-slate-100/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 lg:gap-12">
            <div class="text-center reveal-on-scroll">
                <p class="text-3xl lg:text-4xl font-display font-extrabold gradient-text stat-number">18.5M+</p>
                <p class="text-sm text-slate-400 mt-1.5 font-medium">Active Users</p>
            </div>
            <div class="text-center reveal-on-scroll delay-1">
                <p class="text-3xl lg:text-4xl font-display font-extrabold gradient-text stat-number">150+</p>
                <p class="text-sm text-slate-400 mt-1.5 font-medium">Countries Served</p>
            </div>
            <div class="text-center reveal-on-scroll delay-2">
                <p class="text-3xl lg:text-4xl font-display font-extrabold gradient-text stat-number">$2.5B+</p>
                <p class="text-sm text-slate-400 mt-1.5 font-medium">Transferred Monthly</p>
            </div>
            <div class="text-center reveal-on-scroll delay-3">
                <p class="text-3xl lg:text-4xl font-display font-extrabold gradient-text stat-number">99.9%</p>
                <p class="text-sm text-slate-400 mt-1.5 font-medium">Uptime Guarantee</p>
            </div>
        </div>
    </div>
</section>


{{-- ============================================
     ABOUT SECTION
     ============================================ --}}
<section class="py-24 lg:py-32 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 lg:gap-24 items-center">
            {{-- Image --}}
            <div class="relative reveal-on-scroll">
                <div class="relative z-10">
                    <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=800&h=600&fit=crop&auto=format" alt="Banking Professional" class="rounded-3xl shadow-xl w-full object-cover aspect-[4/3]" loading="lazy">
                </div>
                <div class="absolute -bottom-4 -right-4 w-full h-full bg-brand-100 rounded-3xl -z-0"></div>
                <div class="absolute -top-4 -right-4 bg-white rounded-2xl p-4 shadow-lg shadow-slate-900/5 border border-slate-100 z-20">
                    <div class="flex items-center gap-2.5">
                        <div class="w-10 h-10 rounded-xl bg-brand-50 flex items-center justify-center">
                            <i data-lucide="award" class="w-5 h-5 text-brand-600"></i>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400">Since</p>
                            <p class="text-sm font-bold text-slate-900">2013</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Content --}}
            <div class="reveal-on-scroll">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-50 text-brand-700 text-xs font-semibold uppercase tracking-wider mb-5">
                    About Us
                </div>
                <h2 class="font-display text-3xl lg:text-4xl font-extrabold text-slate-900 leading-tight mb-6">
                    We Revolutionized Digital Banking
                </h2>
                <p class="text-slate-500 leading-relaxed mb-10 text-lg">
                    We've grown to become one of the largest digital banking providers, committed to inventing, simplifying, and humanizing the banking experience.
                </p>

                <div class="space-y-6 mb-10">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-brand-50 flex items-center justify-center">
                            <i data-lucide="smartphone" class="w-6 h-6 text-brand-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-900 mb-1">Powerful Mobile & Online App</h3>
                            <p class="text-sm text-slate-400">Our mobile app service is quick and easy to use, and you can get it from your app store.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-accent-50 flex items-center justify-center">
                            <i data-lucide="gauge" class="w-6 h-6 text-accent-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-900 mb-1">Brings More Transparency & Speed</h3>
                            <p class="text-sm text-slate-400">Our digital banking services are transparent and quick, and we're building a reliable network.</p>
                        </div>
                    </div>
                </div>

                <a href="about" class="group inline-flex items-center gap-2 px-7 py-3.5 bg-brand-600 hover:bg-brand-700 text-white font-semibold rounded-2xl shadow-lg shadow-brand-600/20 hover:shadow-brand-600/35 transition-all duration-300 hover:-translate-y-0.5">
                    Read More
                    <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>


{{-- ============================================
     FEATURES / CURRENCY TOOLS
     ============================================ --}}
<section class="py-24 lg:py-32 bg-slate-50/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16 reveal-on-scroll">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-50 text-brand-700 text-xs font-semibold uppercase tracking-wider mb-5">
                Popular Currency Tools
            </div>
            <h2 class="font-display text-3xl lg:text-4xl font-extrabold text-slate-900 leading-tight">
                Set Up & Exchange Money From Your Cards In A Minute
            </h2>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="group bg-white rounded-2xl p-7 shadow-sm hover-card border border-slate-100/80 reveal-on-scroll">
                <div class="w-14 h-14 rounded-2xl bg-brand-50 group-hover:bg-brand-600 flex items-center justify-center mb-6 transition-all duration-300">
                    <i data-lucide="send" class="w-6 h-6 text-brand-600 group-hover:text-white transition-colors duration-300"></i>
                </div>
                <h3 class="font-semibold text-slate-900 mb-2.5">Money Transfer</h3>
                <p class="text-sm text-slate-400 leading-relaxed mb-5">Send money to relatives and friends all around the world with our digital platform.</p>
                <a href="login" class="inline-flex items-center gap-1.5 text-sm font-semibold text-brand-600 hover:text-brand-700 transition-colors group/link">
                    Send Money
                    <svg class="w-4 h-4 transition-transform duration-300 group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>

            <div class="group bg-white rounded-2xl p-7 shadow-sm hover-card border border-slate-100/80 reveal-on-scroll delay-1">
                <div class="w-14 h-14 rounded-2xl bg-brand-50 group-hover:bg-brand-600 flex items-center justify-center mb-6 transition-all duration-300">
                    <i data-lucide="bar-chart-3" class="w-6 h-6 text-brand-600 group-hover:text-white transition-colors duration-300"></i>
                </div>
                <h3 class="font-semibold text-slate-900 mb-2.5">Currency Charts</h3>
                <p class="text-sm text-slate-400 leading-relaxed mb-5">Watch the market's movement and make trading decisions with our currency charts.</p>
                <a href="login" class="inline-flex items-center gap-1.5 text-sm font-semibold text-brand-600 hover:text-brand-700 transition-colors group/link">
                    View Chart
                    <svg class="w-4 h-4 transition-transform duration-300 group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>

            <div class="group bg-white rounded-2xl p-7 shadow-sm hover-card border border-slate-100/80 reveal-on-scroll delay-2">
                <div class="w-14 h-14 rounded-2xl bg-brand-50 group-hover:bg-brand-600 flex items-center justify-center mb-6 transition-all duration-300">
                    <i data-lucide="bell-ring" class="w-6 h-6 text-brand-600 group-hover:text-white transition-colors duration-300"></i>
                </div>
                <h3 class="font-semibold text-slate-900 mb-2.5">Rate Alerts</h3>
                <p class="text-sm text-slate-400 leading-relaxed mb-5">Get the finest currency rates in the market to enable our clients to convert.</p>
                <a href="login" class="inline-flex items-center gap-1.5 text-sm font-semibold text-brand-600 hover:text-brand-700 transition-colors group/link">
                    Create Alert
                    <svg class="w-4 h-4 transition-transform duration-300 group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>

            <div class="group bg-white rounded-2xl p-7 shadow-sm hover-card border border-slate-100/80 reveal-on-scroll delay-3">
                <div class="w-14 h-14 rounded-2xl bg-brand-50 group-hover:bg-brand-600 flex items-center justify-center mb-6 transition-all duration-300">
                    <i data-lucide="user-plus" class="w-6 h-6 text-brand-600 group-hover:text-white transition-colors duration-300"></i>
                </div>
                <h3 class="font-semibold text-slate-900 mb-2.5">Create Account</h3>
                <p class="text-sm text-slate-400 leading-relaxed mb-5">Create a free digital bank account with us today to send money around the world.</p>
                <a href="register" class="inline-flex items-center gap-1.5 text-sm font-semibold text-brand-600 hover:text-brand-700 transition-colors group/link">
                    Get Started
                    <svg class="w-4 h-4 transition-transform duration-300 group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>


{{-- ============================================
     WHY CHOOSE US
     ============================================ --}}
<section class="py-24 lg:py-32 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 lg:gap-24 items-center">
            {{-- Content --}}
            <div class="reveal-on-scroll">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-50 text-brand-700 text-xs font-semibold uppercase tracking-wider mb-5">
                    Why Choose Us
                </div>
                <h2 class="font-display text-3xl lg:text-4xl font-extrabold text-slate-900 leading-tight mb-6">
                    Innovative & Digital By Design
                </h2>
                <p class="text-slate-500 leading-relaxed mb-10 text-lg">
                    {{ $settings->site_name }} transformed the credit card business using data and technology more than ten years ago. We are now one of the largest digital banking providers.
                </p>

                <div class="space-y-4">
                    <div class="flex items-center gap-3.5 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-accent-500 flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="font-medium text-slate-700">Historical Currency Rates</span>
                    </div>
                    <div class="flex items-center gap-3.5 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-accent-500 flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="font-medium text-slate-700">Travel Expense Calculator</span>
                    </div>
                    <div class="flex items-center gap-3.5 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-accent-500 flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="font-medium text-slate-700">Currency Email Updates</span>
                    </div>
                </div>
            </div>

            {{-- Human Photos Grid --}}
            <div class="relative reveal-on-scroll">
                <div class="grid grid-cols-2 gap-5">
                    <div class="space-y-5">
                        <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=400&h=500&fit=crop&auto=format" alt="Business Professional" class="rounded-2xl shadow-lg w-full object-cover aspect-[3/4]" loading="lazy">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop&auto=format" alt="Team Member" class="rounded-2xl shadow-lg w-full object-cover aspect-square" loading="lazy">
                    </div>
                    <div class="space-y-5 pt-10">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400&h=400&fit=crop&auto=format" alt="Executive" class="rounded-2xl shadow-lg w-full object-cover aspect-square" loading="lazy">
                        <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=400&h=500&fit=crop&auto=format" alt="Banker" class="rounded-2xl shadow-lg w-full object-cover aspect-[3/4]" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ============================================
     EXCHANGE RATES TABLE
     ============================================ --}}
<section class="py-24 lg:py-32 bg-slate-50/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16 reveal-on-scroll">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-50 text-brand-700 text-xs font-semibold uppercase tracking-wider mb-5">
                Live Exchange Rates
            </div>
            <h2 class="font-display text-3xl lg:text-4xl font-extrabold text-slate-900 leading-tight">
                Exchange Money Across The World In Real Time With Lowest Fees
            </h2>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-100/80 overflow-hidden reveal-on-scroll">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-slate-100">
                            <th class="text-left text-xs font-semibold text-slate-400 uppercase tracking-wider px-6 py-4">Currency</th>
                            <th class="text-left text-xs font-semibold text-slate-400 uppercase tracking-wider px-6 py-4">Amount</th>
                            <th class="text-left text-xs font-semibold text-slate-400 uppercase tracking-wider px-6 py-4">Change (24h)</th>
                            <th class="text-right text-xs font-semibold text-slate-400 uppercase tracking-wider px-6 py-4">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="temp/custom/assets/img/flag/usa.png" alt="USD" class="w-9 h-9 rounded-full object-cover shadow-sm">
                                    <div>
                                        <p class="font-semibold text-slate-900 text-sm">US Dollar</p>
                                        <p class="text-xs text-slate-400">USD</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium text-slate-900 text-sm">120.54</td>
                            <td class="px-6 py-4"><span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 text-xs font-medium"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>+0.50%</span></td>
                            <td class="px-6 py-4 text-right"><a href="login" class="inline-flex items-center gap-1.5 px-4 py-2 bg-brand-600 hover:bg-brand-700 text-white text-xs font-medium rounded-lg transition-colors"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>Send</a></td>
                        </tr>
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="temp/custom/assets/img/flag/japan.png" alt="JPY" class="w-9 h-9 rounded-full object-cover shadow-sm">
                                    <div>
                                        <p class="font-semibold text-slate-900 text-sm">Japanese Yen</p>
                                        <p class="text-xs text-slate-400">JPY</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium text-slate-900 text-sm">134.76</td>
                            <td class="px-6 py-4"><span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 text-xs font-medium"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>+0.24%</span></td>
                            <td class="px-6 py-4 text-right"><a href="login" class="inline-flex items-center gap-1.5 px-4 py-2 bg-brand-600 hover:bg-brand-700 text-white text-xs font-medium rounded-lg transition-colors"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>Send</a></td>
                        </tr>
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="temp/custom/assets/img/flag/uk.png" alt="GBP" class="w-9 h-9 rounded-full object-cover shadow-sm">
                                    <div>
                                        <p class="font-semibold text-slate-900 text-sm">British Pound</p>
                                        <p class="text-xs text-slate-400">GBP</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium text-slate-900 text-sm">245.10</td>
                            <td class="px-6 py-4"><span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-red-50 text-red-700 text-xs font-medium"><svg class="w-3 h-3 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>-0.30%</span></td>
                            <td class="px-6 py-4 text-right"><a href="login" class="inline-flex items-center gap-1.5 px-4 py-2 bg-brand-600 hover:bg-brand-700 text-white text-xs font-medium rounded-lg transition-colors"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>Send</a></td>
                        </tr>
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="temp/custom/assets/img/flag/canada.png" alt="CAD" class="w-9 h-9 rounded-full object-cover shadow-sm">
                                    <div>
                                        <p class="font-semibold text-slate-900 text-sm">Canadian Dollar</p>
                                        <p class="text-xs text-slate-400">CAD</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium text-slate-900 text-sm">1.2741</td>
                            <td class="px-6 py-4"><span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-red-50 text-red-700 text-xs font-medium"><svg class="w-3 h-3 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>-0.76%</span></td>
                            <td class="px-6 py-4 text-right"><a href="login" class="inline-flex items-center gap-1.5 px-4 py-2 bg-brand-600 hover:bg-brand-700 text-white text-xs font-medium rounded-lg transition-colors"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>Send</a></td>
                        </tr>
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="temp/custom/assets/img/flag/france.png" alt="CHF" class="w-9 h-9 rounded-full object-cover shadow-sm">
                                    <div>
                                        <p class="font-semibold text-slate-900 text-sm">Swiss Franc</p>
                                        <p class="text-xs text-slate-400">CHF</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium text-slate-900 text-sm">15.063</td>
                            <td class="px-6 py-4"><span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 text-xs font-medium"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>+0.26%</span></td>
                            <td class="px-6 py-4 text-right"><a href="login" class="inline-flex items-center gap-1.5 px-4 py-2 bg-brand-600 hover:bg-brand-700 text-white text-xs font-medium rounded-lg transition-colors"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>Send</a></td>
                        </tr>
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="temp/custom/assets/img/flag/newzland.png" alt="NZD" class="w-9 h-9 rounded-full object-cover shadow-sm">
                                    <div>
                                        <p class="font-semibold text-slate-900 text-sm">New Zealand Dollar</p>
                                        <p class="text-xs text-slate-400">NZD</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium text-slate-900 text-sm">0.7564</td>
                            <td class="px-6 py-4"><span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-red-50 text-red-700 text-xs font-medium"><svg class="w-3 h-3 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>-0.063%</span></td>
                            <td class="px-6 py-4 text-right"><a href="login" class="inline-flex items-center gap-1.5 px-4 py-2 bg-brand-600 hover:bg-brand-700 text-white text-xs font-medium rounded-lg transition-colors"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>Send</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <p class="text-center text-xs text-slate-300 mt-4">Last Updated Jan 20, 2022</p>
    </div>
</section>


{{-- ============================================
     BENEFITS SECTION
     ============================================ --}}
<section class="py-24 lg:py-32 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16 reveal-on-scroll">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-50 text-brand-700 text-xs font-semibold uppercase tracking-wider mb-5">
                Your Benefits
            </div>
            <h2 class="font-display text-3xl lg:text-4xl font-extrabold text-slate-900 leading-tight">
                Your One-Stop Digital Banking Platform
            </h2>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="flex items-start gap-5 p-7 rounded-2xl bg-slate-50/80 border border-slate-100/80 hover-card reveal-on-scroll">
                <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-brand-50 flex items-center justify-center">
                    <i data-lucide="globe" class="w-6 h-6 text-brand-600"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-slate-900 mb-1.5">Global Coverage</h3>
                    <p class="text-sm text-slate-400 leading-relaxed">Send and receive money from anywhere in the world with ease.</p>
                </div>
            </div>

            <div class="flex items-start gap-5 p-7 rounded-2xl bg-slate-50/80 border border-slate-100/80 hover-card reveal-on-scroll delay-1">
                <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-accent-50 flex items-center justify-center">
                    <i data-lucide="wallet" class="w-6 h-6 text-accent-600"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-slate-900 mb-1.5">Easy Transfer Method</h3>
                    <p class="text-sm text-slate-400 leading-relaxed">Simple and intuitive transfer process for all users.</p>
                </div>
            </div>

            <div class="flex items-start gap-5 p-7 rounded-2xl bg-slate-50/80 border border-slate-100/80 hover-card reveal-on-scroll delay-2">
                <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-brand-50 flex items-center justify-center">
                    <i data-lucide="headphones" class="w-6 h-6 text-brand-600"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-slate-900 mb-1.5">Global 24/7 Support</h3>
                    <p class="text-sm text-slate-400 leading-relaxed">Our support team is available around the clock to assist you.</p>
                </div>
            </div>

            <div class="flex items-start gap-5 p-7 rounded-2xl bg-slate-50/80 border border-slate-100/80 hover-card reveal-on-scroll delay-3">
                <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-accent-50 flex items-center justify-center">
                    <i data-lucide="percent" class="w-6 h-6 text-accent-600"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-slate-900 mb-1.5">Lowest Fee</h3>
                    <p class="text-sm text-slate-400 leading-relaxed">Competitive rates with minimal transaction fees.</p>
                </div>
            </div>

            <div class="flex items-start gap-5 p-7 rounded-2xl bg-slate-50/80 border border-slate-100/80 hover-card reveal-on-scroll delay-4">
                <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-brand-50 flex items-center justify-center">
                    <i data-lucide="zap" class="w-6 h-6 text-brand-600"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-slate-900 mb-1.5">Instant Processing</h3>
                    <p class="text-sm text-slate-400 leading-relaxed">Lightning-fast transaction processing in real time.</p>
                </div>
            </div>

            <div class="flex items-start gap-5 p-7 rounded-2xl bg-slate-50/80 border border-slate-100/80 hover-card reveal-on-scroll delay-5">
                <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-accent-50 flex items-center justify-center">
                    <i data-lucide="shield-check" class="w-6 h-6 text-accent-600"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-slate-900 mb-1.5">Bank Level Security</h3>
                    <p class="text-sm text-slate-400 leading-relaxed">Industry-leading security protocols to protect your assets.</p>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ============================================
     CURRENCY PROFILE
     ============================================ --}}
<section class="py-24 lg:py-32 bg-slate-50/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16 reveal-on-scroll">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-50 text-brand-700 text-xs font-semibold uppercase tracking-wider mb-5">
                Currency Profile
            </div>
            <h2 class="font-display text-3xl lg:text-4xl font-extrabold text-slate-900 leading-tight">
                Get These Local Account Details Just Like Pay A Local
            </h2>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @php
                $currencies = [
                    ['flag' => 'temp/custom/assets/img/flag/usa.png', 'name' => 'USD - US Dollar'],
                    ['flag' => 'temp/custom/assets/img/flag/eu.png', 'name' => 'EUR - Euro'],
                    ['flag' => 'temp/custom/assets/img/flag/uk.png', 'name' => 'GBP - British Pound'],
                    ['flag' => 'temp/custom/assets/img/flag/canada.png', 'name' => 'CAD - Canadian Dollar'],
                    ['flag' => 'temp/custom/images/197582.png', 'name' => 'KRW - South Korean Won'],
                    ['flag' => 'temp/custom/assets/img/flag/japan.png', 'name' => 'JPY - Japanese Yen'],
                    ['flag' => 'temp/custom/images/197375.png', 'name' => 'CNY - Chinese Yuan'],
                    ['flag' => 'temp/custom/assets/img/flag/newzland.png', 'name' => 'NZD - NZ Dollar'],
                    ['flag' => 'temp/custom/assets/img/flag/france.png', 'name' => 'CHF - Swiss Franc'],
                ];
            @endphp

            @foreach($currencies as $i => $currency)
            <div class="flex items-center gap-4 p-5 bg-white rounded-xl border border-slate-100/80 hover-card reveal-on-scroll delay-{{ $i % 4 }}">
                <img src="{{ $currency['flag'] }}" alt="{{ $currency['name'] }}" class="w-10 h-10 rounded-full object-cover shadow-sm">
                <span class="font-medium text-slate-700 text-sm">{{ $currency['name'] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ============================================
     TESTIMONIALS
     ============================================ --}}
<section class="py-24 lg:py-32 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16 reveal-on-scroll">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-50 text-brand-700 text-xs font-semibold uppercase tracking-wider mb-5">
                Our Reviews
            </div>
            <h2 class="font-display text-3xl lg:text-4xl font-extrabold text-slate-900 leading-tight">
                More Than 18M+ Happy Customers Trust Our Services
            </h2>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-slate-50/80 rounded-2xl p-7 border border-slate-100/80 hover-card reveal-on-scroll">
                <div class="flex items-center gap-0.5 text-amber-400 mb-5">
                    @for($i = 0; $i < 5; $i++)
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-slate-500 text-sm leading-relaxed mb-6">"I opened a checking and savings account at {{ $settings->site_name }} on McHenry in Modesto, California. The teller who helped me was a pleasure to work with. She was very knowledgeable and through setting up my accounts."</p>
                <div class="flex items-center gap-3">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop&auto=format" alt="Jim Morison" class="w-10 h-10 rounded-full object-cover">
                    <div>
                        <p class="font-semibold text-slate-900 text-sm">Jim Morison</p>
                        <p class="text-xs text-slate-400">Director, BAT</p>
                    </div>
                </div>
            </div>

            <div class="bg-slate-50/80 rounded-2xl p-7 border border-slate-100/80 hover-card reveal-on-scroll delay-1">
                <div class="flex items-center gap-0.5 text-amber-400 mb-5">
                    @for($i = 0; $i < 5; $i++)
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-slate-500 text-sm leading-relaxed mb-6">"I've been with {{ $settings->site_name }} for four years. I went through a loan modification with them, as well as a six-month forbearance. They are always there to help me."</p>
                <div class="flex items-center gap-3">
                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&h=100&fit=crop&auto=format" alt="Tom Haris" class="w-10 h-10 rounded-full object-cover">
                    <div>
                        <p class="font-semibold text-slate-900 text-sm">Tom Haris</p>
                        <p class="text-xs text-slate-400">Engineer, Olleo</p>
                    </div>
                </div>
            </div>

            <div class="bg-slate-50/80 rounded-2xl p-7 border border-slate-100/80 hover-card reveal-on-scroll delay-2">
                <div class="flex items-center gap-0.5 text-amber-400 mb-5">
                    @for($i = 0; $i < 5; $i++)
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-slate-500 text-sm leading-relaxed mb-6">"I usually request service through the app or website, although I have called in on occasion. They're all extremely responsive and accommodating."</p>
                <div class="flex items-center gap-3">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&fit=crop&auto=format" alt="Chris Haris" class="w-10 h-10 rounded-full object-cover">
                    <div>
                        <p class="font-semibold text-slate-900 text-sm">Chris Haris</p>
                        <p class="text-xs text-slate-400">MD, ITec</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ============================================
     CTA SECTION
     ============================================ --}}
<section class="py-24 lg:py-32 bg-gradient-to-br from-brand-600 via-brand-700 to-brand-900 relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-white/[0.03] rounded-full -translate-y-1/2 translate-x-1/3"></div>
        <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-white/[0.03] rounded-full translate-y-1/3 -translate-x-1/3"></div>
        <div class="absolute inset-0 opacity-[0.02]" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 20px 20px;"></div>
    </div>
    <div class="relative max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-display text-3xl lg:text-4xl font-extrabold text-white leading-tight mb-6 reveal-on-scroll">
            Ready to Start Banking Smarter?
        </h2>
        <p class="text-lg text-white/60 mb-10 max-w-xl mx-auto reveal-on-scroll delay-1">
            Join over 18.5 million users who trust {{ $settings->site_name }} for their digital banking needs.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 reveal-on-scroll delay-2">
            <a href="{{ route('register') }}" class="btn-shine group inline-flex items-center gap-2.5 px-9 py-4 bg-white text-brand-700 font-bold rounded-2xl shadow-xl shadow-brand-900/20 hover:shadow-brand-900/40 transition-all duration-300 hover:-translate-y-0.5">
                Create Free Account
                <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="{{ route('login') }}" class="inline-flex items-center gap-2.5 px-9 py-4 bg-white/10 hover:bg-white/20 text-white font-semibold rounded-2xl border border-white/20 transition-all duration-300 hover:-translate-y-0.5">
                Sign In
            </a>
        </div>
    </div>
</section>


{{-- ============================================
     BLOG SECTION
     ============================================ --}}
<section class="py-24 lg:py-32 bg-slate-50/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16 reveal-on-scroll">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-50 text-brand-700 text-xs font-semibold uppercase tracking-wider mb-5">
                Our Blog
            </div>
            <h2 class="font-display text-3xl lg:text-4xl font-extrabold text-slate-900 leading-tight">
                Keep Up To Date With Global Content From Our Trusted Team
            </h2>
        </div>

        <div class="grid md:grid-cols-3 gap-7">
            <a href="https://www.cnbc.com/2020/02/27/5-things-every-new-business-owner-needs-to-know-before-starting.html" target="_blank" rel="noopener" class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100/80 hover-card reveal-on-scroll">
                <div class="aspect-[16/10] overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=600&h=400&fit=crop&auto=format" alt="Blog" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="px-2.5 py-0.5 bg-brand-50 text-brand-600 text-xs font-medium rounded-full">Corporate</span>
                        <span class="text-xs text-slate-300">May 22, 2022</span>
                    </div>
                    <h3 class="font-semibold text-slate-900 group-hover:text-brand-600 transition-colors leading-snug">5 Things You Need To Know Before Starting Business</h3>
                </div>
            </a>

            <a href="https://www.investopedia.com/articles/insights/122016/9-common-effects-inflation.asp" target="_blank" rel="noopener" class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100/80 hover-card reveal-on-scroll delay-1">
                <div class="aspect-[16/10] overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?w=600&h=400&fit=crop&auto=format" alt="Blog" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="px-2.5 py-0.5 bg-brand-50 text-brand-600 text-xs font-medium rounded-full">Consumer</span>
                        <span class="text-xs text-slate-300">May 13, 2022</span>
                    </div>
                    <h3 class="font-semibold text-slate-900 group-hover:text-brand-600 transition-colors leading-snug">Effect Of Inflation On Our Daily Expenditure</h3>
                </div>
            </a>

            <a href="https://www.airtreks.com/go/foreign-currency/" target="_blank" rel="noopener" class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100/80 hover-card reveal-on-scroll delay-2">
                <div class="aspect-[16/10] overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?w=600&h=400&fit=crop&auto=format" alt="Blog" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="px-2.5 py-0.5 bg-brand-50 text-brand-600 text-xs font-medium rounded-full">Finance</span>
                        <span class="text-xs text-slate-300">Apr 15, 2022</span>
                    </div>
                    <h3 class="font-semibold text-slate-900 group-hover:text-brand-600 transition-colors leading-snug">7 Tips To Get Best Exchange Rate In Currency</h3>
                </div>
            </a>
        </div>
    </div>
</section>

@endsection
