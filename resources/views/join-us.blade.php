@extends('layouts.app')

@section('title', 'Registration - BCF Church Fellowship')
@section('meta_description', 'Register to join BCF Church Fellowship. Fill out our simple form and we will get in touch with you.')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
        <div class="p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Join Our Community</h1>
                <p class="mt-2 text-sm text-gray-600">Fill out the form below to join our church community</p>
            </div>

            <form id="joinForm" action="{{ route('community-signup.store') }}" method="POST" class="space-y-6">
                @csrf
                
                @if(session('success'))
                    <div class="rounded-md bg-green-50 p-4 mb-6">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name <span class="text-red-500">*</span></label>
                    <div class="mt-1">
                        <input type="text" name="name" id="name" required 
                               value="{{ old('name') }}"
                               class="appearance-none block w-full px-3 py-2 border {{ $errors->has('name') ? 'border-red-300' : 'border-gray-300' }} rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ "This Name has already been registered" }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number <span class="text-red-500">*</span></label>
                    <div class="mt-1">
                        <input type="tel" name="phone" id="phone" required
                               value="{{ old('phone') }}"
                               class="appearance-none block w-full px-3 py-2 border {{ $errors->has('phone') ? 'border-red-300' : 'border-gray-300' }} rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @else
                            <p class="mt-1 text-xs text-gray-500">Please include country code (e.g., +1 for US)</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <div class="mt-1">
                        <input type="email" name="email" id="email"
                               value="{{ old('email') }}"
                               class="appearance-none block w-full px-3 py-2 border {{ $errors->has('email') ? 'border-red-300' : 'border-gray-300' }} rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @else
                            <p class="mt-1 text-xs text-gray-500">Optional, but recommended for important updates</p>
                        @enderror
                    </div>
                </div>

                <div class="pt 2">
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                        Join Our Community
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('joinForm');
        
        form.addEventListener('submit', function(e) {
            // Simple client-side validation
            const name = document.getElementById('name').value.trim();
            const phone = document.getElementById('phone').value.trim();
            
            if (!name) {
                e.preventDefault();
                alert('Please enter your full name');
                return false;
            }
            
            if (!phone) {
                e.preventDefault();
                alert('Please enter your phone number');
                return false;
            }
        });
    });
</script>
@endpush
@endsection
