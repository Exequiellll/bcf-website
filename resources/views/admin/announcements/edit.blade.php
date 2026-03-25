@extends('layouts.admin')

@section('title', 'Edit Announcement')

@section('content')
<div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Edit Announcement</h1>
        
        <form method="POST" action="{{ route('admin.announcements.update', $announcement->id) }}" class="bg-white shadow rounded-lg p-6">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $announcement->title) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea name="content" id="content" rows="10" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('content', $announcement->content) }}</textarea>
            </div>
            
            <div class="mb-4">
                <label for="published_at" class="block text-sm font-medium text-gray-700">Published Date</label>
                <input type="date" name="published_at" id="published_at" value="{{ old('published_at', $announcement->published_at ? $announcement->published_at->format('Y-m-d') : '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            
            <div class="mb-4">
                <label class="flex items-center">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published', $announcement->is_published) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <span class="ml-2 text-sm text-gray-700">Published</span>
                </label>
            </div>
            
            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.announcements.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">Cancel</a>
                <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

