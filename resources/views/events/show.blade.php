@extends('layouts.app')

@section('title', $event->title . ' - BCF Church Fellowship')
@section('meta_description', Str::limit(strip_tags($event->description ?? $event->content ?? ''), 160))

@section('content')
<div class="max-w-4xl mx-auto py-12 sm:py-16 px-4 sm:px-6 lg:px-8">
    <a href="{{ route('events.index') }}" class="inline-flex items-center text-blue-700 hover:text-blue-800 mb-6 font-semibold">
        <svg class="mr-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Back to Events
    </a>
    
    <div class="bg-white/95 backdrop-blur-md shadow-xl rounded-xl p-10 border border-blue-100">
        <h1 class="text-4xl font-bold text-blue-900 mb-6 logo-text">{{ $event->title }}</h1>
            <div class="space-y-4 mb-8 bg-blue-50 rounded-lg p-6">
                <div class="flex items-center text-gray-700">
                    <svg class="w-6 h-6 mr-3 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span class="font-semibold">Date:</span>
                    <span class="ml-2">{{ $event->event_date->format('F d, Y g:i A') }}</span>
                </div>
                @if($event->location)
                    <div class="flex items-center text-gray-700">
                        <svg class="w-6 h-6 mr-3 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="font-semibold">Location:</span>
                        <span class="ml-2">{{ $event->location }}</span>
                    </div>
                @endif
            </div>
            @if($event->description)
                <div class="prose max-w-none text-gray-700">
                    {!! nl2br(e($event->description)) !!}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

