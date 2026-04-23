@extends('layouts.admin')

@section('title', 'Edit Schedule')

@section('content')
<div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Edit Schedule</h1>
        
        <form method="POST" action="{{ route('admin.schedules.update', $schedule->id) }}" class="bg-white shadow rounded-lg p-6">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="day_of_week" class="block text-sm font-medium text-gray-700">Day of Week</label>
                <select name="day_of_week" id="day_of_week" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="Sunday" {{ old('day_of_week', $schedule->day_of_week) == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                    <option value="Monday" {{ old('day_of_week', $schedule->day_of_week) == 'Monday' ? 'selected' : '' }}>Monday</option>
                    <option value="Tuesday" {{ old('day_of_week', $schedule->day_of_week) == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                    <option value="Wednesday" {{ old('day_of_week', $schedule->day_of_week) == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                    <option value="Thursday" {{ old('day_of_week', $schedule->day_of_week) == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                    <option value="Friday" {{ old('day_of_week', $schedule->day_of_week) == 'Friday' ? 'selected' : '' }}>Friday</option>
                    <option value="Saturday" {{ old('day_of_week', $schedule->day_of_week) == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                </select>
            </div>
            
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $schedule->title) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            
            <div class="mb-4">
                <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
                <input type="time" name="start_time" id="start_time" value="{{ old('start_time', $schedule->start_time) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            
            <div class="mb-4">
                <label for="end_time" class="block text-sm font-medium text-gray-700">End Time (optional)</label>
                <input type="time" name="end_time" id="end_time" value="{{ old('end_time', $schedule->end_time) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700">Location (optional)</label>
                <input type="text" name="location" id="location" value="{{ old('location', $schedule->location) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description (optional)</label>
                <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description', $schedule->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="event_date" class="block text-sm font-medium text-gray-700">Specific Date (optional)</label>
                <input type="datetime-local" name="event_date" id="event_date" value="{{ old('event_date', $schedule->event_date ? $schedule->event_date->format('Y-m-d\TH:i') : '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <p class="mt-1 text-xs text-gray-500">Leave empty for recurring weekly schedules. Set a date for one-time events. After the date passes, it moves to "Past" for 7 days then auto-deletes.</p>
            </div>
            
            <div class="mb-4">
                <label for="sort_order" class="block text-sm font-medium text-gray-700">Sort Order</label>
                <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $schedule->sort_order) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            
            <div class="mb-4">
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $schedule->is_active) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <span class="ml-2 text-sm text-gray-700">Active</span>
                </label>
            </div>
            
            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.schedules.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">Cancel</a>
                <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection




