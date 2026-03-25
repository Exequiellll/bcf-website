@extends('layouts.app')

@section('title', 'Join Our Church Community')

@push('styles')
<style>
    .bg-auth {
        background: linear-gradient(135deg, rgba(30, 64, 175, 0.95) 0%, rgba(30, 58, 138, 0.95) 100%), url('https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    
    .form-container {
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.95);
        border-radius: 1rem;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    .input-group {
        position: relative;
        margin-bottom: 1.5rem;
    }
    
    .input-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #6b7280;
        transition: all 0.3s ease;
    }
    
    .form-input {
        padding-left: 3rem;
        transition: all 0.3s ease;
        border: 2px solid #e5e7eb;
        border-radius: 0.5rem;
        width: 100%;
        height: 3rem;
    }
    
    .form-input:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
    }
    
    .form-input:focus + .input-icon {
        color: #3b82f6;
    }
    
    .password-strength {
        height: 4px;
        border-radius: 2px;
        margin-top: 0.25rem;
        transition: all 0.3s ease;
    }
    
    .strength-weak { background-color: #ef4444; width: 25%; }
    .strength-fair { background-color: #f59e0b; width: 50%; }
    .strength-good { background-color: #3b82f6; width: 75%; }
    .strength-strong { background-color: #10b981; width: 100%; }
    
    .social-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .social-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    
    .divider {
        display: flex;
        align-items: center;
        text-align: center;
        color: #6b7280;
        margin: 1.5rem 0;
    }
    
    .divider::before,
    .divider::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid #e5e7eb;
    }
    
    .divider:not(:empty)::before {
        margin-right: 1.5rem;
    }
    
    .divider:not(:empty)::after {
        margin-left: 1.5rem;
    }
    
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 1.25rem;
        width: 1.25rem;
        background-color: #fff;
        border: 2px solid #d1d5db;
        border-radius: 0.25rem;
        transition: all 0.2s;
    }
    
    .checkbox-container input:checked ~ .checkmark {
        background-color: #3b82f6;
        border-color: #3b82f6;
    }
    
    .checkmark:after {
        content: '';
        position: absolute;
        display: none;
        left: 0.45rem;
        top: 0.15rem;
        width: 0.3rem;
        height: 0.6rem;
        border: solid white;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
    }
    
    .checkbox-container input:checked ~ .checkmark:after {
        display: block;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .animate-fade-in {
        animation: fadeIn 0.5s ease-out forwards;
    }
</style>
@endpush

@section('content')
<div class="min-h-screen flex">
    <!-- Left Side - Form -->
    <div class="w-full md:w-1/2 flex items-center justify-center p-8">
        <div class="w-full max-w-md form-container p-8">
            <div class="text-center mb-8">
                <a href="{{ url('/') }}" class="inline-block">
                    <img src="{{ asset('images/bcf real logo.png') }}" alt="Church Logo" class="h-16 mx-auto">
                </a>
                <h1 class="text-2xl font-bold text-gray-900 mt-4">Join Our Community</h1>
                <p class="text-gray-600 mt-2">Create your account to get started</p>
            </div>
            <form class="space-y-6" action="{{ route('register') }}" method="POST" id="registrationForm">
                @csrf
                
                <!-- Name -->
                <div class="input-group">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                        Full Name <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="input-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </span>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" required
                            class="form-input focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-300 focus:ring-red-200 @enderror"
                            placeholder="Enter your full name">
                    </div>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="input-group">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        Email Address <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="input-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </span>
                        <input id="email" name="email" type="email" autocomplete="email" value="{{ old('email') }}" required
                            class="form-input focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-300 focus:ring-red-200 @enderror"
                            placeholder="your@email.com">
                    </div>
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone Number -->
                <div class="input-group">
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                        Phone Number <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="input-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </span>
                        <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" required
                            class="form-input pl-12 focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('phone') border-red-300 focus:ring-red-200 @enderror"
                            placeholder="(123) 456-7890">
                    </div>
                    @error('phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="input-group">
                    <div class="flex justify-between items-center">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <span id="password-strength-text" class="text-xs font-medium"></span>
                    </div>
                    <div class="relative">
                        <span class="input-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </span>
                        <div class="relative">
                            <input id="password" name="password" type="password" autocomplete="new-password" required
                                class="form-input focus:ring-2 focus:ring-blue-500 focus:border-transparent pr-10 @error('password') border-red-300 focus:ring-red-200 @enderror"
                                placeholder="Create a password">
                            <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="password-strength mt-2">
                        <div id="password-strength-bar" class="h-1 rounded-full"></div>
                    </div>
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="input-group">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                        Confirm Password <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="input-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </span>
                        <div class="relative">
                            <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required
                                class="form-input focus:ring-2 focus:ring-blue-500 focus:border-transparent pr-10"
                                placeholder="Confirm your password">
                            <button type="button" id="toggleConfirmPassword" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div id="password-match" class="text-xs mt-1 h-4"></div>
                </div>

                <!-- Terms and Conditions -->
                <div class="flex items-start mt-6">
                    <div class="flex items-center h-5">
                        <div class="checkbox-container relative">
                            <input id="terms" name="terms" type="checkbox" required
                                class="opacity-0 absolute h-5 w-5">
                            <span class="checkmark"></span>
                        </div>
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="terms" class="text-gray-700">
                            I agree to the <a href="{{ route('terms') }}" class="text-blue-600 hover:text-blue-500 font-medium">Terms of Service</a> and 
                            <a href="{{ route('privacy') }}" class="text-blue-600 hover:text-blue-500 font-medium">Privacy Policy</a>
                        </label>
                        @error('terms')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-8">
                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:-translate-y-0.5 hover:shadow-md">
                        <span id="button-text">Create Account</span>
                        <svg id="button-spinner" class="hidden -ml-1 mr-3 h-5 w-5 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </button>
                </div>
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Already have an account?
                        <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">
                            Sign in
                        </a>
                    </p>
                </div>
            </form>

            <!-- Social Login -->
            <div class="mt-8">
                <div class="divider">
                    <span class="text-sm bg-white px-2 text-gray-500">Or sign up with</span>
                </div>

                <div class="grid grid-cols-2 gap-3 mt-6">
                    <a href="#" class="social-btn bg-white border border-gray-300 text-gray-700 hover:bg-gray-50">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.507 1.027 5.907 2.347l2.307-2.307C18.747 1.44 16.133 0 12.48 0 5.867 0 .307 5.387.307 12s5.56 12 12.173 12c3.573 0 6.267-1.173 8.373-3.36 2.16-2.16 2.84-5.213 2.84-7.667 0-.76-.053-1.467-.173-2.053H12.48z" clip-rule="evenodd" />
                        </svg>
                        Google
                    </a>
                    <a href="#" class="social-btn bg-[#1877F2] text-white hover:bg-[#166FE5]">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                        </svg>
                        Facebook
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Right Side - Image -->
    <div class="hidden md:flex md:w-1/2 bg-auth items-center justify-center p-12">
        <div class="max-w-lg text-center text-white px-8">
            <h2 class="text-3xl font-bold mb-4">Welcome to Our Community</h2>
            <p class="text-lg mb-8 opacity-90">Join us on a journey of faith, hope, and love. Be part of our growing family and experience the joy of worship together.</p>
            <div class="space-y-4">
                <div class="flex items-center justify-center space-x-3">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Weekly worship services</span>
                </div>
                <div class="flex items-center justify-center space-x-3">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Bible study groups</span>
                </div>
                <div class="flex items-center justify-center space-x-3">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Community events</span>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Password strength indicator
    const passwordInput = document.getElementById('password');
    const passwordStrengthBar = document.getElementById('password-strength-bar');
    const passwordStrengthText = document.getElementById('password-strength-text');
    const passwordMatch = document.getElementById('password-match');
    const confirmPassword = document.getElementById('password_confirmation');
    const form = document.getElementById('registrationForm');
    const submitButton = form.querySelector('button[type="submit"]');
    const buttonText = document.getElementById('button-text');
    const buttonSpinner = document.getElementById('button-spinner');

    // Toggle password visibility
    const togglePassword = document.getElementById('togglePassword');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    
    if (togglePassword) {
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.querySelector('svg').classList.toggle('text-blue-500');
        });
    }
    
    if (toggleConfirmPassword) {
        toggleConfirmPassword.addEventListener('click', function() {
            const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPassword.setAttribute('type', type);
            this.querySelector('svg').classList.toggle('text-blue-500');
        });
    }

    // Check password match
    function checkPasswordMatch() {
        if (confirmPassword.value === '') {
            passwordMatch.textContent = '';
            passwordMatch.className = 'text-xs mt-1 h-4';
            return;
        }
        
        if (passwordInput.value === confirmPassword.value) {
            passwordMatch.textContent = 'Passwords match!';
            passwordMatch.className = 'text-xs mt-1 h-4 text-green-600 font-medium';
        } else {
            passwordMatch.textContent = 'Passwords do not match';
            passwordMatch.className = 'text-xs mt-1 h-4 text-red-600';
        }
    }

    // Password strength checker
    function checkPasswordStrength(password) {
        let strength = 0;
        
        // Length check
        if (password.length >= 8) strength += 1;
        
        // Contains number
        if (/\d/.test(password)) strength += 1;
        
        // Contains special char
        if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) strength += 1;
        
        // Contains both lower and uppercase
        if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength += 1;
        
        return strength;
    }

    // Update password strength indicator
    function updatePasswordStrength() {
        const password = passwordInput.value;
        const strength = checkPasswordStrength(password);
        
        // Update strength bar
        const strengthClasses = [
            'strength-weak',
            'strength-fair',
            'strength-good',
            'strength-strong'
        ];
        
        const strengthTexts = [
            'Very Weak',
            'Weak',
            'Good',
            'Strong'
        ];
        
        const strengthColors = [
            'bg-red-500',
            'bg-yellow-500',
            'bg-blue-500',
            'bg-green-500'
        ];
        
        const index = Math.min(strength - 1, 3);
        
        if (password.length > 0) {
            passwordStrengthBar.className = `h-1 rounded-full transition-all duration-300 ${strengthClasses[index]}`;
            passwordStrengthText.textContent = strengthTexts[index];
            passwordStrengthText.className = `text-xs font-medium ${strength === 4 ? 'text-green-600' : strength >= 2 ? 'text-blue-600' : 'text-red-600'}`;
        } else {
            passwordStrengthBar.className = 'h-1 rounded-full bg-gray-200';
            passwordStrengthText.textContent = '';
        }
    }

    // Add event listeners
    if (passwordInput) {
        passwordInput.addEventListener('input', updatePasswordStrength);
    }
    
    if (confirmPassword) {
        confirmPassword.addEventListener('input', checkPasswordMatch);
    }
    
    // Form submission
    if (form) {
        form.addEventListener('submit', function(e) {
            // Basic client-side validation
            const password = passwordInput.value;
            const confirm = confirmPassword.value;
            
            if (password !== confirm) {
                e.preventDefault();
                passwordMatch.textContent = 'Passwords do not match';
                passwordMatch.className = 'text-xs mt-1 h-4 text-red-600';
                return false;
            }
            
            // Show loading state
            submitButton.disabled = true;
            buttonText.textContent = 'Creating Account...';
            buttonSpinner.classList.remove('hidden');
            
            return true;
        });
    }
    
    // Add animation to form elements
    const formGroups = document.querySelectorAll('.input-group');
    formGroups.forEach((group, index) => {
        group.classList.add('animate-fade-in');
        group.style.animationDelay = `${index * 0.1}s`;
    });
});
</script>
@endpush

