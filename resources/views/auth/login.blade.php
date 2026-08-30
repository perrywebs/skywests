@extends('layouts.guest2')

@section('title', 'Sign In')
@section('content')

<div class="flex flex-col lg:flex-row min-h-screen">
    {{-- Left Side - Branding --}}
    <div class="hidden lg:flex lg:w-[45%] bg-gradient-to-br from-brand-600 via-brand-700 to-brand-900 relative overflow-hidden">
        {{-- Decorative shapes --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
            <div class="absolute top-1/4 left-1/4 w-72 h-72 bg-white/5 rounded-full floating-slow"></div>
            <div class="absolute bottom-1/3 right-1/4 w-96 h-96 bg-white/5 rounded-full floating"></div>
            <div class="absolute top-2/3 left-1/3 w-48 h-48 bg-white/5 rounded-full floating-slower"></div>
            <div class="absolute inset-0 auth-grid"></div>
            <div class="absolute inset-0 auth-mesh"></div>
        </div>

        {{-- Content --}}
        <div class="relative flex flex-col justify-center items-center w-full h-full text-white p-12 z-10">
            <a href="/" class="mb-10">
                <img src="{{ asset('storage/app/public/' . $settings->logo) }}" alt="Logo" class="h-14 filter brightness-0 invert opacity-90">
            </a>

            <h1 class="text-4xl font-extrabold mb-5 text-center font-display leading-tight">Swift Money<br>Transfer</h1>
            <p class="text-lg mb-12 max-w-sm text-center text-white/60 leading-relaxed">
                Swift and Secure Money Transfer to any bank account will become a breeze with {{ $settings->site_name }}.
            </p>

            <div class="grid grid-cols-2 gap-3.5 w-full max-w-sm">
                <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-2xl px-4 py-3.5">
                    <div class="flex-shrink-0 w-9 h-9 rounded-xl bg-white/15 flex items-center justify-center">
                        <i data-lucide="shield" class="h-4 w-4"></i>
                    </div>
                    <span class="text-sm font-medium">Secure</span>
                </div>
                <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-2xl px-4 py-3.5">
                    <div class="flex-shrink-0 w-9 h-9 rounded-xl bg-white/15 flex items-center justify-center">
                        <i data-lucide="zap" class="h-4 w-4"></i>
                    </div>
                    <span class="text-sm font-medium">Fast</span>
                </div>
                <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-2xl px-4 py-3.5">
                    <div class="flex-shrink-0 w-9 h-9 rounded-xl bg-white/15 flex items-center justify-center">
                        <i data-lucide="globe" class="h-4 w-4"></i>
                    </div>
                    <span class="text-sm font-medium">Global</span>
                </div>
                <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-2xl px-4 py-3.5">
                    <div class="flex-shrink-0 w-9 h-9 rounded-xl bg-white/15 flex items-center justify-center">
                        <i data-lucide="smartphone" class="h-4 w-4"></i>
                    </div>
                    <span class="text-sm font-medium">Mobile</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Right Side - Login Form --}}
    <div class="w-full lg:w-[55%] flex flex-col justify-center items-center p-6 sm:p-8 lg:p-12 bg-white lg:bg-slate-50/50">
        <div class="w-full max-w-md animate-fade-in-up">
            {{-- Mobile Logo --}}
            <div class="lg:hidden text-center mb-8">
                <a href="/" class="inline-block">
                    <img src="{{ asset('storage/app/public/' . $settings->logo) }}" alt="Logo" class="h-10 mx-auto">
                </a>
            </div>

            {{-- Alerts --}}
            @if (Session::has('status'))
                <div class="flex items-start gap-3 p-4 mb-6 bg-red-50 border border-red-100 rounded-2xl" role="alert">
                    <i data-lucide="alert-circle" class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5"></i>
                    <p class="text-sm text-red-600">{{ session('status') }}</p>
                </div>
            @endif

            @if ($errors->any())
                <div class="flex items-start gap-3 p-4 mb-6 bg-red-50 border border-red-100 rounded-2xl" role="alert">
                    <i data-lucide="alert-circle" class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5"></i>
                    <div>
                        @foreach ($errors->all() as $error)
                            <p class="text-sm text-red-600">{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Login Card --}}
            <div class="bg-white rounded-2xl shadow-xl shadow-slate-900/5 border border-slate-100 overflow-hidden">
                <div class="px-8 pt-8 pb-6">
                    <h2 class="text-2xl font-bold text-slate-900 font-display">Welcome back</h2>
                    <p class="mt-2 text-sm text-slate-400">Sign in to {{ $settings->site_name }} using your email and password.</p>
                </div>

                <div class="px-8 pb-8">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- Email --}}
                        <div class="mb-5">
                            <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email Address</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                    <i data-lucide="mail" class="w-4 h-4 text-slate-300"></i>
                                </div>
                                <input id="email" type="email" name="email"
                                    class="w-full pl-10 pr-4 py-3 bg-slate-50/80 border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-300 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 focus:bg-white transition-all duration-200"
                                    placeholder="name@email.com" required autocomplete="email"
                                    value="{{ old('email') }}">
                            </div>
                        </div>

                        {{-- Password --}}
                        <div class="mb-5">
                            <div class="flex items-center justify-between mb-2">
                                <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                                <a href="{{ route('password.request') }}" class="text-xs font-medium text-brand-600 hover:text-brand-700 transition-colors">Forgot password?</a>
                            </div>
                            <div class="relative" x-data="{ show: false }">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                    <i data-lucide="lock" class="w-4 h-4 text-slate-300"></i>
                                </div>
                                <input :type="show ? 'text' : 'password'" id="password" name="password"
                                    class="w-full pl-10 pr-11 py-3 bg-slate-50/80 border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-300 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 focus:bg-white transition-all duration-200"
                                    placeholder="Enter your password" required autocomplete="current-password">
                                <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-slate-300 hover:text-slate-500 transition-colors">
                                    <i data-lucide="eye" class="w-4 h-4" x-show="!show"></i>
                                    <i data-lucide="eye-off" class="w-4 h-4" x-show="show" x-cloak></i>
                                </button>
                            </div>
                        </div>

                        {{-- Remember Me --}}
                        <div class="mb-7">
                            <label class="flex items-center gap-2.5 cursor-pointer">
                                <input type="checkbox" name="remember_me" checked
                                    class="w-4 h-4 rounded border-slate-300 text-brand-600 focus:ring-brand-500/20">
                                <span class="text-sm text-slate-500">Stay signed in for 30 days</span>
                            </label>
                        </div>

                        {{-- Submit --}}
                        <button type="submit"
                            class="w-full py-3.5 px-4 bg-brand-600 hover:bg-brand-700 text-white font-semibold rounded-xl shadow-lg shadow-brand-600/20 hover:shadow-brand-600/35 transition-all duration-300 hover:-translate-y-0.5 flex items-center justify-center gap-2">
                            <i data-lucide="log-in" class="w-4 h-4"></i>
                            Sign In
                        </button>
                    </form>

                    <div class="mt-6 relative">
                        <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-slate-100"></div></div>
                        <div class="relative flex justify-center text-xs"><span class="px-3 bg-white text-slate-300">or</span></div>
                    </div>

                    <a href="{{ route('register') }}"
                        class="mt-4 w-full py-3.5 px-4 bg-slate-50 hover:bg-slate-100 text-slate-700 font-semibold rounded-xl border border-slate-200 transition-all duration-200 flex items-center justify-center gap-2">
                        <i data-lucide="user-plus" class="w-4 h-4"></i>
                        Create new account
                    </a>
                </div>
            </div>

            <p class="mt-6 text-center text-xs text-slate-400">
                By signing in, you agree to our
                <a href="terms-of-service" class="text-brand-600 hover:text-brand-700 font-medium">Terms</a> and
                <a href="privacy-policy" class="text-brand-600 hover:text-brand-700 font-medium">Privacy Policy</a>
            </p>
        </div>
    </div>
</div>

@endsection
