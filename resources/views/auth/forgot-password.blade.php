@extends('layouts.guest2')

@section('title', 'Forgot Password')

@section('content')
<div class="min-h-screen flex" style="font-family: 'Inter', sans-serif;">
    {{-- Left Branding Panel --}}
    <div class="hidden lg:flex lg:w-1/2 relative bg-gradient-to-br from-brand-600 via-brand-700 to-brand-900 overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-20 left-20 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-white/5 rounded-full blur-3xl"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-80 h-80 border border-white/10 rounded-full"></div>
            <div class="absolute top-1/4 right-1/4 w-48 h-48 border border-white/5 rounded-full"></div>
            <div class="absolute bottom-1/4 left-1/4 w-64 h-64 border border-white/5 rounded-full"></div>
        </div>
        <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%23ffffff&quot; fill-opacity=&quot;0.4&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

        <div class="relative z-10 flex flex-col items-center justify-center w-full p-12">
            <div class="mb-8">
                @if($settings->logo)
                    <img src="{{ asset('storage/app/public/' . $settings->logo) }}" alt="{{ $settings->site_name }}" class="h-16 filter brightness-0 invert opacity-90">
                @else
                    <span class="text-3xl font-bold text-white tracking-tight" style="font-family: 'Plus Jakarta Sans', sans-serif;">{{ $settings->site_name }}</span>
                @endif
            </div>

            <h1 class="text-4xl font-bold text-white mb-4 text-center" style="font-family: 'Plus Jakarta Sans', sans-serif;">Password Recovery</h1>
            <p class="text-lg text-white/80 text-center max-w-md mb-12">Secure access to your {{ $settings->site_name }} account with our simple password recovery process.</p>

            <div class="grid grid-cols-2 gap-6 max-w-lg">
                <div class="flex items-start gap-3 p-4 rounded-xl bg-white/10 backdrop-blur-sm">
                    <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center">
                        <i data-lucide="shield-check" class="w-5 h-5 text-white"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-white mb-1">Secure Recovery</h4>
                        <p class="text-xs text-white/70">Bank-level security for password reset</p>
                    </div>
                </div>

                <div class="flex items-start gap-3 p-4 rounded-xl bg-white/10 backdrop-blur-sm">
                    <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center">
                        <i data-lucide="mail-check" class="w-5 h-5 text-white"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-white mb-1">Email Verification</h4>
                        <p class="text-xs text-white/70">Verified email required for reset</p>
                    </div>
                </div>

                <div class="flex items-start gap-3 p-4 rounded-xl bg-white/10 backdrop-blur-sm">
                    <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center">
                        <i data-lucide="zap" class="w-5 h-5 text-white"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-white mb-1">Quick Process</h4>
                        <p class="text-xs text-white/70">Reset in just a few simple steps</p>
                    </div>
                </div>

                <div class="flex items-start gap-3 p-4 rounded-xl bg-white/10 backdrop-blur-sm">
                    <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center">
                        <i data-lucide="lock" class="w-5 h-5 text-white"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-white mb-1">Account Protection</h4>
                        <p class="text-xs text-white/70">Keep your account fully protected</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Right Form Panel --}}
    <div class="w-full lg:w-1/2 flex justify-center items-center p-6 lg:p-12 bg-white lg:bg-slate-50/50">
        <div class="w-full max-w-md">
            {{-- Mobile Logo --}}
            <div class="lg:hidden flex items-center justify-center mb-8">
                @if($settings->logo)
                    <img src="{{ asset('storage/app/public/' . $settings->logo) }}" alt="{{ $settings->site_name }}" class="h-12">
                @else
                    <span class="text-2xl font-bold text-brand-600" style="font-family: 'Plus Jakarta Sans', sans-serif;">{{ $settings->site_name }}</span>
                @endif
            </div>

            {{-- Alerts --}}
            @if (Session::has('message'))
                <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-700 text-sm">
                    {{ Session::get('message') }}
                </div>
            @endif

            @if (session('status'))
                <div class="mb-6 p-4 rounded-2xl bg-green-50 border border-green-200 text-green-700 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-700 text-sm">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Card --}}
            <div class="bg-white rounded-2xl shadow-xl shadow-slate-900/5 border border-slate-100 p-8">
                <div class="text-center mb-8">
                    <div class="w-14 h-14 mx-auto mb-4 rounded-2xl bg-brand-100 flex items-center justify-center">
                        <i data-lucide="key-round" class="w-7 h-7 text-brand-600"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-slate-900 mb-2" style="font-family: 'Plus Jakarta Sans', sans-serif;">Reset Your Password</h2>
                    <p class="text-sm text-slate-500">Enter your email address and we'll send you a link to reset your password.</p>
                </div>

                <form method="POST" action="{{ route('password.email') }}" class="space-y-6" x-data="{ submitting: false }" @submit="submitting = true">
                    @csrf

                    {{-- Email Input --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i data-lucide="mail" class="w-5 h-5 text-slate-400"></i>
                            </div>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                class="w-full pl-11 pr-4 py-3 bg-slate-50/80 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all duration-200"
                                placeholder="Enter your email address"
                            >
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <button
                        type="submit"
                        :disabled="submitting"
                        class="w-full py-3.5 bg-brand-600 hover:bg-brand-700 text-white font-semibold rounded-xl shadow-lg shadow-brand-600/20 hover:shadow-brand-600/35 transition-all duration-300 hover:-translate-y-0.5 flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        <svg x-show="submitting" class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                        <i x-show="!submitting" data-lucide="send" class="w-5 h-5"></i>
                        <span x-text="submitting ? 'Sending...' : 'Send Reset Link'"></span>
                    </button>

                    {{-- Back to Login --}}
                    <a
                        href="{{ route('login') }}"
                        class="w-full py-3.5 bg-slate-50 hover:bg-slate-100 text-slate-700 font-semibold rounded-xl border border-slate-200 flex items-center justify-center gap-2 transition-all duration-200"
                    >
                        <i data-lucide="log-in" class="w-5 h-5"></i>
                        Back to Login
                    </a>
                </form>
            </div>

            {{-- Copyright --}}
            <div class="mt-8 text-center">
                <p class="text-xs text-slate-500">&copy; {{ date('Y') }} {{ $settings->site_name }}. All rights reserved.</p>
            </div>
        </div>
    </div>
</div>
@endsection
