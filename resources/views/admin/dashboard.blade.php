@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.5;
        }
    }
    
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    .animate-fade-in-up {
        animation: fadeInUp 0.6s ease-out forwards;
    }
    
    .animate-slide-in-right {
        animation: slideInRight 0.6s ease-out forwards;
    }
    
    .stat-card {
        animation-delay: calc(var(--delay) * 0.1s);
    }
    
    .hover-lift {
        transition: all 0.3s ease;
    }
    
    .hover-lift:hover {
        transform: translateY(-5px);
    }
    
    .gradient-bg {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .gradient-bg-2 {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }
    
    .gradient-bg-3 {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }
    
    .gradient-bg-4 {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
    }
</style>

<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <!-- Welcome Header -->
        <div class="mb-8 animate-fade-in-up">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">Welcome Back! 👋</h1>
            <p class="text-gray-600">Here's what's happening with your church website today.</p>
        </div>
        
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Announcements Card -->
            <div class="stat-card bg-white overflow-hidden shadow-lg rounded-xl border-l-4 border-blue-500 hover-lift animate-fade-in-up" style="--delay: 1">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-600 mb-1">Announcements</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $stats['announcements'] }}</p>
                            <p class="text-xs text-gray-500 mt-2">Total published</p>
                        </div>
                        <div class="p-4 bg-blue-100 rounded-full">
                            <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                            </svg>
                        </div>
                    </div>
                    <a href="{{ route('admin.announcements.index') }}" class="mt-4 inline-flex items-center text-sm text-blue-600 hover:text-blue-800 font-medium">
                        Manage <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            </div>
            
            <!-- Events Card -->
            <div class="stat-card bg-white overflow-hidden shadow-lg rounded-xl border-l-4 border-purple-500 hover-lift animate-fade-in-up" style="--delay: 2">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-600 mb-1">Events</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $stats['events'] }}</p>
                            <p class="text-xs text-gray-500 mt-2">Total events</p>
                        </div>
                        <div class="p-4 bg-purple-100 rounded-full">
                            <svg class="h-8 w-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                    <a href="{{ route('admin.events.index') }}" class="mt-4 inline-flex items-center text-sm text-purple-600 hover:text-purple-800 font-medium">
                        Manage <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            </div>
            
            <!-- Schedules Card -->
            <div class="stat-card bg-white overflow-hidden shadow-lg rounded-xl border-l-4 border-green-500 hover-lift animate-fade-in-up" style="--delay: 3">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-600 mb-1">Schedules</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $stats['schedules'] }}</p>
                            <p class="text-xs text-gray-500 mt-2">Active schedules</p>
                        </div>
                        <div class="p-4 bg-green-100 rounded-full">
                            <svg class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <a href="{{ route('admin.schedules.index') }}" class="mt-4 inline-flex items-center text-sm text-green-600 hover:text-green-800 font-medium">
                        Manage <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            </div>
            
            <!-- Pages Card -->
            <div class="stat-card bg-white overflow-hidden shadow-lg rounded-xl border-l-4 border-orange-500 hover-lift animate-fade-in-up" style="--delay: 4">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-600 mb-1">Pages</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $stats['pages'] }}</p>
                            <p class="text-xs text-gray-500 mt-2">Information pages</p>
                        </div>
                        <div class="p-4 bg-orange-100 rounded-full">
                            <svg class="h-8 w-8 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                    </div>
                    <a href="{{ route('admin.information-pages.index') }}" class="mt-4 inline-flex items-center text-sm text-orange-600 hover:text-orange-800 font-medium">
                        Manage <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Quick Actions -->
        <div class="mb-8 animate-fade-in-up" style="--delay: 5">
            <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl shadow-xl p-6 text-white">
                <h2 class="text-2xl font-bold mb-4">Quick Actions</h2>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <a href="{{ route('admin.announcements.create') }}" class="bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-lg p-4 text-center transition-all duration-200 hover:scale-105">
                        <svg class="h-8 w-8 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <p class="text-sm font-medium">New Announcement</p>
                    </a>
                    <a href="{{ route('admin.events.create') }}" class="bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-lg p-4 text-center transition-all duration-200 hover:scale-105">
                        <svg class="h-8 w-8 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <p class="text-sm font-medium">New Event</p>
                    </a>
                    <a href="{{ route('admin.church-people.create') }}" class="bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-lg p-4 text-center transition-all duration-200 hover:scale-105">
                        <svg class="h-8 w-8 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <p class="text-sm font-medium">Add Team Member</p>
                    </a>
                    <a href="{{ route('admin.schedules.create') }}" class="bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-lg p-4 text-center transition-all duration-200 hover:scale-105">
                        <svg class="h-8 w-8 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <p class="text-sm font-medium">Add Schedule</p>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Recent Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Announcements -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden animate-slide-in-right">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4">
                    <h2 class="text-xl font-bold text-white flex items-center">
                        <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                        </svg>
                        Recent Announcements
                    </h2>
                </div>
                <div class="p-6">
                    @if($recentAnnouncements->count() > 0)
                        <ul class="space-y-3">
                            @foreach($recentAnnouncements as $index => $announcement)
                                <li class="border-l-4 border-blue-500 pl-4 py-2 hover:bg-blue-50 rounded-r-lg transition-all duration-200" style="animation-delay: {{ $index * 0.1 }}s">
                                    <a href="{{ route('admin.announcements.edit', $announcement->id) }}" class="block group">
                                        <h3 class="text-lg font-semibold text-gray-900 group-hover:text-blue-700 transition-colors">{{ $announcement->title }}</h3>
                                        <p class="text-sm text-gray-500 mt-1">
                                            {{ $announcement->published_at ? $announcement->published_at->format('M d, Y') : $announcement->created_at->format('M d, Y') }}
                                            @if($announcement->is_published)
                                                <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">Published</span>
                                            @else
                                                <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">Draft</span>
                                            @endif
                                        </p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="mt-4">
                            <a href="{{ route('admin.announcements.index') }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm inline-flex items-center">
                                View all <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                            </svg>
                            <p class="mt-2 text-gray-500">No announcements yet.</p>
                            <a href="{{ route('admin.announcements.create') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                Create your first announcement
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Upcoming Events -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden animate-slide-in-right">
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 px-6 py-4">
                    <h2 class="text-xl font-bold text-white flex items-center">
                        <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Upcoming Events
                    </h2>
                </div>
                <div class="p-6">
                    @if($upcomingEvents->count() > 0)
                        <ul class="space-y-3">
                            @foreach($upcomingEvents as $index => $event)
                                <li class="border-l-4 border-purple-500 pl-4 py-2 hover:bg-purple-50 rounded-r-lg transition-all duration-200" style="animation-delay: {{ $index * 0.1 }}s">
                                    <a href="{{ route('admin.events.edit', $event->id) }}" class="block group">
                                        <h3 class="text-lg font-semibold text-gray-900 group-hover:text-purple-700 transition-colors">{{ $event->title }}</h3>
                                        <p class="text-sm text-gray-500 mt-1">
                                            <svg class="inline h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            {{ $event->event_date->format('M d, Y g:i A') }}
                                            @if($event->location)
                                                <span class="ml-2">• {{ $event->location }}</span>
                                            @endif
                                        </p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="mt-4">
                            <a href="{{ route('admin.events.index') }}" class="text-purple-600 hover:text-purple-800 font-medium text-sm inline-flex items-center">
                                View all <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="mt-2 text-gray-500">No upcoming events.</p>
                            <a href="{{ route('admin.events.create') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                                Create your first event
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
