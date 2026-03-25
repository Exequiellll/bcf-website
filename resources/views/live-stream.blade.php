@extends('layouts.app')

@section('title', 'Live Stream - BCF Church Fellowship')
@section('meta_description', 'Watch BCF Church Fellowship live stream services. Join our worship and sermons online from anywhere.')

@section('content')
<div class="max-w-7xl mx-auto py-12 sm:py-16 px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
        <h1 class="text-4xl sm:text-5xl font-bold text-blue-900 mb-4 logo-text">Live Stream</h1>
        <p class="text-lg text-gray-700">Join us for live worship and the Word</p>
    </div>

    <div class="px-4 py-6 sm:px-0">
        @if($facebookEmbedUrl && \App\Models\Setting::get('is_live', false))
            <div class="bg-white/95 backdrop-blur-md shadow-xl rounded-xl p-8 border border-blue-100">
                @if($liveTitle = \App\Models\Setting::get('live_title'))
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $liveTitle }}</h2>
                @endif
                @if($liveDescription = \App\Models\Setting::get('live_description'))
                    <p class="text-gray-600 mb-4">{{ $liveDescription }}</p>
                @endif
                <div class="aspect-video w-full rounded-lg overflow-hidden">
                    {!! $facebookEmbedUrl !!}
                </div>
            </div>
        @else
            <div class="bg-white/95 backdrop-blur-md shadow-lg rounded-xl p-12 border border-blue-100 text-center">
                <div class="mb-6">
                    <svg class="mx-auto h-24 w-24 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <p class="text-xl text-gray-700 mb-2">Live stream is not currently available</p>
                <p class="text-gray-500">Please check back later or contact the administrator.</p>
            </div>
        @endif
    </div>
</div>
@endsection

