@extends('layouts.guest2')

@section('title', 'Two-Factor Authentication')

@section('content')
<div x-data="{ recovery: false }" class="flex items-center justify-center min-h-screen p-6 bg-slate-50/50">
    <div class="w-full max-w-md animate-fade-in-up">
        
        {{-- Mobile Logo --}}
        <div class="text-center mb-8">
            <a href="/" class="inline-block">
                <img src="{{ asset('storage/app/public/' . $settings->logo) }}" alt="Logo" class="h-10 mx-auto">
            </a>
        </div>

        {{-- Alerts --}}
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

        {{-- Card --}}
        <div class="bg-white rounded-2xl shadow-xl shadow-slate-900/5 border border-slate-100 overflow-hidden">
            <div class="px-8 pt-8 pb-6">
                <div class="text-center mb-4">
                    <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-brand-50 mb-4">
                        <i data-lucide="shield" class="h-7 w-7 text-brand-600"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-slate-900 font-display">Two-Factor Authentication</h2>
                </div>
                <p class="text-sm text-slate-400 text-center" x-show="! recovery">
                    Please confirm access to your account by entering the authentication code provided by your authenticator application.
                </p>
                <p class="text-sm text-slate-400 text-center" x-show="recovery">
                    Please confirm access to your account by entering one of your emergency recovery codes.
                </p>
            </div>

            <div class="px-8 pb-8">
                <form method="POST" action="{{ route('two-factor.login') }}">
                    @csrf

                    {{-- Authentication Code --}}
                    <div class="mb-5" x-show="! recovery">
                        <label for="code" class="block text-sm font-medium text-slate-700 mb-2">Authentication Code</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <i data-lucide="key" class="w-4 h-4 text-slate-300"></i>
                            </div>
                            <input id="code" type="text" inputmode="numeric"
                                class="w-full pl-10 pr-4 py-3 bg-slate-50/80 border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-300 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 focus:bg-white transition-all duration-200"
                                name="code" autofocus x-ref="code" autocomplete="one-time-code" placeholder="Enter 6-digit code">
                        </div>
                    </div>

                    {{-- Recovery Code --}}
                    <div class="mb-5" x-show="recovery">
                        <label for="recovery_code" class="block text-sm font-medium text-slate-700 mb-2">Recovery Code</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <i data-lucide="key" class="w-4 h-4 text-slate-300"></i>
                            </div>
                            <input id="recovery_code" type="text"
                                class="w-full pl-10 pr-4 py-3 bg-slate-50/80 border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-300 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 focus:bg-white transition-all duration-200"
                                name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" placeholder="Enter recovery code">
                        </div>
                    </div>

                    {{-- Toggle Button --}}
                    <button type="button"
                        x-show="! recovery"
                        x-on:click="recovery = true; $nextTick(() => { $refs.recovery_code.focus() })"
                        class="w-full mb-4 py-3 px-4 bg-slate-50 hover:bg-slate-100 text-slate-600 font-medium rounded-xl border border-slate-200 transition-all duration-200 text-sm">
                        Use a recovery code
                    </button>
                    <button type="button"
                        x-show="recovery"
                        x-on:click="recovery = false; $nextTick(() => { $refs.code.focus() })"
                        class="w-full mb-4 py-3 px-4 bg-slate-50 hover:bg-slate-100 text-slate-600 font-medium rounded-xl border border-slate-200 transition-all duration-200 text-sm">
                        Use an authentication code
                    </button>

                    {{-- Submit --}}
                    <button type="submit"
                        class="w-full py-3.5 px-4 bg-brand-600 hover:bg-brand-700 text-white font-semibold rounded-xl shadow-lg shadow-brand-600/20 hover:shadow-brand-600/35 transition-all duration-300 hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <i data-lucide="log-in" class="w-4 h-4"></i>
                        Log in
                    </button>
                </form>
            </div>
        </div>

        <p class="mt-6 text-center text-xs text-slate-400">&copy; {{ date('Y') }} {{ $settings->site_name }}. All rights reserved.</p>
    </div>
</div>
@endsection

@section('scripts')
@parent
@endsection
