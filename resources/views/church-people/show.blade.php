@extends('layouts.app')

@section('title', $person->name . ' - BCF Church Fellowship')
@section('meta_description', 'Meet ' . $person->name . ($person->position ? ', ' . $person->position : '') . ' at BCF Church Fellowship.')

@section('content')
<div class="max-w-4xl mx-auto py-12 sm:py-16 px-4 sm:px-6 lg:px-8">
    <a href="{{ route('church-people.index') }}" class="inline-flex items-center text-blue-700 hover:text-blue-800 mb-6 font-semibold">
        <svg class="mr-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Back to Our Team
    </a>
    
    <div class="bg-white/95 backdrop-blur-md rounded-2xl shadow-2xl overflow-hidden border border-blue-100">
        <div class="md:flex">
            <div class="md:w-2/5 bg-gradient-to-br from-blue-600 to-blue-800 p-8 md:p-12 flex items-center justify-center min-h-[500px]">
                @if($person->photo)
                    <div class="w-full h-full flex items-center justify-center">
                        <img src="{{ $person->photo }}" alt="{{ $person->name }}" class="max-w-full max-h-full w-auto h-auto object-contain rounded-xl shadow-lg" loading="lazy">
                    </div>
                @else
                    <div class="w-48 h-48 rounded-full bg-white/20 flex items-center justify-center">
                        <span class="text-7xl font-bold text-white">{{ substr($person->name, 0, 1) }}</span>
                    </div>
                @endif
            </div>
            <div class="md:w-3/5 p-8 md:p-12">
                <h1 class="text-4xl font-black text-gray-900 mb-2 logo-text">{{ $person->name }}</h1>
                <p class="text-2xl font-bold text-blue-700 mb-6">{{ $person->role }}</p>
                
                @if($person->bio)
                    <div class="prose max-w-none mb-8">
                        <p class="text-gray-700 leading-relaxed text-lg">{{ $person->bio }}</p>
                    </div>
                @endif
                
                @if($person->email || $person->phone)
                    <div class="bg-blue-50 rounded-lg p-6 mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Contact Information</h3>
                        <div class="space-y-4">
                            @if($person->email)
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                        <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 mb-1">Email</p>
                                        <a href="mailto:{{ $person->email }}" class="text-blue-700 hover:text-blue-800 font-medium text-lg">{{ $person->email }}</a>
                                    </div>
                                </div>
                            @endif
                            @if($person->phone)
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                        <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 mb-1">Phone</p>
                                        <a href="tel:{{ $person->phone }}" class="text-blue-700 hover:text-blue-800 font-medium text-lg">{{ $person->phone }}</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

