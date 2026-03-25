@extends('layouts.app')

@section('title', $announcement->title . ' - BCF Church Fellowship')
@section('meta_description', Str::limit(strip_tags($announcement->content), 160))

@section('content')
<div class="max-w-4xl mx-auto py-12 sm:py-16 px-4 sm:px-6 lg:px-8">
    <a href="{{ route('announcements.index') }}" class="inline-flex items-center text-blue-700 hover:text-blue-800 mb-6 font-semibold">
        <svg class="mr-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Back to Announcements
    </a>
    
    <div class="bg-white/95 backdrop-blur-md shadow-xl rounded-xl p-10 border border-blue-100">
            <h1 class="text-4xl font-bold text-blue-900 mb-4 logo-text">{{ $announcement->title }}</h1>
            <p class="text-sm text-gray-500 mb-6">
                {{ $announcement->published_at ? $announcement->published_at->format('F d, Y') : $announcement->created_at->format('F d, Y') }}
            </p>
            <div class="prose max-w-none text-gray-700">
                {!! nl2br(e($announcement->content)) !!}
            </div>
        </div>
    </div>
</div>
@endsection

