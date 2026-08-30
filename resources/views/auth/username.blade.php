@extends('layouts.guest2')
@section('title', 'Create Username')
@section('content')
<div class="flex items-center justify-center min-h-screen p-6 bg-slate-50/50">
    <div class="w-full max-w-md animate-fade-in-up">
        <div class="text-center mb-8">
            <a href="/" class="inline-block"><img src="{{ asset('storage/app/public/' . $settings->logo) }}" alt="Logo" class="h-10 mx-auto"></a>
        </div>
        @if(Session::has('status'))
            <div class="flex items-start gap-3 p-4 mb-6 bg-green-50 border border-green-100 rounded-2xl" role="alert">
                <i data-lucide="check-circle" class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5"></i>
                <p class="text-sm text-green-600">{{ Session::get('status') }}</p>
            </div>
        @endif
        <div class="bg-white rounded-2xl shadow-xl shadow-slate-900/5 border border-slate-100 overflow-hidden">
            <div class="px-8 pt-8 pb-6">
                <div class="text-center mb-4">
                    <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-brand-50 mb-4">
                        <i data-lucide="user" class="h-7 w-7 text-brand-600"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-slate-900 font-display">Choose a Username</h2>
                </div>
            </div>
            <div class="px-8 pb-8">
                <form method="POST" action="{{ route('addusername') }}" x-data="{ submitting: false }" @submit="submitting = true">
                    @csrf
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Username</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"><i data-lucide="user" class="w-4 h-4 text-slate-300"></i></div>
                            <input type="text" class="w-full pl-10 pr-4 py-3 bg-slate-50/80 border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-300 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 focus:bg-white transition-all duration-200" name="username" placeholder="Enter unique username" required>
                        </div>
                        @if ($errors->has('username'))
                            <p class="mt-1.5 text-xs text-red-500">{{ $errors->first('username') }}</p>
                        @endif
                    </div>
                    <button type="submit" :disabled="submitting" class="w-full py-3.5 px-4 bg-brand-600 hover:bg-brand-700 text-white font-semibold rounded-xl shadow-lg shadow-brand-600/20 hover:shadow-brand-600/35 transition-all duration-300 hover:-translate-y-0.5 flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed">
                        <svg x-show="submitting" class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                        <i x-show="!submitting" data-lucide="check" class="w-4 h-4"></i>
                        <span x-text="submitting ? 'Saving...' : 'Complete'"></span>
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
