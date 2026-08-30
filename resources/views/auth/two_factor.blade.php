@extends('layouts.guest2')
@section('title', 'Two Factor Login')
@section('content')
<div class="flex items-center justify-center min-h-screen p-6 bg-slate-50/50">
    <div class="w-full max-w-md animate-fade-in-up">
        <div class="text-center mb-8">
            <a href="/" class="inline-block"><img src="{{ asset('storage/app/public/' . $settings->logo) }}" alt="Logo" class="h-10 mx-auto"></a>
        </div>
        @if(Session::has('message'))
            <div class="flex items-start gap-3 p-4 mb-6 bg-red-50 border border-red-100 rounded-2xl" role="alert">
                <i data-lucide="alert-circle" class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5"></i>
                <p class="text-sm text-red-600">{{ Session::get('message') }}</p>
            </div>
        @endif
        <div class="bg-white rounded-2xl shadow-xl shadow-slate-900/5 border border-slate-100 overflow-hidden">
            <div class="px-8 pt-8 pb-6">
                <div class="text-center mb-4">
                    <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-brand-50 mb-4">
                        <i data-lucide="shield" class="h-7 w-7 text-brand-600"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-slate-900 font-display">Two Factor Authentication</h2>
                </div>
                <p class="text-sm text-slate-400 text-center">A 2FA authentication code has been sent to your email. Kindly check your email and enter the code below to continue.</p>
            </div>
            <div class="px-8 pb-8">
                <form method="POST" action="{{ route('twofalogin') }}" x-data="{ submitting: false }" @submit="submitting = true">
                    @csrf
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Two Factor Code</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"><i data-lucide="key" class="w-4 h-4 text-slate-300"></i></div>
                            <input type="password" class="w-full pl-10 pr-4 py-3 bg-slate-50/80 border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-300 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 focus:bg-white transition-all duration-200" name="twofa" id="2fa" placeholder="Enter the code you received" required>
                        </div>
                        @if ($errors->has('2fa'))
                            <p class="mt-1.5 text-xs text-red-500">{{ $errors->first('2fa') }}</p>
                        @endif
                    </div>
                    <button type="submit" :disabled="submitting" class="w-full py-3.5 px-4 bg-brand-600 hover:bg-brand-700 text-white font-semibold rounded-xl shadow-lg shadow-brand-600/20 hover:shadow-brand-600/35 transition-all duration-300 hover:-translate-y-0.5 flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed">
                        <svg x-show="submitting" class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                        <i x-show="!submitting" data-lucide="log-in" class="w-4 h-4"></i>
                        <span x-text="submitting ? 'Verifying...' : 'Proceed'"></span>
                    </button>
                </form>
                <div class="mt-6 text-center">
                    <p class="text-sm text-slate-400">Are you stuck here? <a href="{{ route('adminlogout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-brand-600 hover:text-brand-700 font-medium">Repeat login</a></p>
                    <form id="logout-form" action="{{ route('adminlogout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                </div>
            </div>
        </div>
        <p class="mt-6 text-center text-xs text-slate-400">&copy; {{ date('Y') }} {{ $settings->site_name }}. All rights reserved.</p>
    </div>
</div>
@endsection
@section('scripts')
@parent
@endsection
