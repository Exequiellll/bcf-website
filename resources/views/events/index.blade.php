@extends('layouts.app')

@section('title', 'Events - BCF Church Fellowship')
@section('meta_description', 'Join us for upcoming events at BCF Church Fellowship. Worship, fellowship, and special gatherings.')

@section('content')
<div class="max-w-4xl mx-auto py-8 sm:py-12 px-4 sm:px-6 lg:px-8 mt-4">
    <div class="text-center mb-8">
        <h1 class="text-3xl sm:text-4xl font-bold text-blue-900 mb-2 logo-text">Events</h1>
        <p class="text-sm text-gray-600">Join us for worship, fellowship, and special gatherings</p>
    </div>
    
    <div class="space-y-6 w-full max-w-3xl mx-auto">
        @if($upcomingEvents->count() > 0)
            <div class="space-y-6">
                @foreach($upcomingEvents as $event)
                    <div class="group bg-white rounded-lg border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden w-full mb-8 last:mb-0">
                        <div class="px-6 py-3 border-b border-gray-900 bg-gray-100">
                            <h2 class="text-xl font-bold text-blue-900">{{ $event->title }}</h2>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-4">
                                    <span class="flex items-center text-sm text-gray-600">
                                        <i class="far fa-calendar-alt mr-1.5 text-blue-600 w-4"></i>
                                        {{ $event->event_date->format('F d, Y') }}
                                    </span>
                                    <span class="flex items-center text-sm text-gray-600">
                                        <i class="far fa-clock mr-1.5 text-blue-600 w-4"></i>
                                        {{ $event->event_date->format('g:i A') }}
                                    </span>
                                    @if($event->location)
                                    <span class="flex items-center text-sm text-gray-600">
                                        <i class="fas fa-map-marker-alt mr-1.5 text-blue-600 w-4"></i>
                                        {{ $event->location }}
                                    </span>
                                    @endif
                                </div>
                                <span class="text-xs text-gray-500">
                                    {{ $event->event_date->diffForHumans() }}
                                </span>
                            </div>
                            @if($event->description)
                            <div class="prose max-w-none text-gray-600 mb-4">
                                {{ Str::limit(strip_tags($event->description), 200) }}
                            </div>
                            @endif
                            <a href="{{ route('events.show', $event->id) }}" class="inline-flex items-center text-blue-700 hover:text-blue-800 font-medium text-sm group">
                                View Details
                                <svg class="ml-1 w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        
        @if($pastEvents->count() > 0)
           <div class="text-center">
                <h2 class="text-xl font-bold text-blue-900 mb-2 mt-10">Past Events</h2>
           </div>
            <div class="space-y-6">
                @foreach($pastEvents as $event)
                    <div class="bg-white rounded-lg border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden w-full opacity-80 hover:opacity-100">
                        <div class="px-6 py-3 border-b border-gray-200 bg-gray-100">
                            <h2 class="text-xl font-bold text-blue-900">{{ $event->title }}</h2>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-4">
                                    <span class="flex items-center text-sm text-gray-600">
                                        <i class="far fa-calendar-alt mr-1.5 text-blue-600 w-4"></i>
                                        {{ $event->event_date->format('F d, Y') }}
                                    </span>
                                    <span class="flex items-center text-sm text-gray-600">
                                        <i class="far fa-clock mr-1.5 text-blue-600 w-4"></i>
                                        {{ $event->event_date->format('g:i A') }}
                                    </span>
                                    @if($event->location)
                                    <span class="flex items-center text-sm text-gray-600">
                                        <i class="fas fa-map-marker-alt mr-1.5 text-blue-600 w-4"></i>
                                        {{ $event->location }}
                                    </span>
                                    @endif
                                </div>
                                <span class="text-xs text-gray-500">
                                    {{ $event->event_date->diffForHumans() }}
                                </span>
                            </div>
                            @if($event->description)
                            <div class="prose max-w-none text-gray-600 text-sm mb-4">
                                {{ Str::limit(strip_tags($event->description), 150) }}
                            </div>
                            @endif
                            <a href="{{ route('events.show', $event->id) }}" class="inline-flex items-center text-blue-700 hover:text-blue-800 font-medium text-sm group">
                                View Details
                                <svg class="ml-1 w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        
        @if($upcomingEvents->count() == 0 && $pastEvents->count() == 0)
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 text-center">
                <i class="far fa-calendar-alt text-4xl text-gray-300 mb-3"></i>
                <p class="text-gray-500">No events available at this time.</p>
                <p class="text-sm text-gray-400 mt-1">Please check back later for upcoming events.</p>
            </div>
        @endif
    </div>
</div>
@endsection

