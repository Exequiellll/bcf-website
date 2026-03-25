@extends('layouts.app')

@section('title', 'Schedule - BCF Church Fellowship')
@section('meta_description', 'View BCF Church Fellowship service schedules including worship services, Bible studies, and special events.')

@section('content')
<div class="max-w-4xl mx-auto py-8 sm:py-12 px-4 sm:px-6 lg:px-8 mt-4">
    <div class="text-center mb-8">
        <h1 class="text-3xl sm:text-4xl font-bold text-blue-900 mb-2 logo-text">Weekly Schedule</h1>
        <p class="text-sm text-gray-600">Join us throughout the week for worship, study, and fellowship</p>
    </div>
    
    <div class="space-y-6 w-full max-w-3xl mx-auto">
        @if($schedules->count() > 0)
            @foreach($schedules as $day => $daySchedules)
                <div class="bg-white rounded-lg border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden w-full">
                    <div class="px-6 py-3 border-b border-gray-900 bg-gray-100">
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
                                        </div>
                                        @if($schedule->description)
                                            <p class="mt-2 text-sm text-gray-600">{{ $schedule->description }}</p>
                                        @endif
                                    </div>
                                    @if($schedule->is_recurring)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <i class="fas fa-sync-alt mr-1"></i> Recurring
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
</div>
@endsection

