@extends('layouts.app')

@section('title', 'Our Team - BCF Church Fellowship')
@section('meta_description', 'Meet the pastors, leaders, and team behind BCF Church Fellowship. Get to know the people who serve our community.')

@section('content')
<!-- Hero Section -->
<div class="relative overflow-hidden bg-gradient-to-br from-blue-50 via-white to-blue-50 py-16 mt-8 text-sm">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-0 left-0 w-96 h-96 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl sm:text-5xl font-bold mb-4 text-blue-900 logo-text">Our Team</h1>
        <p class="text-sm text-gray-700 max-w-2xl mx-auto">Meet the amazing people who serve and lead our church community</p>
    </div>
</div>

<div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8 text-sm">
    @if($featured->count() > 0)
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-blue-900 mb-8 text-center logo-text">Featured</h2>
            <div class="flex flex-wrap justify-center gap-8">
                @foreach($featured as $person)
                    <a href="{{ route('church-people.show', $person->id) }}" class="w-full sm:w-80 lg:w-96 bg-white/95 backdrop-blur-md rounded-xl shadow-lg overflow-hidden transform hover:shadow-xl transition-all duration-300 border border-blue-100 cursor-pointer block group">
                        @if($person->photo)
                            <div class="h-64 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                <img src="{{ $person->photo }}" alt="{{ $person->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" loading="lazy">
                            </div>
                        @else
                            <div class="h-64 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                <div class="w-32 h-32 rounded-full bg-white/20 flex items-center justify-center">
                                    <span class="text-5xl font-bold text-white">{{ substr($person->name, 0, 1) }}</span>
                                </div>
                            </div>
                        @endif
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2 group-hover:text-blue-700 transition-colors">{{ $person->name }}</h3>
                            <p class="text-blue-700 font-semibold mb-4">{{ $person->role }}</p>
                            @if($person->bio)
                                <p class="text-gray-600 text-sm line-clamp-3">{{ $person->bio }}</p>
                            @endif
                            <div class="mt-4 inline-flex items-center text-blue-700 group-hover:text-blue-800 font-semibold text-sm">
                                Learn more
                                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    @if($foundingPastors->count() > 0)
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-blue-900 mb-8 text-center logo-text">Founding Pastor</h2>
            <div class="flex flex-wrap justify-center gap-8">
                @foreach($foundingPastors as $person)
                    <a href="{{ route('church-people.show', $person->id) }}" class="w-full sm:w-80 lg:w-96 bg-white/95 backdrop-blur-md rounded-xl shadow-lg overflow-hidden transform hover:shadow-xl transition-all duration-300 border border-blue-100 cursor-pointer block group">
                        @if($person->photo)
                            <div class="h-64 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                <img src="{{ $person->photo }}" alt="{{ $person->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" loading="lazy">
                            </div>
                        @else
                            <div class="h-64 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                <div class="w-32 h-32 rounded-full bg-white/20 flex items-center justify-center">
                                    <span class="text-5xl font-bold text-white">{{ substr($person->name, 0, 1) }}</span>
                                </div>
                            </div>
                        @endif
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2 group-hover:text-blue-700 transition-colors">{{ $person->name }}</h3>
                            <p class="text-blue-700 font-semibold mb-4">{{ $person->role }}</p>
                            @if($person->bio)
                                <p class="text-gray-600 text-sm line-clamp-3">{{ $person->bio }}</p>
                            @endif
                            <div class="mt-4 inline-flex items-center text-blue-700 group-hover:text-blue-800 font-semibold text-sm">
                                Learn more
                                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    @if($pastors->count() > 0)
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-blue-900 mb-8 text-center logo-text">Pastors</h2>
            <div class="flex flex-wrap justify-center gap-6">
                @foreach($pastors as $person)
                    <a href="{{ route('church-people.show', $person->id) }}" class="w-full sm:w-64 lg:w-72 bg-white/95 backdrop-blur-md rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-all duration-300 border border-blue-100 cursor-pointer block group">
                        @if($person->photo)
                            <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600">
                                <img src="{{ $person->photo }}" alt="{{ $person->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" loading="lazy">
                            </div>
                        @else
                            <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                <div class="w-24 h-24 rounded-full bg-white/20 flex items-center justify-center">
                                    <span class="text-4xl font-bold text-white">{{ substr($person->name, 0, 1) }}</span>
                                </div>
                            </div>
                        @endif
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-gray-900 mb-1 group-hover:text-blue-700 transition-colors">{{ $person->name }}</h3>
                            <p class="text-blue-700 font-semibold text-sm">{{ $person->role }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    @if($singers->count() > 0)
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-blue-900 mb-8 text-center logo-text">Worship Team</h2>
            <div class="flex flex-wrap justify-center gap-6">
                @foreach($singers as $person)
                    <a href="{{ route('church-people.show', $person->id) }}" class="w-full sm:w-64 lg:w-72 bg-white/95 backdrop-blur-md rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-all duration-300 border border-blue-100 cursor-pointer block group">
                        @if($person->photo)
                            <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600">
                                <img src="{{ $person->photo }}" alt="{{ $person->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" loading="lazy">
                            </div>
                        @else
                            <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                <div class="w-24 h-24 rounded-full bg-white/20 flex items-center justify-center">
                                    <span class="text-4xl font-bold text-white">{{ substr($person->name, 0, 1) }}</span>
                                </div>
                            </div>
                        @endif
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-gray-900 mb-1 group-hover:text-blue-700 transition-colors">{{ $person->name }}</h3>
                            <p class="text-blue-700 font-semibold text-sm">{{ $person->role }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    @if($bandMembers->count() > 0)
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-blue-900 mb-8 text-center logo-text">Band</h2>
            <div class="flex flex-wrap justify-center gap-6">
                @foreach($bandMembers as $person)
                    <a href="{{ route('church-people.show', $person->id) }}" class="w-full sm:w-64 lg:w-72 bg-white/95 backdrop-blur-md rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-all duration-300 border border-blue-100 cursor-pointer block group">
                        @if($person->photo)
                            <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600">
                                <img src="{{ $person->photo }}" alt="{{ $person->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" loading="lazy">
                            </div>
                        @else
                            <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                <div class="w-24 h-24 rounded-full bg-white/20 flex items-center justify-center">
                                    <span class="text-4xl font-bold text-white">{{ substr($person->name, 0, 1) }}</span>
                                </div>
                            </div>
                        @endif
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-gray-900 mb-1 group-hover:text-blue-700 transition-colors">{{ $person->name }}</h3>
                            <p class="text-blue-700 font-semibold text-sm">{{ $person->role }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    @if($leaders->count() > 0)
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-blue-900 mb-8 text-center logo-text">Leaders</h2>
            <div class="flex flex-wrap justify-center gap-6">
                @foreach($leaders as $person)
                    <a href="{{ route('church-people.show', $person->id) }}" class="w-full sm:w-64 lg:w-72 bg-white/95 backdrop-blur-md rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-all duration-300 border border-blue-100 cursor-pointer block group">
                        @if($person->photo)
                            <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600">
                                <img src="{{ $person->photo }}" alt="{{ $person->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" loading="lazy">
                            </div>
                        @else
                            <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                <div class="w-24 h-24 rounded-full bg-white/20 flex items-center justify-center">
                                    <span class="text-4xl font-bold text-white">{{ substr($person->name, 0, 1) }}</span>
                                </div>
                            </div>
                        @endif
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-gray-900 mb-1 group-hover:text-blue-700 transition-colors">{{ $person->name }}</h3>
                            <p class="text-blue-700 font-semibold text-sm">{{ $person->role }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

</div>
@endsection
