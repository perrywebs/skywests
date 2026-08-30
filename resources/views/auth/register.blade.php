@extends('layouts.guest2')

@section('title', 'Create an Account')
@section('content')

<div class="flex flex-col lg:flex-row min-h-screen">
    <!-- Left Side - Branding & Illustration (Desktop Only) -->
    <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-brand-600 via-brand-700 to-brand-900 relative overflow-hidden">
        <!-- Decorative shapes -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
            <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-white/5 rounded-full floating-slow"></div>
            <div class="absolute bottom-1/3 right-1/4 w-96 h-96 bg-white/5 rounded-full floating"></div>
            <div class="absolute top-2/3 left-1/3 w-40 h-40 bg-white/5 rounded-full floating-slower"></div>
            <div class="absolute inset-0 auth-grid"></div>
            <div class="absolute inset-0 auth-mesh"></div>
        </div>
        
        <!-- Content -->
        <div class="relative flex flex-col justify-center items-center w-full h-full text-white p-12 z-10">
            <!-- Logo -->
            <a href="/" class="mb-8">
                <img src="{{ asset('storage/app/public/' . $settings->logo) }}" alt="Logo" class="h-16 filter brightness-0 invert opacity-90">
            </a>
            
            <!-- Title -->
            <h1 class="text-4xl font-extrabold mb-5 text-center font-display leading-tight">Start Banking with Us</h1>
            
            <!-- Description -->
            <p class="text-xl mb-10 max-w-md text-center text-white/60 leading-relaxed">
                Create your {{ $settings->site_name }} account in just a few steps and enjoy our full range of banking services.
            </p>
            
            <!-- Benefits -->
            <div class="w-full max-w-md space-y-4">
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0 w-6 h-6 rounded-full bg-white/20 flex items-center justify-center mt-0.5">
                        <i data-lucide="check" class="h-3 w-3"></i>
                    </div>
                    <p class="text-sm text-white/70">
                        <span class="font-medium text-white">Secure Banking Platform</span> - Industry-leading security protocols to keep your funds safe
                    </p>
                </div>
                
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0 w-6 h-6 rounded-full bg-white/20 flex items-center justify-center mt-0.5">
                        <i data-lucide="check" class="h-3 w-3"></i>
                    </div>
                    <p class="text-sm text-white/70">
                        <span class="font-medium text-white">Fast Transfers</span> - Send and receive money quickly to anyone, anywhere
                    </p>
                </div>
                
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0 w-6 h-6 rounded-full bg-white/20 flex items-center justify-center mt-0.5">
                        <i data-lucide="check" class="h-3 w-3"></i>
                    </div>
                    <p class="text-sm text-white/70">
                        <span class="font-medium text-white">24/7 Account Access</span> - Manage your finances anytime, anywhere on any device
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side - Registration Form -->
    <div class="w-full lg:w-1/2 flex flex-col justify-center items-center p-6 lg:p-12 bg-white lg:bg-slate-50/50">
        <div class="w-full max-w-2xl">
            <!-- Mobile Logo -->
            <div class="lg:hidden text-center mb-8">
                <a href="/">
                    <img src="{{ asset('storage/app/public/' . $settings->logo) }}" alt="Logo" class="h-12 mx-auto">
                </a>
            </div>
            
            <!-- Alerts -->
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
            
            <!-- Registration Card -->
            <div x-data="{ 
                step: 1,
                totalSteps: 4,
                submitting: false,
                formData: {
                    name: '{{ old('name') }}',
                    middlename: '',
                    lastname: '',
                    username: '{{ old('username') }}',
                    email: '{{ old('email') }}',
                    phone: '',
                    country: '',
                    accounttype: '',
                    pin: '',
                    password: '',
                    password_confirmation: '',
                    terms: false
                },
                nextStep() {
                    if (this.validateCurrentStep()) {
                        if (this.step < this.totalSteps) {
                            this.step++;
                            window.scrollTo(0, 0);
                        }
                    }
                },
                prevStep() {
                    if (this.step > 1) {
                        this.step--;
                        window.scrollTo(0, 0);
                    }
                },
                validateCurrentStep() {
                    if (this.step === 1) {
                        return this.formData.name && this.formData.lastname && this.formData.username;
                    } else if (this.step === 2) {
                        return this.formData.email && this.formData.phone && this.formData.country;
                    } else if (this.step === 3) {
                        return this.formData.accounttype && this.formData.pin;
                    } else if (this.step === 4) {
                        return this.formData.password && this.formData.password_confirmation && this.formData.terms;
                    }
                    return true;
                },
                get progress() {
                    return (this.step / this.totalSteps) * 100;
                }
            }" class="bg-white rounded-2xl shadow-xl shadow-slate-900/5 border border-slate-100 overflow-hidden">
                <!-- Progress Header -->
                <div class="bg-slate-50/80 px-8 py-6 border-b border-slate-100">
                    <div class="flex justify-between items-center mb-3">
                        <h2 class="text-2xl font-bold text-slate-900 font-display">Create Your Account</h2>
                        <span class="text-sm font-medium text-slate-400">Step <span x-text="step" class="text-brand-600"></span> of <span x-text="totalSteps"></span></span>
                    </div>
                    
                    <!-- Progress Bar -->
                    <div class="h-1.5 w-full bg-slate-200 rounded-full overflow-hidden">
                        <div class="h-full bg-brand-600 rounded-full transition-all duration-500 ease-in-out" :style="'width: ' + progress + '%'"></div>
                    </div>
                    
                    <!-- Step Titles -->
                    <div class="flex justify-between mt-3 text-xs text-slate-400">
                        <div class="text-center" :class="{ 'text-brand-600 font-semibold': step >= 1 }">Personal Info</div>
                        <div class="text-center" :class="{ 'text-brand-600 font-semibold': step >= 2 }">Contact Details</div>
                        <div class="text-center" :class="{ 'text-brand-600 font-semibold': step >= 3 }">Account Setup</div>
                        <div class="text-center" :class="{ 'text-brand-600 font-semibold': step >= 4 }">Security</div>
                    </div>
                </div>
                
                <!-- Form Container -->
                <div class="px-8 py-6">
                    <form action="{{ route('register') }}" method="post" id="registration-form" @submit="submitting = true">
                        @csrf
                        
                        <!-- Step 1: Personal Information -->
                        <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                            <div class="text-center mb-6">
                                <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-brand-50 mb-4">
                                    <i data-lucide="user" class="h-7 w-7 text-brand-600"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-slate-900">Personal Information</h3>
                                <p class="mt-1 text-sm text-slate-400">Please provide your legal name as it appears on official documents</p>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">
                                <!-- First Name -->
                                <div>
                                    <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Legal First Name *</label>
                                    <input 
                                        type="text" 
                                        id="name" 
                                        name="name" 
                                        x-model="formData.name"
                                        class="w-full px-4 py-3 bg-slate-50/80 border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-300 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 focus:bg-white transition-all duration-200" 
                                        placeholder="John"
                                        required>
                                    @if ($errors->has('name'))
                                        <p class="mt-1.5 text-xs text-red-500">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                
                                <!-- Middle Name -->
                                <div>
                                    <label for="middlename" class="block text-sm font-medium text-slate-700 mb-2">Middle Name</label>
                                    <input 
                                        type="text" 
                                        id="middlename" 
                                        name="middlename" 
                                        x-model="formData.middlename"
                                        class="w-full px-4 py-3 bg-slate-50/80 border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-300 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 focus:bg-white transition-all duration-200" 
                                        placeholder="David">
                                </div>
                                
                                <!-- Last Name -->
                                <div>
                                    <label for="lastname" class="block text-sm font-medium text-slate-700 mb-2">Legal Last Name *</label>
                                    <input 
                                        type="text" 
                                        id="lastname" 
                                        name="lastname" 
                                        x-model="formData.lastname"
                                        class="w-full px-4 py-3 bg-slate-50/80 border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-300 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 focus:bg-white transition-all duration-200" 
                                        placeholder="Smith"
                                        required>
                                </div>
                                
                                <!-- Username -->
                                <div>
                                    <label for="username" class="block text-sm font-medium text-slate-700 mb-2">Username *</label>
                                    <input 
                                        type="text" 
                                        id="username" 
                                        name="username" 
                                        x-model="formData.username"
                                        class="w-full px-4 py-3 bg-slate-50/80 border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-300 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 focus:bg-white transition-all duration-200" 
                                        placeholder="johnsmith123"
                                        required>
                                    @if ($errors->has('username'))
                                        <p class="mt-1.5 text-xs text-red-500">{{ $errors->first('username') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <!-- Step 2: Contact Information -->
                        <div x-show="step === 2" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                            <div class="text-center mb-6">
                                <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-brand-50 mb-4">
                                    <i data-lucide="mail" class="h-7 w-7 text-brand-600"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-slate-900">Contact Information</h3>
                                <p class="mt-1 text-sm text-slate-400">We'll use these details to communicate with you about your account</p>
                            </div>
                            
                            <div class="space-y-5 mb-6">
                                <!-- Email -->
                                <div>
                                    <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email Address *</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                            <i data-lucide="mail" class="h-4 w-4 text-slate-300"></i>
                                        </div>
                                        <input 
                                            type="email" 
                                            id="email" 
                                            name="email" 
                                            x-model="formData.email"
                                            class="w-full pl-10 pr-4 py-3 bg-slate-50/80 border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-300 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 focus:bg-white transition-all duration-200" 
                                            placeholder="john.smith@example.com"
                                            required>
                                    </div>
                                    @if ($errors->has('email'))
                                        <p class="mt-1.5 text-xs text-red-500">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                
                                <!-- Phone -->
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-slate-700 mb-2">Phone Number *</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                            <i data-lucide="phone" class="h-4 w-4 text-slate-300"></i>
                                        </div>
                                        <input 
                                            type="tel" 
                                            id="phone" 
                                            name="phone" 
                                            x-model="formData.phone"
                                            class="w-full pl-10 pr-4 py-3 bg-slate-50/80 border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-300 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 focus:bg-white transition-all duration-200" 
                                            placeholder="+1 (234) 567-8901"
                                            required>
                                    </div>
                                    @if ($errors->has('phone'))
                                        <p class="mt-1.5 text-xs text-red-500">{{ $errors->first('phone') }}</p>
                                    @endif
                                </div>
                                
                                <!-- Country -->
                                <div>
                                    <label for="country" class="block text-sm font-medium text-slate-700 mb-2">Country *</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                            <i data-lucide="globe" class="h-4 w-4 text-slate-300"></i>
                                        </div>
                                        <select 
                                            id="country" 
                                            name="country" 
                                            x-model="formData.country"
                                            class="w-full pl-10 pr-4 py-3 bg-slate-50/80 border border-slate-200 rounded-xl text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 focus:bg-white transition-all duration-200 appearance-none"
                                            required>
                                            <option value="" disabled selected>Select your country</option>
                                            @include('auth.countries')
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                            <i data-lucide="chevron-down" class="h-4 w-4 text-slate-300"></i>
                                        </div>
                                    </div>
                                    @if ($errors->has('country'))
                                        <p class="mt-1.5 text-xs text-red-500">{{ $errors->first('country') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <!-- Step 3: Account Setup -->
                        <div x-show="step === 3" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                            <div class="text-center mb-6">
                                <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-brand-50 mb-4">
                                    <i data-lucide="landmark" class="h-7 w-7 text-brand-600"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-slate-900">Account Setup</h3>
                                <p class="mt-1 text-sm text-slate-400">Choose your account type and set up your transaction PIN</p>
                            </div>
                            
                            <div class="space-y-5 mb-6">
                                <!-- Account Type -->
                                <div>
                                    <label for="accounttype" class="block text-sm font-medium text-slate-700 mb-2">Account Type *</label>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                        <label @click="formData.accounttype = 'Checking Account'" class="relative block cursor-pointer">
                                            <input type="radio" name="accounttype" value="Checking Account" x-model="formData.accounttype" class="sr-only">
                                            <div class="border rounded-xl p-4 transition-all duration-200" :class="formData.accounttype === 'Checking Account' ? 'border-brand-500 bg-brand-50/50 ring-2 ring-brand-500/20' : 'border-slate-200 hover:border-slate-300'">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-10 h-10 rounded-xl bg-brand-50 flex items-center justify-center">
                                                        <i data-lucide="credit-card" class="h-5 w-5 text-brand-600"></i>
                                                    </div>
                                                    <div>
                                                        <h4 class="text-sm font-medium text-slate-900">Checking Account</h4>
                                                        <p class="text-xs text-slate-400">For daily transactions</p>
                                                    </div>
                                                </div>
                                                <div x-show="formData.accounttype === 'Checking Account'" class="absolute top-2 right-2 w-5 h-5 bg-brand-500 rounded-full flex items-center justify-center">
                                                    <i data-lucide="check" class="h-3 w-3 text-white"></i>
                                                </div>
                                            </div>
                                        </label>
                                        
                                        <label @click="formData.accounttype = 'Savings Account'" class="relative block cursor-pointer">
                                            <input type="radio" name="accounttype" value="Savings Account" x-model="formData.accounttype" class="sr-only">
                                            <div class="border rounded-xl p-4 transition-all duration-200" :class="formData.accounttype === 'Savings Account' ? 'border-brand-500 bg-brand-50/50 ring-2 ring-brand-500/20' : 'border-slate-200 hover:border-slate-300'">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-10 h-10 rounded-xl bg-brand-50 flex items-center justify-center">
                                                        <i data-lucide="piggy-bank" class="h-5 w-5 text-brand-600"></i>
                                                    </div>
                                                    <div>
                                                        <h4 class="text-sm font-medium text-slate-900">Savings Account</h4>
                                                        <p class="text-xs text-slate-400">Earn interest</p>
                                                    </div>
                                                </div>
                                                <div x-show="formData.accounttype === 'Savings Account'" class="absolute top-2 right-2 w-5 h-5 bg-brand-500 rounded-full flex items-center justify-center">
                                                    <i data-lucide="check" class="h-3 w-3 text-white"></i>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    
                                    <!-- Additional account types -->
                                    <div class="mt-3" x-data="{ open: false }">
                                        <button 
                                            type="button" 
                                            @click="open = !open" 
                                            class="w-full text-left flex items-center justify-between text-sm text-brand-600 hover:text-brand-700 focus:outline-none">
                                            <span>Show more account types</span>
                                            <i data-lucide="chevron-down" class="h-4 w-4 transition-transform duration-200" :class="{'rotate-180': open}"></i>
                                        </button>
                                        
                                        <div x-show="open" x-transition x-cloak class="mt-2 space-y-2">
                                            <template x-for="(type, index) in [
                                                {value: 'Fixed Deposit Account', label: 'Fixed Deposit Account', desc: 'Highest interest rates', icon: 'calendar'},
                                                {value: 'Current Account', label: 'Current Account', desc: 'For business transactions', icon: 'briefcase'},
                                                {value: 'Crypto Currency Account', label: 'Crypto Currency Account', desc: 'Digital currency management', icon: 'bitcoin'},
                                                {value: 'Business Account', label: 'Business Account', desc: 'For small businesses', icon: 'building'},
                                                {value: 'Non Resident Account', label: 'Non Resident Account', desc: 'For international customers', icon: 'globe'},
                                                {value: 'Cooperate Business Account', label: 'Cooperate Business Account', desc: 'For large corporations', icon: 'landmark'},
                                                {value: 'Investment Account', label: 'Investment Account', desc: 'For stocks and securities', icon: 'trending-up'}
                                            ]" :key="index">
                                                <label @click="formData.accounttype = type.value" class="relative block cursor-pointer">
                                                    <input type="radio" name="accounttype" :value="type.value" x-model="formData.accounttype" class="sr-only">
                                                    <div class="border rounded-xl p-3 transition-all duration-200" :class="formData.accounttype === type.value ? 'border-brand-500 bg-brand-50/50 ring-2 ring-brand-500/20' : 'border-slate-200 hover:border-slate-300'">
                                                        <div class="flex items-center gap-3">
                                                            <div class="w-8 h-8 rounded-lg bg-brand-50 flex items-center justify-center">
                                                                <i :data-lucide="type.icon" class="h-4 w-4 text-brand-600"></i>
                                                            </div>
                                                            <div>
                                                                <h4 class="text-sm font-medium text-slate-900" x-text="type.label"></h4>
                                                                <p class="text-xs text-slate-400" x-text="type.desc"></p>
                                                            </div>
                                                        </div>
                                                        <div x-show="formData.accounttype === type.value" class="absolute top-2 right-2 w-5 h-5 bg-brand-500 rounded-full flex items-center justify-center">
                                                            <i data-lucide="check" class="h-3 w-3 text-white"></i>
                                                        </div>
                                                    </div>
                                                </label>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Transaction PIN -->
                                <div>
                                    <label for="pin" class="block text-sm font-medium text-slate-700 mb-2">Transaction PIN (4 digits) *</label>
                                    <div class="relative" x-data="{ showPin: false }">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                            <i data-lucide="key" class="h-4 w-4 text-slate-300"></i>
                                        </div>
                                        <input 
                                            :type="showPin ? 'text' : 'password'" 
                                            id="pin" 
                                            name="pin" 
                                            x-model="formData.pin"
                                            class="w-full pl-10 pr-11 py-3 bg-slate-50/80 border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-300 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 focus:bg-white transition-all duration-200" 
                                            placeholder="••••"
                                            maxlength="4"
                                            pattern="[0-9]{4}"
                                            required>
                                        <button 
                                            type="button"
                                            @click="showPin = !showPin"
                                            class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-slate-300 hover:text-slate-500 transition-colors">
                                            <i data-lucide="eye" class="h-4 w-4" x-show="!showPin"></i>
                                            <i data-lucide="eye-off" class="h-4 w-4" x-show="showPin" x-cloak></i>
                                        </button>
                                    </div>
                                    <p class="mt-1.5 text-xs text-slate-400">Your PIN will be required to authorize transactions</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Step 4: Security -->
                        <div x-show="step === 4" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                            <div class="text-center mb-6">
                                <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-brand-50 mb-4">
                                    <i data-lucide="shield" class="h-7 w-7 text-brand-600"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-slate-900">Secure Your Account</h3>
                                <p class="mt-1 text-sm text-slate-400">Create a strong password to protect your account</p>
                            </div>
                            
                            <div class="space-y-5 mb-6">
                                <!-- Password -->
                                <div x-data="{ showPassword: false }">
                                    <label for="password" class="block text-sm font-medium text-slate-700 mb-2">Password *</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                            <i data-lucide="lock" class="h-4 w-4 text-slate-300"></i>
                                        </div>
                                        <input 
                                            :type="showPassword ? 'text' : 'password'" 
                                            id="password" 
                                            name="password" 
                                            x-model="formData.password"
                                            class="w-full pl-10 pr-11 py-3 bg-slate-50/80 border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-300 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 focus:bg-white transition-all duration-200" 
                                            placeholder="••••••••"
                                            required>
                                        <button 
                                            type="button"
                                            @click="showPassword = !showPassword"
                                            class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-slate-300 hover:text-slate-500 transition-colors">
                                            <i data-lucide="eye" class="h-4 w-4" x-show="!showPassword"></i>
                                            <i data-lucide="eye-off" class="h-4 w-4" x-show="showPassword" x-cloak></i>
                                        </button>
                                    </div>
                                    @if ($errors->has('password'))
                                        <p class="mt-1.5 text-xs text-red-500">{{ $errors->first('password') }}</p>
                                    @endif
                                    
                                    <!-- Password Strength Meter -->
                                    <div class="mt-3" x-data="{ 
                                        get strength() {
                                            let score = 0;
                                            if (formData.password.length > 7) score += 1;
                                            if (formData.password.length > 10) score += 1;
                                            if (/[A-Z]/.test(formData.password)) score += 1;
                                            if (/[0-9]/.test(formData.password)) score += 1;
                                            if (/[^A-Za-z0-9]/.test(formData.password)) score += 1;
                                            return score;
                                        },
                                        get strengthLabel() {
                                            const labels = ['Very Weak', 'Weak', 'Fair', 'Good', 'Strong', 'Very Strong'];
                                            return labels[this.strength] || 'Very Weak';
                                        },
                                        get strengthColor() {
                                            const colors = ['bg-red-500', 'bg-red-500', 'bg-yellow-500', 'bg-yellow-500', 'bg-green-500', 'bg-green-500'];
                                            return colors[this.strength] || 'bg-red-500';
                                        }
                                    }" x-show="formData.password.length > 0">
                                        <div class="flex justify-between items-center mb-1.5">
                                            <p class="text-xs text-slate-400">Password strength: <span x-text="strengthLabel" :class="{
                                                'text-red-500': strength < 2,
                                                'text-yellow-600': strength >= 2 && strength < 4,
                                                'text-green-500': strength >= 4
                                            }"></span></p>
                                        </div>
                                        <div class="w-full h-1.5 bg-slate-200 rounded-full overflow-hidden">
                                            <div 
                                                class="h-full transition-all duration-300 ease-in-out rounded-full" 
                                                :class="strengthColor"
                                                :style="`width: ${(strength / 5) * 100}%`"></div>
                                        </div>
                                        <ul class="mt-2 space-y-1 text-xs text-slate-400">
                                            <li class="flex items-center" :class="{ 'text-green-500': formData.password.length > 7 }">
                                                <i data-lucide="check-circle" class="h-3 w-3 mr-1" x-show="formData.password.length > 7"></i>
                                                <i data-lucide="circle" class="h-3 w-3 mr-1" x-show="formData.password.length <= 7"></i>
                                                At least 8 characters
                                            </li>
                                            <li class="flex items-center" :class="{ 'text-green-500': /[A-Z]/.test(formData.password) }">
                                                <i data-lucide="check-circle" class="h-3 w-3 mr-1" x-show="/[A-Z]/.test(formData.password)"></i>
                                                <i data-lucide="circle" class="h-3 w-3 mr-1" x-show="!/[A-Z]/.test(formData.password)"></i>
                                                At least one uppercase letter
                                            </li>
                                            <li class="flex items-center" :class="{ 'text-green-500': /[0-9]/.test(formData.password) }">
                                                <i data-lucide="check-circle" class="h-3 w-3 mr-1" x-show="/[0-9]/.test(formData.password)"></i>
                                                <i data-lucide="circle" class="h-3 w-3 mr-1" x-show="!/[0-9]/.test(formData.password)"></i>
                                                At least one number
                                            </li>
                                            <li class="flex items-center" :class="{ 'text-green-500': /[^A-Za-z0-9]/.test(formData.password) }">
                                                <i data-lucide="check-circle" class="h-3 w-3 mr-1" x-show="/[^A-Za-z0-9]/.test(formData.password)"></i>
                                                <i data-lucide="circle" class="h-3 w-3 mr-1" x-show="!/[^A-Za-z0-9]/.test(formData.password)"></i>
                                                At least one special character
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <!-- Confirm Password -->
                                <div x-data="{ showPassword: false }">
                                    <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-2">Confirm Password *</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                            <i data-lucide="lock" class="h-4 w-4 text-slate-300"></i>
                                        </div>
                                        <input 
                                            :type="showPassword ? 'text' : 'password'" 
                                            id="password_confirmation" 
                                            name="password_confirmation" 
                                            x-model="formData.password_confirmation"
                                            class="w-full pl-10 pr-11 py-3 bg-slate-50/80 border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-300 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 focus:bg-white transition-all duration-200" 
                                            placeholder="••••••••"
                                            required>
                                        <button 
                                            type="button"
                                            @click="showPassword = !showPassword"
                                            class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-slate-300 hover:text-slate-500 transition-colors">
                                            <i data-lucide="eye" class="h-4 w-4" x-show="!showPassword"></i>
                                            <i data-lucide="eye-off" class="h-4 w-4" x-show="showPassword" x-cloak></i>
                                        </button>
                                    </div>
                                    <p 
                                        class="mt-1.5 text-xs" 
                                        x-show="formData.password && formData.password_confirmation"
                                        :class="formData.password === formData.password_confirmation ? 'text-green-500' : 'text-red-500'">
                                        <span x-show="formData.password === formData.password_confirmation">Passwords match</span>
                                        <span x-show="formData.password !== formData.password_confirmation">Passwords do not match</span>
                                    </p>
                                </div>
                                
                                <!-- Terms and Conditions -->
                                <div>
                                    <label class="flex items-start gap-2.5">
                                        <input 
                                            type="checkbox" 
                                            id="terms" 
                                            name="terms" 
                                            x-model="formData.terms"
                                            class="rounded border-slate-300 text-brand-600 shadow-sm focus:border-brand-300 focus:ring focus:ring-brand-200 focus:ring-opacity-50 mt-0.5" 
                                            required>
                                        <span class="text-sm text-slate-500">
                                            I agree to the <a href="/terms" target="_blank" class="text-brand-600 hover:text-brand-700 underline">Terms of Service</a> and <a href="/privacy" target="_blank" class="text-brand-600 hover:text-brand-700 underline">Privacy Policy</a>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Step Navigation -->
                        <div class="flex justify-between pt-5 border-t border-slate-100">
                            <button 
                                type="button" 
                                x-show="step > 1" 
                                @click="prevStep"
                                class="inline-flex items-center px-5 py-2.5 border border-slate-200 rounded-xl font-medium text-slate-600 bg-white hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-500 transition-all duration-200">
                                <i data-lucide="chevron-left" class="h-4 w-4 mr-1.5"></i>
                                Previous
                            </button>
                            <div x-show="step === 1"></div>
                            
                            <button 
                                type="button" 
                                x-show="step < totalSteps" 
                                @click="nextStep"
                                class="inline-flex items-center px-5 py-2.5 border border-transparent rounded-xl font-medium text-white bg-brand-600 hover:bg-brand-700 shadow-lg shadow-brand-600/20 hover:shadow-brand-600/35 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-500 transition-all duration-200 hover:-translate-y-0.5">
                                Next
                                <i data-lucide="chevron-right" class="h-4 w-4 ml-1.5"></i>
                            </button>
                            
                            <button 
                                type="submit" 
                                x-show="step === totalSteps"
                                :disabled="submitting"
                                class="inline-flex items-center px-5 py-2.5 border border-transparent rounded-xl font-medium text-white bg-brand-600 hover:bg-brand-700 shadow-lg shadow-brand-600/20 hover:shadow-brand-600/35 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-500 transition-all duration-200 hover:-translate-y-0.5 disabled:opacity-50 disabled:cursor-not-allowed">
                                <svg x-show="submitting" class="animate-spin h-4 w-4 mr-1.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                                <i x-show="!submitting" data-lucide="check" class="h-4 w-4 mr-1.5"></i>
                                <span x-text="submitting ? 'Creating Account...' : 'Create Account'"></span>
                            </button>
                        </div>
                        
                        <!-- Hidden form fields -->
                        <input type="hidden" name="name" :value="formData.name">
                        <input type="hidden" name="middlename" :value="formData.middlename">
                        <input type="hidden" name="lastname" :value="formData.lastname">
                        <input type="hidden" name="username" :value="formData.username">
                        <input type="hidden" name="email" :value="formData.email">
                        <input type="hidden" name="phone" :value="formData.phone">
                        <input type="hidden" name="country" :value="formData.country">
                        <input type="hidden" name="accounttype" :value="formData.accounttype">
                        <input type="hidden" name="pin" :value="formData.pin">
                        <input type="hidden" name="password" :value="formData.password">
                        <input type="hidden" name="password_confirmation" :value="formData.password_confirmation">
                    </form>
                </div>
                
                <!-- Login Link -->
                <div class="text-center px-8 pb-6">
                    <p class="text-sm text-slate-500">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="text-brand-600 hover:text-brand-700 font-semibold">
                            Sign in instead
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function restrictSpaces(event) {
        if (event.keyCode === 32) {
            return false;
        }
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
        
        var usernameInput = document.getElementById('username');
        if (usernameInput) {
            usernameInput.addEventListener('keypress', restrictSpaces);
        }
        
        var pinInput = document.getElementById('pin');
        if (pinInput) {
            pinInput.addEventListener('keypress', function(event) {
                var charCode = (event.which) ? event.which : event.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    event.preventDefault();
                    return false;
                }
                return true;
            });
        }
    });
</script>
@endsection
