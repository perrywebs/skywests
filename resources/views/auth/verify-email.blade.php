@extends('layouts.guest2')

@section('title', 'Verify Email')

@section('content')
<div class="min-h-screen flex items-center justify-center p-6 bg-slate-50/50">
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-xl shadow-slate-900/5 border border-slate-100 overflow-hidden">

        {{-- Card Header --}}
        <div class="bg-gradient-to-r from-brand-600 to-brand-700 px-8 py-10 text-center">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-3xl bg-white/15 backdrop-blur-sm mb-4">
                <svg class="h-10 w-10 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                </svg>
            </div>
            <h1 class="text-white text-2xl font-bold font-display">Verify Your Email Address</h1>
            <p class="text-white/60">Please check your inbox for the verification link</p>
        </div>

        {{-- Card Body --}}
        <div class="p-8">

            {{-- Session Alerts --}}
            @if (session('message'))
                <div class="mb-4 rounded-2xl p-4 border border-red-100 bg-red-50 text-red-700 text-sm">
                    {{ session('message') }}
                </div>
            @endif

            @if (session('status'))
                <div class="mb-4 rounded-2xl p-4 border border-blue-100 bg-blue-50 text-blue-700 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Main Content --}}
            <div class="text-center">
                <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-brand-50 mb-6">
                    <svg class="h-12 w-12 text-brand-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 0 1-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 0 0 1.183 1.981l6.478 3.488m8.839 2.51-4.66-2.51m0 0-1.023-.55a2.25 2.25 0 0 0-2.134 0l-1.022.55m0 0-4.661 2.51m16.5 1.615a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.844a2.25 2.25 0 0 1 1.183-1.981l7.5-4.039a2.25 2.25 0 0 1 2.134 0l7.5 4.039a2.25 2.25 0 0 1 1.183 1.98V19.5Z" />
                    </svg>
                </div>

                <h2 class="text-2xl font-bold text-slate-900 mb-3">Check your inbox</h2>
                <p class="text-slate-500 mb-8">We've sent you an email with a link to confirm your account</p>

                {{-- Troubleshooting Section --}}
                <div class="bg-slate-50/80 rounded-2xl p-6 text-left mb-8">
                    <h3 class="text-sm font-semibold text-slate-700 mb-3">Didn't receive the email?</h3>
                    <ul class="space-y-2 text-sm text-slate-500">
                        <li class="flex items-start gap-2">
                            <svg class="h-4 w-4 mt-0.5 text-slate-400 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                            <span>Check your spam or junk folder</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="h-4 w-4 mt-0.5 text-slate-400 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                            <span>Make sure you entered the correct email address</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="h-4 w-4 mt-0.5 text-slate-400 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                            <span>Wait a few minutes for the email to arrive</span>
                        </li>
                    </ul>
                </div>

                {{-- Resend Verification Email --}}
                <form method="POST" action="{{ route('verification.send') }}" class="mb-3" x-data="{ submitting: false }" @submit="submitting = true">
                    @csrf
                    <button type="submit" :disabled="submitting"
                        class="w-full py-3.5 bg-brand-600 hover:bg-brand-700 text-white font-semibold rounded-xl shadow-lg shadow-brand-600/20 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2">
                        <svg x-show="submitting" class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                        <span x-text="submitting ? 'Sending...' : 'Resend Verification Email'"></span>
                    </button>
                </form>

                {{-- Sign Out --}}
                <form method="POST" action="{{ route('logout') }}" x-data="{ submitting: false }" @submit="submitting = true">
                    @csrf
                    <button type="submit" :disabled="submitting"
                        class="w-full py-3.5 bg-slate-50 hover:bg-slate-100 text-slate-700 font-semibold rounded-xl border border-slate-200 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2">
                        <svg x-show="submitting" class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                        <span x-text="submitting ? 'Signing out...' : 'Sign Out'"></span>
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
