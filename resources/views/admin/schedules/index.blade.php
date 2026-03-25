@extends('layouts.admin')

@section('title', 'Schedules')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="mb-6">
            <div class="flex justify-between items-center mb-2">
                <h1 class="text-3xl font-bold text-gray-900">Schedules</h1>
                <a href="{{ route('admin.schedules.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 shadow-md hover:shadow-lg transition-all">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Create Schedule
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
                            <strong>Create Schedules</strong> to display your regular church activities and services. Set up weekly schedules for Sunday services, Bible studies, prayer meetings, and other recurring events. Use sort order to organize them.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <ul class="divide-y divide-gray-200">
                @forelse($schedules as $schedule)
                    <li>
                        <div class="px-4 py-4 sm:px-6 flex justify-between items-center">
                            <div class="flex-1">
                                <h3 class="text-lg font-medium text-gray-900">{{ $schedule->title }}</h3>
                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $schedule->day_of_week }} - {{ $schedule->start_time }}
                                    @if($schedule->end_time)
                                        to {{ $schedule->end_time }}
                                    @endif
                                    @if($schedule->is_active)
                                        <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Active</span>
                                    @else
                                        <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Inactive</span>
                                    @endif
                                </p>
                            </div>
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.schedules.edit', $schedule->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                <form method="POST" action="{{ route('admin.schedules.destroy', $schedule->id) }}" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="px-4 py-4 sm:px-6">
                        <p class="text-gray-500">No schedules yet.</p>
                    </li>
                @endforelse
            </ul>
        </div>
        
        <div class="mt-4">
            {{ $schedules->links() }}
        </div>
    </div>
</div>
@endsection

