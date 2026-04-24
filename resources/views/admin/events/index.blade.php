@extends('layouts.admin')

@section('title', 'Events')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="mb-6">
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 mb-2">
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Events</h1>
                <a href="{{ route('admin.events.create') }}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 shadow-md hover:shadow-lg transition-all">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Create Event
                </a>
            </div>
            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-lg">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-blue-700">
                            <strong>Create Events</strong> to inform your congregation about upcoming worship services, special gatherings, conferences, and other church activities. Include date, time, and location details.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <ul class="divide-y divide-gray-200">
                @forelse($events as $event)
                    <li>
                        <div class="px-4 py-4 sm:px-6 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">
                            <div class="flex-1 min-w-0">
                                <h3 class="text-base sm:text-lg font-medium text-gray-900 break-words">{{ $event->title }}</h3>
                                <p class="text-sm text-gray-500 mt-1 flex flex-wrap items-center gap-2">
                                    <span>{{ $event->event_date->format('M d, Y g:i A') }}</span>
                                    @if($event->is_published)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Published</span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Draft</span>
                                    @endif
                                </p>
                            </div>
                            <div class="flex space-x-3 sm:flex-shrink-0">
                                <a href="{{ route('admin.events.edit', $event->id) }}" class="text-blue-600 hover:text-blue-900 font-medium">Edit</a>
                                <form method="POST" action="{{ route('admin.events.destroy', $event->id) }}" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 font-medium">Delete</button>
                                </form>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="px-4 py-4 sm:px-6">
                        <p class="text-gray-500">No events yet.</p>
                    </li>
                @endforelse
            </ul>
        </div>
        
        <div class="mt-4">
            {{ $events->links() }}
        </div>
    </div>
</div>
@endsection

