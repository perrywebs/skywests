@extends('layouts.guest2')

@section('title', 'Reset your password')

@section('content')
<div class="flex items-center justify-center min-h-screen p-6 bg-slate-50/50">
    <div class="w-full max-w-md animate-fade-in-up">
        
        <div class="text-center mb-8">
            <a href="/" class="inline-block">
                <img src="{{ asset('storage/app/public/' . $settings->logo) }}" alt="Logo" class="h-10 mx-auto">
            </a>
        </div>

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
                        <i data-lucide="key" class="h-7 w-7 text-brand-600"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-slate-900 font-display">Reset Password</h2>
                    <p class="mt-2 text-sm text-slate-400">Enter your new password below.</p>
                </div>
            </div>

            <div class="px-8 pb-8">
                <form method="POST" action="{{ route('adminpassword.update') }}" x-data="{ submitting: false }" @submit="submitting = true">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token ?? '' }}">

                    <div class="mb-5">
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <i data-lucide="mail" class="w-4 h-4 text-slate-300"></i>
                            </div>
                            <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" readonly
                                class="w-full pl-10 pr-4 py-3 bg-slate-50/80 border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-300 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 focus:bg-white transition-all duration-200 opacity-70 cursor-not-allowed">
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="password" class="block text-sm font-medium text-slate-700 mb-2">New Password</label>
                        <div class="relative" x-data="{ show: false }">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <i data-lucide="lock" class="w-4 h-4 text-slate-300"></i>
                            </div>
                            <input :type="show ? 'text' : 'password'" id="password" name="password" required
                                class="w-full pl-10 pr-11 py-3 bg-slate-50/80 border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-300 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 focus:bg-white transition-all duration-200"
                                placeholder="Enter new password" autofocus>
                            <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-slate-300 hover:text-slate-500 transition-colors">
                                <i data-lucide="eye" class="w-4 h-4" x-show="!show"></i>
                                <i data-lucide="eye-off" class="w-4 h-4" x-show="show" x-cloak></i>
                            </button>
                        </div>
                        @if ($errors->has('password'))
                            <p class="mt-1.5 text-xs text-red-500">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-2">Confirm Password</label>
                        <div class="relative" x-data="{ show: false }">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <i data-lucide="lock" class="w-4 h-4 text-slate-300"></i>
                            </div>
                            <input :type="show ? 'text' : 'password'" id="password_confirmation" name="password_confirmation" required
                                class="w-full pl-10 pr-11 py-3 bg-slate-50/80 border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-300 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 focus:bg-white transition-all duration-200"
                                placeholder="Confirm new password">
                            <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-slate-300 hover:text-slate-500 transition-colors">
                                <i data-lucide="eye" class="w-4 h-4" x-show="!show"></i>
                                <i data-lucide="eye-off" class="w-4 h-4" x-show="show" x-cloak></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" :disabled="submitting"
                        class="w-full py-3.5 px-4 bg-brand-600 hover:bg-brand-700 text-white font-semibold rounded-xl shadow-lg shadow-brand-600/20 hover:shadow-brand-600/35 transition-all duration-300 hover:-translate-y-0.5 flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed">
                        <svg x-show="submitting" class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                        <i x-show="!submitting" data-lucide="refresh-cw" class="w-4 h-4"></i>
                        <span x-text="submitting ? 'Resetting...' : 'Reset Password'"></span>
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-slate-400">Back to <a href="{{ route('adminlogin') }}" class="text-brand-600 hover:text-brand-700 font-medium">login</a></p>
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
