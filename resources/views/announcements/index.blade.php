@extends('layouts.app')

@section('title', 'Announcements - BCF Church Fellowship')
@section('meta_description', 'Stay updated with the latest announcements from BCF Church Fellowship.')

@section('content')
<div class="max-w-4xl mx-auto py-8 sm:py-12 px-4 sm:px-6 lg:px-8 mt-4" x-data="{ tab: 'upcoming' }">
    <div class="text-center mb-8">
        <h1 class="text-3xl sm:text-4xl font-bold text-blue-900 mb-2 logo-text">Announcements</h1>
        <p class="text-sm text-gray-600">Stay updated with the latest news and updates from our church</p>
    </div>

    <div class="w-full max-w-3xl mx-auto">
        <!-- Tabs -->
        <div class="flex border-b border-gray-200 mb-6">
            <button @click="tab = 'current'"
                :class="tab === 'upcoming' ? 'border-blue-600 text-blue-700' : 'border-transparent text-gray-500 hover:text-gray-700'"
                class="px-4 py-2 border-b-2 font-medium text-sm transition-colors">
                Upcoming
                @if($announcements->count() > 0)
                    <span class="ml-1 bg-blue-100 text-blue-700 text-xs font-semibold px-2 py-0.5 rounded-full">{{ $announcements->total() }}</span>
                @endif
            </button>
            <button @click="tab = 'past'"
                :class="tab === 'past' ? 'border-blue-600 text-blue-700' : 'border-transparent text-gray-500 hover:text-gray-700'"
                class="px-4 py-2 border-b-2 font-medium text-sm transition-colors">
                Past
                @if($pastAnnouncements->count() > 0)
                    <span class="ml-1 bg-gray-100 text-gray-700 text-xs font-semibold px-2 py-0.5 rounded-full">{{ $pastAnnouncements->count() }}</span>
                @endif
            </button>
        </div>

        <!-- Current Announcements -->
        <div x-show="tab === 'upcoming'">
            @if($announcements->count() > 0)
                <div class="space-y-6">
                    @foreach($announcements as $announcement)
                        <div class="group bg-white rounded-lg border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden w-full">
                            <div class="px-6 py-3 border-b border-gray-100 bg-gray-50">
                                <h2 class="text-xl font-bold text-blue-900">{{ $announcement->title }}</h2>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-4 flex-wrap gap-2">
                                    <div class="flex items-center space-x-4 flex-wrap gap-2">
                                        <span class="flex items-center text-sm text-gray-600">
                                            <i class="far fa-calendar-alt mr-1.5 text-blue-600 w-4"></i>
                                            {{ $announcement->published_at ? $announcement->published_at->format('F d, Y') : $announcement->created_at->format('F d, Y') }}
                                        </span>
                                        @if($announcement->event_date)
                                            <span class="flex items-center text-sm text-blue-700 font-medium">
                                                <i class="far fa-clock mr-1.5 text-blue-600 w-4"></i>
                                                Happens: {{ $announcement->event_date->format('M d, Y g:i A') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="flex items-center">
                                        @if($announcement->is_important)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                <i class="fas fa-exclamation-circle mr-1"></i> Important
                                            </span>
                                        @endif
                                        <span class="ml-2 text-xs text-gray-500">
                                            {{ $announcement->published_at ? $announcement->published_at->diffForHumans() : $announcement->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>
                                <div class="prose max-w-none text-gray-600 mb-4">
                                    {!! Str::limit(strip_tags($announcement->content), 200) !!}
                                </div>
                                <a href="{{ route('announcements.show', $announcement->id) }}" class="inline-flex items-center text-blue-700 hover:text-blue-800 font-medium text-sm group">
                                    Read more
                                    <svg class="ml-1 w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    {{ $announcements->links() }}
                </div>
            @else
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 text-center">
                    <i class="far fa-bell text-4xl text-gray-300 mb-3"></i>
                    <p class="text-gray-500">No announcements available at this time.</p>
                    <p class="text-sm text-gray-400 mt-1">Please check back later for updates.</p>
                </div>
            @endif
        </div>

        <!-- Past Announcements -->
        <div x-show="tab === 'past'" x-cloak>
            @if($pastAnnouncements->count() > 0)
                <p class="text-sm text-gray-500 mb-4 italic">Past announcements are kept here for 7 days then automatically removed.</p>
                <div class="space-y-6">
                    @foreach($pastAnnouncements as $announcement)
                        <div class="bg-white rounded-lg border border-gray-100 shadow-sm overflow-hidden w-full opacity-80 hover:opacity-100 transition">
                            <div class="px-6 py-3 border-b border-gray-200 bg-gray-100">
                                <h2 class="text-xl font-bold text-gray-700">{{ $announcement->title }}</h2>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-4 flex-wrap gap-2">
                                    <span class="flex items-center text-sm text-gray-600">
                                        <i class="far fa-clock mr-1.5 text-gray-500 w-4"></i>
                                        Happened: {{ $announcement->event_date->format('F d, Y g:i A') }}
                                    </span>
                                    <span class="text-xs text-gray-500">{{ $announcement->event_date->diffForHumans() }}</span>
                                </div>
                                <div class="prose max-w-none text-gray-600 text-sm mb-4">
                                    {!! Str::limit(strip_tags($announcement->content), 150) !!}
                                </div>
                                <a href="{{ route('announcements.show', $announcement->id) }}" class="inline-flex items-center text-blue-700 hover:text-blue-800 font-medium text-sm group">
                                    Read more
                                    <svg class="ml-1 w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 text-center">
                    <i class="fas fa-history text-4xl text-gray-300 mb-3"></i>
                    <p class="text-gray-500">No past announcements to show.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
