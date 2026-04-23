@extends('layouts.app')

@section('title', 'Schedule - BCF Church Fellowship')
@section('meta_description', 'View BCF Church Fellowship service schedules including worship services, Bible studies, and special events.')

@section('content')
<div class="max-w-4xl mx-auto py-8 sm:py-12 px-4 sm:px-6 lg:px-8 mt-4" x-data="{ tab: 'upcoming' }">
    <div class="text-center mb-8">
        <h1 class="text-3xl sm:text-4xl font-bold text-blue-900 mb-2 logo-text">Weekly Schedule</h1>
        <p class="text-sm text-gray-600">Join us throughout the week for worship, study, and fellowship</p>
    </div>

    <div class="w-full max-w-3xl mx-auto">
        <!-- Tabs -->
        <div class="flex border-b border-gray-200 mb-6">
            <button @click="tab = 'current'"
                :class="tab === 'upcoming' ? 'border-blue-600 text-blue-700' : 'border-transparent text-gray-500 hover:text-gray-700'"
                class="px-4 py-2 border-b-2 font-medium text-sm transition-colors">
                Upcoming
                @if($schedules->count() > 0)
                    <span class="ml-1 bg-blue-100 text-blue-700 text-xs font-semibold px-2 py-0.5 rounded-full">{{ $schedules->count() }}</span>
                @endif
            </button>
            <button @click="tab = 'past'"
                :class="tab === 'past' ? 'border-blue-600 text-blue-700' : 'border-transparent text-gray-500 hover:text-gray-700'"
                class="px-4 py-2 border-b-2 font-medium text-sm transition-colors">
                Past
                @if($pastSchedules->count() > 0)
                    <span class="ml-1 bg-gray-100 text-gray-700 text-xs font-semibold px-2 py-0.5 rounded-full">{{ $pastSchedules->count() }}</span>
                @endif
            </button>
        </div>

        <!-- Current Schedules -->
        <div x-show="tab === 'upcoming'" class="space-y-6">
            @if($schedules->count() > 0)
                @foreach($schedules as $day => $daySchedules)
                    <div class="bg-white rounded-lg border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden w-full">
                        <div class="px-6 py-3 border-b border-gray-200 bg-gray-50">
                            <h2 class="text-xl font-bold text-blue-900">{{ $day }}</h2>
                        </div>
                        <div class="divide-y divide-gray-100">
                            @foreach($daySchedules as $schedule)
                                <div class="p-5 hover:bg-blue-50/50 transition-colors duration-200">
                                    <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
                                        <div class="flex-1">
                                            <h3 class="font-semibold text-gray-900 mb-1">{{ $schedule->title }}</h3>
                                            <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-sm text-gray-600">
                                                <span class="flex items-center">
                                                    <i class="far fa-clock mr-1.5 text-blue-600 w-4"></i>
                                                    {{ date('g:i A', strtotime($schedule->start_time)) }}
                                                    @if($schedule->end_time)
                                                        - {{ date('g:i A', strtotime($schedule->end_time)) }}
                                                    @endif
                                                </span>
                                                @if($schedule->location)
                                                    <span class="flex items-center">
                                                        <i class="fas fa-map-marker-alt mr-1.5 text-blue-600 w-4"></i>
                                                        {{ $schedule->location }}
                                                    </span>
                                                @endif
                                                @if($schedule->event_date)
                                                    <span class="flex items-center text-blue-700 font-medium">
                                                        <i class="far fa-calendar-alt mr-1.5 text-blue-600 w-4"></i>
                                                        {{ $schedule->event_date->format('M d, Y') }}
                                                    </span>
                                                @endif
                                            </div>
                                            @if($schedule->description)
                                                <p class="mt-2 text-sm text-gray-600">{{ $schedule->description }}</p>
                                            @endif
                                        </div>
                                        @if(!$schedule->event_date)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                <i class="fas fa-sync-alt mr-1"></i> Weekly
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @else
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 text-center">
                    <i class="far fa-calendar-alt text-4xl text-gray-300 mb-3"></i>
                    <p class="text-gray-500">No schedule available at this time.</p>
                    <p class="text-sm text-gray-400 mt-1">Please check back later for updates.</p>
                </div>
            @endif
        </div>

        <!-- Past Schedules -->
        <div x-show="tab === 'past'" x-cloak class="space-y-6">
            @if($pastSchedules->count() > 0)
                <p class="text-sm text-gray-500 mb-4 italic">Past one-time schedules are kept here for 7 days then automatically removed.</p>
                @foreach($pastSchedules as $schedule)
                    <div class="bg-white rounded-lg border border-gray-100 shadow-sm overflow-hidden w-full opacity-80 hover:opacity-100 transition">
                        <div class="px-6 py-3 border-b border-gray-200 bg-gray-100">
                            <h2 class="text-xl font-bold text-gray-700">{{ $schedule->title }}</h2>
                        </div>
                        <div class="p-5">
                            <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-sm text-gray-600">
                                <span class="flex items-center">
                                    <i class="far fa-calendar-alt mr-1.5 text-gray-500 w-4"></i>
                                    {{ $schedule->event_date->format('F d, Y') }}
                                </span>
                                <span class="flex items-center">
                                    <i class="far fa-clock mr-1.5 text-gray-500 w-4"></i>
                                    {{ date('g:i A', strtotime($schedule->start_time)) }}
                                    @if($schedule->end_time)
                                        - {{ date('g:i A', strtotime($schedule->end_time)) }}
                                    @endif
                                </span>
                                @if($schedule->location)
                                    <span class="flex items-center">
                                        <i class="fas fa-map-marker-alt mr-1.5 text-gray-500 w-4"></i>
                                        {{ $schedule->location }}
                                    </span>
                                @endif
                                <span class="text-xs text-gray-500">{{ $schedule->event_date->diffForHumans() }}</span>
                            </div>
                            @if($schedule->description)
                                <p class="mt-2 text-sm text-gray-600">{{ $schedule->description }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 text-center">
                    <i class="fas fa-history text-4xl text-gray-300 mb-3"></i>
                    <p class="text-gray-500">No past schedules to show.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
