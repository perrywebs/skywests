@extends('layouts.guest2')

@section('title', 'Confirm Password')

@section('content')

{{-- Centered layout --}}
<div class="flex items-center justify-center min-h-screen p-6 bg-slate-50/50">
    <div class="w-full max-w-md animate-fade-in-up">
        
        {{-- Mobile Logo --}}
        <div class="text-center mb-8">
            <a href="/" class="inline-block">
                <img src="{{ asset('storage/app/public/' . $settings->logo) }}" alt="Logo" class="h-10 mx-auto">
            </a>
        </div>

        {{-- Card --}}
        <div class="bg-white rounded-2xl shadow-xl shadow-slate-900/5 border border-slate-100 overflow-hidden">
            <div class="px-8 pt-8 pb-6">
                <div class="text-center mb-6">
                    <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-brand-50 mb-4">
                        <i data-lucide="shield" class="h-7 w-7 text-brand-600"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-slate-900 font-display">Secure Area</h2>
                    <p class="mt-2 text-sm text-slate-400">Please confirm your password before continuing.</p>
                </div>
            </div>

            <div class="px-8 pb-8">
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

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

                    {{-- Password --}}
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-slate-700 mb-2">Password</label>
                        <div class="relative" x-data="{ show: false }">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <i data-lucide="lock" class="w-4 h-4 text-slate-300"></i>
                            </div>
                            <input :type="show ? 'text' : 'password'" id="password" name="password"
                                class="w-full pl-10 pr-11 py-3 bg-slate-50/80 border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-300 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 focus:bg-white transition-all duration-200"
                                placeholder="Enter your password" required autocomplete="current-password" autofocus>
                            <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-slate-300 hover:text-slate-500 transition-colors">
                                <i data-lucide="eye" class="w-4 h-4" x-show="!show"></i>
                                <i data-lucide="eye-off" class="w-4 h-4" x-show="show" x-cloak></i>
                            </button>
                        </div>
                    </div>

                    {{-- Submit --}}
                    <button type="submit"
                        class="w-full py-3.5 px-4 bg-brand-600 hover:bg-brand-700 text-white font-semibold rounded-xl shadow-lg shadow-brand-600/20 hover:shadow-brand-600/35 transition-all duration-300 hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <i data-lucide="check" class="w-4 h-4"></i>
                        Confirm Password
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
