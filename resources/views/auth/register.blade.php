@extends('layouts.guest2')

@section('title', 'Create an Account')
@section('content')

<div class="flex flex-col lg:flex-row min-h-screen">
    <!-- Left Side - Branding (Desktop Only) -->
    <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-brand-600 via-brand-700 to-brand-900 relative overflow-hidden">
        <div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
            <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-white/5 rounded-full floating-slow"></div>
            <div class="absolute bottom-1/3 right-1/4 w-96 h-96 bg-white/5 rounded-full floating"></div>
            <div class="absolute inset-0 auth-grid"></div>
            <div class="absolute inset-0 auth-mesh"></div>
        </div>
        
        <div class="relative flex flex-col justify-center items-center w-full h-full text-white p-12 z-10">
            <a href="/" class="mb-8">
                <img src="{{ asset('storage/app/public/' . $settings->logo) }}" alt="Logo" class="h-16 filter brightness-0 invert opacity-90">
            </a>
            
            <h1 class="text-3xl font-bold mb-4 text-center font-display">Create Your Account</h1>
            
            <p class="text-lg mb-8 max-w-md text-center text-white/70 leading-relaxed">
                Complete the steps below to set up your {{ $settings->site_name }} account.
            </p>
            
            <div class="w-full max-w-md space-y-3">
                <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-xl px-4 py-3">
                    <i data-lucide="user" class="h-5 w-5 text-white/80"></i>
                    <span class="text-sm text-white/80">Registration information</span>
                </div>
                <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-xl px-4 py-3">
                    <i data-lucide="mail" class="h-5 w-5 text-white/80"></i>
                    <span class="text-sm text-white/80">Contact details</span>
                </div>
                <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-xl px-4 py-3">
                    <i data-lucide="settings" class="h-5 w-5 text-white/80"></i>
                    <span class="text-sm text-white/80">Account setup</span>
                </div>
                <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-xl px-4 py-3">
                    <i data-lucide="shield" class="h-5 w-5 text-white/80"></i>
                    <span class="text-sm text-white/80">Security</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side - Registration Form -->
    <div class="w-full lg:w-1/2 flex flex-col justify-center items-center p-6 lg:p-12 bg-white lg:bg-slate-50/50">
        <div class="w-full max-w-xl">
            <!-- Mobile Logo -->
            <div class="lg:hidden text-center mb-6">
                <a href="/">
                    <img src="{{ asset('storage/app/public/' . $settings->logo) }}" alt="Logo" class="h-10 mx-auto">
                </a>
            </div>
            
            <!-- Alerts -->
            @if (Session::has('status'))
                <div class="flex items-start gap-3 p-4 mb-6 bg-red-50 border border-red-100 rounded-xl" role="alert">
                    <i data-lucide="alert-circle" class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5"></i>
                    <p class="text-sm text-red-600">{{ session('status') }}</p>
                </div>
            @endif
            
            @if ($errors->any())
                <div class="flex items-start gap-3 p-4 mb-6 bg-red-50 border border-red-100 rounded-xl" role="alert">
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
                    middlename: '{{ old('middlename') }}',
                    lastname: '{{ old('lastname') }}',
                    username: '{{ old('username') }}',
                    email: '{{ old('email') }}',
                    phone: '{{ old('phone') }}',
                    country: '{{ old('country') }}',
                    accounttype: '{{ old('accounttype') }}',
                    pin: '',
                    password: '',
                    password_confirmation: '',
                    terms: false
                },
                errors: {},
                nextStep() {
                    this.errors = {};
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
                    let valid = true;
                    if (this.step === 1) {
                        if (!this.formData.name.trim()) { this.errors.name = 'First name is required'; valid = false; }
                        if (!this.formData.lastname.trim()) { this.errors.lastname = 'Last name is required'; valid = false; }
                        if (!this.formData.username.trim()) { this.errors.username = 'Username is required'; valid = false; }
                        else if (!/^[a-zA-Z0-9_]+$/.test(this.formData.username)) { this.errors.username = 'Username may only contain letters, numbers, and underscores'; valid = false; }
                    } else if (this.step === 2) {
                        if (!this.formData.email.trim()) { this.errors.email = 'Email is required'; valid = false; }
                        else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.formData.email)) { this.errors.email = 'Please enter a valid email address'; valid = false; }
                        if (!this.formData.phone.trim()) { this.errors.phone = 'Phone number is required'; valid = false; }
                        if (!this.formData.country) { this.errors.country = 'Please select your country'; valid = false; }
                    } else if (this.step === 3) {
                        if (!this.formData.accounttype) { this.errors.accounttype = 'Please select an account type'; valid = false; }
                        if (!this.formData.pin) { this.errors.pin = 'Transaction PIN is required'; valid = false; }
                        else if (!/^\d{4}$/.test(this.formData.pin)) { this.errors.pin = 'PIN must be exactly 4 digits'; valid = false; }
                    } else if (this.step === 4) {
                        if (!this.formData.password) { this.errors.password = 'Password is required'; valid = false; }
                        else if (this.formData.password.length < 8) { this.errors.password = 'Password must be at least 8 characters'; valid = false; }
                        if (this.formData.password !== this.formData.password_confirmation) { this.errors.password_confirmation = 'Passwords do not match'; valid = false; }
                        if (!this.formData.terms) { this.errors.terms = 'You must agree to the terms'; valid = false; }
                    }
                    return valid;
                },
                get progress() {
                    return (this.step / this.totalSteps) * 100;
                }
            }" class="bg-white rounded-2xl shadow-xl shadow-slate-900/5 border border-slate-100 overflow-hidden">
                <!-- Progress Header -->
                <div class="bg-slate-50/80 px-6 sm:px-8 py-5 border-b border-slate-100">
                    <div class="flex justify-between items-center mb-3">
                        <h2 class="text-xl sm:text-2xl font-bold text-slate-900 font-display">Create Your Account</h2>
                        <span class="text-sm font-medium text-slate-400">Step <span x-text="step" class="text-brand-600"></span> of <span x-text="totalSteps"></span></span>
                    </div>
                    
                    <!-- Progress Bar -->
                    <div class="h-1.5 w-full bg-slate-200 rounded-full overflow-hidden" role="progressbar" :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100">
                        <div class="h-full bg-brand-600 rounded-full transition-all duration-500 ease-in-out" :style="'width: ' + progress + '%'"></div>
                    </div>
                    
                    <!-- Step Titles -->
                    <div class="flex justify-between mt-3 text-xs text-slate-400">
                        <div class="text-center" :class="{ 'text-brand-600 font-semibold': step >= 1 }">Personal</div>
                        <div class="text-center" :class="{ 'text-brand-600 font-semibold': step >= 2 }">Contact</div>
                        <div class="text-center" :class="{ 'text-brand-600 font-semibold': step >= 3 }">Account</div>
                        <div class="text-center" :class="{ 'text-brand-600 font-semibold': step >= 4 }">Security</div>
                    </div>
                </div>
                
                <!-- Form Container -->
                <div class="px-6 sm:px-8 py-6">
                    <form action="{{ route('register') }}" method="post" id="registration-form" @submit.prevent="if(step === totalSteps && !submitting) { submitting = true; $el.submit(); }">
                        @csrf
                        
                        <!-- Step 1: Personal Information -->
                        <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                            <div class="text-center mb-6">
                                <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-brand-50 mb-3">
                                    <i data-lucide="user" class="h-6 w-6 text-brand-600"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-slate-900">Personal Information</h3>
                                <p class="mt-1 text-sm text-slate-500">Enter your name and choose a username</p>
                            </div>
                            
                            <div class="space-y-4">
                                <!-- First Name -->
                                <div>
                                    <label for="name" class="block text-sm font-medium text-slate-700 mb-1.5">First Name <span class="text-red-500">*</span></label>
                                    <input 
                                        type="text" 
                                        id="name" 
                                        name="name" 
                                        x-model="formData.name"
                                        class="w-full px-4 py-2.5 border rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all duration-200" 
                                        :class="errors.name ? 'border-red-300 bg-red-50/50' : 'border-slate-200 bg-white'"
                                        placeholder="Enter your first name"
                                        autocomplete="given-name"
                                        required>
                                    <p x-show="errors.name" x-text="errors.name" class="mt-1 text-xs text-red-500"></p>
                                    @if ($errors->has('name'))
                                        <p class="mt-1 text-xs text-red-500">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                
                                <!-- Middle Name -->
                                <div>
                                    <label for="middlename" class="block text-sm font-medium text-slate-700 mb-1.5">Middle Name</label>
                                    <input 
                                        type="text" 
                                        id="middlename" 
                                        name="middlename" 
                                        x-model="formData.middlename"
                                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 bg-white transition-all duration-200" 
                                        placeholder="Enter your middle name"
                                        autocomplete="additional-name">
                                </div>
                                
                                <!-- Last Name -->
                                <div>
                                    <label for="lastname" class="block text-sm font-medium text-slate-700 mb-1.5">Last Name <span class="text-red-500">*</span></label>
                                    <input 
                                        type="text" 
                                        id="lastname" 
                                        name="lastname" 
                                        x-model="formData.lastname"
                                        class="w-full px-4 py-2.5 border rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all duration-200"
                                        :class="errors.lastname ? 'border-red-300 bg-red-50/50' : 'border-slate-200 bg-white'"
                                        placeholder="Enter your last name"
                                        autocomplete="family-name"
                                        required>
                                    <p x-show="errors.lastname" x-text="errors.lastname" class="mt-1 text-xs text-red-500"></p>
                                    @if ($errors->has('lastname'))
                                        <p class="mt-1 text-xs text-red-500">{{ $errors->first('lastname') }}</p>
                                    @endif
                                </div>
                                
                                <!-- Username -->
                                <div>
                                    <label for="username" class="block text-sm font-medium text-slate-700 mb-1.5">Username <span class="text-red-500">*</span></label>
                                    <input 
                                        type="text" 
                                        id="username" 
                                        name="username" 
                                        x-model="formData.username"
                                        class="w-full px-4 py-2.5 border rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all duration-200"
                                        :class="errors.username ? 'border-red-300 bg-red-50/50' : 'border-slate-200 bg-white'"
                                        placeholder="Choose a username"
                                        autocomplete="username"
                                        required>
                                    <p x-show="errors.username" x-text="errors.username" class="mt-1 text-xs text-red-500"></p>
                                    @if ($errors->has('username'))
                                        <p class="mt-1 text-xs text-red-500">{{ $errors->first('username') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <!-- Step 2: Contact Information -->
                        <div x-show="step === 2" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                            <div class="text-center mb-6">
                                <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-brand-50 mb-3">
                                    <i data-lucide="mail" class="h-6 w-6 text-brand-600"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-slate-900">Contact Information</h3>
                                <p class="mt-1 text-sm text-slate-500">Your contact details for account communication</p>
                            </div>
                            
                            <div class="space-y-4">
                                <!-- Email -->
                                <div>
                                    <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">Email Address <span class="text-red-500">*</span></label>
                                    <input 
                                        type="email" 
                                        id="email" 
                                        name="email" 
                                        x-model="formData.email"
                                        class="w-full px-4 py-2.5 border rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all duration-200"
                                        :class="errors.email ? 'border-red-300 bg-red-50/50' : 'border-slate-200 bg-white'"
                                        placeholder="you@example.com"
                                        autocomplete="email"
                                        required>
                                    <p x-show="errors.email" x-text="errors.email" class="mt-1 text-xs text-red-500"></p>
                                    @if ($errors->has('email'))
                                        <p class="mt-1 text-xs text-red-500">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                
                                <!-- Phone -->
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-slate-700 mb-1.5">Phone Number <span class="text-red-500">*</span></label>
                                    <input 
                                        type="tel" 
                                        id="phone" 
                                        name="phone" 
                                        x-model="formData.phone"
                                        class="w-full px-4 py-2.5 border rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all duration-200"
                                        :class="errors.phone ? 'border-red-300 bg-red-50/50' : 'border-slate-200 bg-white'"
                                        placeholder="+1 (234) 567-8901"
                                        autocomplete="tel"
                                        required>
                                    <p x-show="errors.phone" x-text="errors.phone" class="mt-1 text-xs text-red-500"></p>
                                    @if ($errors->has('phone'))
                                        <p class="mt-1 text-xs text-red-500">{{ $errors->first('phone') }}</p>
                                    @endif
                                </div>
                                
                                <!-- Country -->
                                <div>
                                    <label for="country" class="block text-sm font-medium text-slate-700 mb-1.5">Country <span class="text-red-500">*</span></label>
                                    <select 
                                        id="country" 
                                        name="country" 
                                        x-model="formData.country"
                                        class="w-full px-4 py-2.5 border rounded-lg text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 bg-white transition-all duration-200"
                                        :class="errors.country ? 'border-red-300 bg-red-50/50' : 'border-slate-200'"
                                        autocomplete="country"
                                        required>
                                        <option value="" disabled>Select your country</option>
                                        @include('auth.countries')
                                    </select>
                                    <p x-show="errors.country" x-text="errors.country" class="mt-1 text-xs text-red-500"></p>
                                    @if ($errors->has('country'))
                                        <p class="mt-1 text-xs text-red-500">{{ $errors->first('country') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <!-- Step 3: Account Setup -->
                        <div x-show="step === 3" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                            <div class="text-center mb-6">
                                <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-brand-50 mb-3">
                                    <i data-lucide="settings" class="h-6 w-6 text-brand-600"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-slate-900">Account Setup</h3>
                                <p class="mt-1 text-sm text-slate-500">Choose your account type and set a transaction PIN</p>
                            </div>
                            
                            <div class="space-y-4">
                                <!-- Account Type -->
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Account Type <span class="text-red-500">*</span></label>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                        <label class="relative block cursor-pointer">
                                            <input type="radio" name="accounttype" value="Personal Account" x-model="formData.accounttype" class="sr-only">
                                            <div class="border rounded-lg p-3 transition-all duration-200" :class="formData.accounttype === 'Personal Account' ? 'border-brand-500 bg-brand-50/50 ring-2 ring-brand-500/20' : 'border-slate-200 hover:border-slate-300 bg-white'">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-9 h-9 rounded-lg bg-brand-50 flex items-center justify-center">
                                                        <i data-lucide="user" class="h-4 w-4 text-brand-600"></i>
                                                    </div>
                                                    <div>
                                                        <h4 class="text-sm font-medium text-slate-900">Personal Account</h4>
                                                        <p class="text-xs text-slate-400">For individual use</p>
                                                    </div>
                                                </div>
                                                <div x-show="formData.accounttype === 'Personal Account'" class="absolute top-2 right-2 w-5 h-5 bg-brand-500 rounded-full flex items-center justify-center">
                                                    <i data-lucide="check" class="h-3 w-3 text-white"></i>
                                                </div>
                                            </div>
                                        </label>
                                        
                                        <label class="relative block cursor-pointer">
                                            <input type="radio" name="accounttype" value="Business Account" x-model="formData.accounttype" class="sr-only">
                                            <div class="border rounded-lg p-3 transition-all duration-200" :class="formData.accounttype === 'Business Account' ? 'border-brand-500 bg-brand-50/50 ring-2 ring-brand-500/20' : 'border-slate-200 hover:border-slate-300 bg-white'">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-9 h-9 rounded-lg bg-brand-50 flex items-center justify-center">
                                                        <i data-lucide="briefcase" class="h-4 w-4 text-brand-600"></i>
                                                    </div>
                                                    <div>
                                                        <h4 class="text-sm font-medium text-slate-900">Business Account</h4>
                                                        <p class="text-xs text-slate-400">For business use</p>
                                                    </div>
                                                </div>
                                                <div x-show="formData.accounttype === 'Business Account'" class="absolute top-2 right-2 w-5 h-5 bg-brand-500 rounded-full flex items-center justify-center">
                                                    <i data-lucide="check" class="h-3 w-3 text-white"></i>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <p x-show="errors.accounttype" x-text="errors.accounttype" class="mt-1 text-xs text-red-500"></p>
                                    @if ($errors->has('accounttype'))
                                        <p class="mt-1 text-xs text-red-500">{{ $errors->first('accounttype') }}</p>
                                    @endif
                                </div>
                                
                                <!-- Transaction PIN -->
                                <div>
                                    <label for="pin" class="block text-sm font-medium text-slate-700 mb-1.5">Transaction PIN (4 digits) <span class="text-red-500">*</span></label>
                                    <div class="relative" x-data="{ showPin: false }">
                                        <input 
                                            :type="showPin ? 'text' : 'password'" 
                                            id="pin" 
                                            name="pin" 
                                            x-model="formData.pin"
                                            class="w-full px-4 py-2.5 pr-11 border rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all duration-200"
                                            :class="errors.pin ? 'border-red-300 bg-red-50/50' : 'border-slate-200 bg-white'"
                                            placeholder="Enter 4-digit PIN"
                                            maxlength="4"
                                            pattern="[0-9]{4}"
                                            inputmode="numeric"
                                            autocomplete="one-time-code"
                                            required>
                                        <button 
                                            type="button"
                                            @click="showPin = !showPin"
                                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 hover:text-slate-600 transition-colors">
                                            <i data-lucide="eye" class="h-4 w-4" x-show="!showPin"></i>
                                            <i data-lucide="eye-off" class="h-4 w-4" x-show="showPin" x-cloak></i>
                                        </button>
                                    </div>
                                    <p class="mt-1 text-xs text-slate-400">Required to authorize transactions</p>
                                    <p x-show="errors.pin" x-text="errors.pin" class="mt-1 text-xs text-red-500"></p>
                                    @if ($errors->has('pin'))
                                        <p class="mt-1 text-xs text-red-500">{{ $errors->first('pin') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <!-- Step 4: Security -->
                        <div x-show="step === 4" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                            <div class="text-center mb-6">
                                <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-brand-50 mb-3">
                                    <i data-lucide="shield" class="h-6 w-6 text-brand-600"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-slate-900">Secure Your Account</h3>
                                <p class="mt-1 text-sm text-slate-500">Create a password to protect your account</p>
                            </div>
                            
                            <div class="space-y-4">
                                <!-- Password -->
                                <div x-data="{ showPassword: false }">
                                    <label for="password" class="block text-sm font-medium text-slate-700 mb-1.5">Password <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <input 
                                            :type="showPassword ? 'text' : 'password'" 
                                            id="password" 
                                            name="password" 
                                            x-model="formData.password"
                                            class="w-full px-4 py-2.5 pr-11 border rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all duration-200"
                                            :class="errors.password ? 'border-red-300 bg-red-50/50' : 'border-slate-200 bg-white'"
                                            placeholder="Create a strong password"
                                            autocomplete="new-password"
                                            required>
                                        <button 
                                            type="button"
                                            @click="showPassword = !showPassword"
                                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 hover:text-slate-600 transition-colors">
                                            <i data-lucide="eye" class="h-4 w-4" x-show="!showPassword"></i>
                                            <i data-lucide="eye-off" class="h-4 w-4" x-show="showPassword" x-cloak></i>
                                        </button>
                                    </div>
                                    <p x-show="errors.password" x-text="errors.password" class="mt-1 text-xs text-red-500"></p>
                                    @if ($errors->has('password'))
                                        <p class="mt-1 text-xs text-red-500">{{ $errors->first('password') }}</p>
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
                                                One uppercase letter
                                            </li>
                                            <li class="flex items-center" :class="{ 'text-green-500': /[0-9]/.test(formData.password) }">
                                                <i data-lucide="check-circle" class="h-3 w-3 mr-1" x-show="/[0-9]/.test(formData.password)"></i>
                                                <i data-lucide="circle" class="h-3 w-3 mr-1" x-show="!/[0-9]/.test(formData.password)"></i>
                                                One number
                                            </li>
                                            <li class="flex items-center" :class="{ 'text-green-500': /[^A-Za-z0-9]/.test(formData.password) }">
                                                <i data-lucide="check-circle" class="h-3 w-3 mr-1" x-show="/[^A-Za-z0-9]/.test(formData.password)"></i>
                                                <i data-lucide="circle" class="h-3 w-3 mr-1" x-show="!/[^A-Za-z0-9]/.test(formData.password)"></i>
                                                One special character
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <!-- Confirm Password -->
                                <div x-data="{ showPassword: false }">
                                    <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-1.5">Confirm Password <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <input 
                                            :type="showPassword ? 'text' : 'password'" 
                                            id="password_confirmation" 
                                            name="password_confirmation" 
                                            x-model="formData.password_confirmation"
                                            class="w-full px-4 py-2.5 pr-11 border rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all duration-200"
                                            :class="errors.password_confirmation ? 'border-red-300 bg-red-50/50' : 'border-slate-200 bg-white'"
                                            placeholder="Confirm your password"
                                            autocomplete="new-password"
                                            required>
                                        <button 
                                            type="button"
                                            @click="showPassword = !showPassword"
                                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 hover:text-slate-600 transition-colors">
                                            <i data-lucide="eye" class="h-4 w-4" x-show="!showPassword"></i>
                                            <i data-lucide="eye-off" class="h-4 w-4" x-show="showPassword" x-cloak></i>
                                        </button>
                                    </div>
                                    <p 
                                        class="mt-1 text-xs" 
                                        x-show="formData.password && formData.password_confirmation"
                                        :class="formData.password === formData.password_confirmation ? 'text-green-500' : 'text-red-500'">
                                        <span x-show="formData.password === formData.password_confirmation">Passwords match</span>
                                        <span x-show="formData.password !== formData.password_confirmation">Passwords do not match</span>
                                    </p>
                                    <p x-show="errors.password_confirmation" x-text="errors.password_confirmation" class="mt-1 text-xs text-red-500"></p>
                                </div>
                                
                                <!-- Terms and Conditions -->
                                <div>
                                    <label class="flex items-start gap-2.5 cursor-pointer">
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
                                    <p x-show="errors.terms" x-text="errors.terms" class="mt-1 text-xs text-red-500"></p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Step Navigation -->
                        <div class="flex justify-between pt-6 border-t border-slate-100 mt-6">
                            <button 
                                type="button" 
                                x-show="step > 1" 
                                @click="prevStep"
                                class="inline-flex items-center px-4 py-2 border border-slate-200 rounded-lg font-medium text-slate-600 bg-white hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-500 transition-all duration-200">
                                <i data-lucide="arrow-left" class="h-4 w-4 mr-1.5"></i>
                                Previous
                            </button>
                            <div x-show="step === 1"></div>
                            
                            <button 
                                type="button" 
                                x-show="step < totalSteps" 
                                @click="nextStep"
                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg font-medium text-white bg-brand-600 hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-500 transition-all duration-200">
                                Next
                                <i data-lucide="arrow-right" class="h-4 w-4 ml-1.5"></i>
                            </button>
                            
                            <button 
                                type="submit" 
                                x-show="step === totalSteps"
                                :disabled="submitting"
                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg font-medium text-white bg-brand-600 hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-500 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed">
                                <svg x-show="submitting" class="animate-spin h-4 w-4 mr-1.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                                <i x-show="!submitting" data-lucide="check" class="h-4 w-4 mr-1.5"></i>
                                <span x-text="submitting ? 'Creating Account...' : 'Create Account'"></span>
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Login Link -->
                <div class="text-center px-6 sm:px-8 pb-6">
                    <p class="text-sm text-slate-500">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="text-brand-600 hover:text-brand-700 font-semibold">
                            Sign in
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
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
        
        var usernameInput = document.getElementById('username');
        if (usernameInput) {
            usernameInput.addEventListener('keypress', function(event) {
                if (event.keyCode === 32) {
                    event.preventDefault();
                    return false;
                }
            });
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