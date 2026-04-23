@extends('layouts.app')

@section('title', 'Events - BCF Church Fellowship')
@section('meta_description', 'Join us for upcoming events at BCF Church Fellowship. Worship, fellowship, and special gatherings.')

@section('content')
<div class="max-w-4xl mx-auto py-8 sm:py-12 px-4 sm:px-6 lg:px-8 mt-4" x-data="{ tab: 'upcoming' }">
    <div class="text-center mb-8">
        <h1 class="text-3xl sm:text-4xl font-bold text-blue-900 mb-2 logo-text">Events</h1>
        <p class="text-sm text-gray-600">Join us for worship, fellowship, and special gatherings</p>
    </div>

    <div class="w-full max-w-3xl mx-auto">
        <!-- Tabs -->
        <div class="flex border-b border-gray-200 mb-6">
            <button @click="tab = 'upcoming'"
                :class="tab === 'upcoming' ? 'border-blue-600 text-blue-700' : 'border-transparent text-gray-500 hover:text-gray-700'"
                class="px-4 py-2 border-b-2 font-medium text-sm transition-colors">
                Upcoming
                @if($upcomingEvents->count() > 0)
                    <span class="ml-1 bg-blue-100 text-blue-700 text-xs font-semibold px-2 py-0.5 rounded-full">{{ $upcomingEvents->count() }}</span>
                @endif
            </button>
            <button @click="tab = 'past'"
                :class="tab === 'past' ? 'border-blue-600 text-blue-700' : 'border-transparent text-gray-500 hover:text-gray-700'"
                class="px-4 py-2 border-b-2 font-medium text-sm transition-colors">
                Past
                @if($pastEvents->count() > 0)
                    <span class="ml-1 bg-gray-100 text-gray-700 text-xs font-semibold px-2 py-0.5 rounded-full">{{ $pastEvents->count() }}</span>
                @endif
            </button>
        </div>

        <!-- Upcoming Events -->
        <div x-show="tab === 'upcoming'" class="space-y-6">
            @if($upcomingEvents->count() > 0)
                @foreach($upcomingEvents as $event)
                    <div class="group bg-white rounded-lg border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden w-full">
                        <div class="px-6 py-3 border-b border-gray-200 bg-gray-50">
                            <h2 class="text-xl font-bold text-blue-900">{{ $event->title }}</h2>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4 flex-wrap gap-2">
                                <div class="flex items-center space-x-4 flex-wrap gap-2">
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
            @else
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 text-center">
                    <i class="far fa-calendar-alt text-4xl text-gray-300 mb-3"></i>
                    <p class="text-gray-500">No upcoming events at this time.</p>
                    <p class="text-sm text-gray-400 mt-1">Please check back later.</p>
                </div>
            @endif
        </div>

        <!-- Past Events -->
        <div x-show="tab === 'past'" x-cloak class="space-y-6">
            @if($pastEvents->count() > 0)
                <p class="text-sm text-gray-500 mb-4 italic">Past events are kept here for 7 days then automatically removed.</p>
                @foreach($pastEvents as $event)
                    <div class="bg-white rounded-lg border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden w-full opacity-80 hover:opacity-100">
                        <div class="px-6 py-3 border-b border-gray-200 bg-gray-100">
                            <h2 class="text-xl font-bold text-gray-700">{{ $event->title }}</h2>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4 flex-wrap gap-2">
                                <div class="flex items-center space-x-4 flex-wrap gap-2">
                                    <span class="flex items-center text-sm text-gray-600">
                                        <i class="far fa-calendar-alt mr-1.5 text-gray-500 w-4"></i>
                                        {{ $event->event_date->format('F d, Y') }}
                                    </span>
                                    <span class="flex items-center text-sm text-gray-600">
                                        <i class="far fa-clock mr-1.5 text-gray-500 w-4"></i>
                                        {{ $event->event_date->format('g:i A') }}
                                    </span>
                                    @if($event->location)
                                    <span class="flex items-center text-sm text-gray-600">
                                        <i class="fas fa-map-marker-alt mr-1.5 text-gray-500 w-4"></i>
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
            @else
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 text-center">
                    <i class="fas fa-history text-4xl text-gray-300 mb-3"></i>
                    <p class="text-gray-500">No past events to show.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