<style>
    /* Custom styles for the registration form */
    body {
        background-color: #f9fafb;
    }
    
    /* Smooth transitions for form elements */
    input, select, button {
        transition: all 0.2s ease-in-out;
    }
    
    /* Focus styles */
    input:focus, select:focus {
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
    }
    
    /* Error state */
    .border-red-300:focus {
        box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.2);
    }
    
    /* Button hover effect */
    button[type="submit"]:hover {
        transform: translateY(-1px);
    }
    
    /* Social login buttons */
    .social-login-btn {
        transition: all 0.2s ease-in-out;
    }
    
    .social-login-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
</style>

<script>
    // Add password strength meter
    document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.getElementById('password');
        const passwordStrength = document.createElement('div');
        passwordStrength.className = 'h-1 mt-1 bg-gray-200 rounded-full overflow-hidden';
        passwordStrength.innerHTML = '<div class="h-full w-0 bg-red-500 transition-all duration-300"></div>';
        passwordInput.parentNode.insertBefore(passwordStrength, passwordInput.nextSibling);
        
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            const strengthMeter = this.nextElementSibling.firstElementChild;
            let strength = 0;
            
            // Length check
            if (password.length >= 8) strength += 25;
            
            // Contains number
            if (/\d/.test(password)) strength += 25;
            
            // Contains special char
            if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) strength += 25;
            
            // Contains both lower and uppercase
            if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength += 25;
            
            // Update strength meter
            strengthMeter.style.width = strength + '%';
            
            // Update color based on strength
            if (strength < 50) {
                strengthMeter.className = 'h-full transition-all duration-300 bg-red-500';
            } else if (strength < 75) {
                strengthMeter.className = 'h-full transition-all duration-300 bg-yellow-500';
            } else {
                strengthMeter.className = 'h-full transition-all duration-300 bg-green-500';
            }
        });
        
        // Phone number formatting
        const phoneInput = document.getElementById('phone');
        if (phoneInput) {
            phoneInput.addEventListener('input', function(e) {
                let x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
                e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
            });
        }
    });
</script>
@endsection
