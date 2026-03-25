@extends('layouts.admin')

@section('title', 'Create Slideshow Slide')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Create New Slide</h1>

        <form action="{{ route('admin.slideshows.store') }}" method="POST" class="bg-white rounded-lg shadow p-6">
            @csrf

            <div class="mb-4">
                <label for="image_url" class="block text-sm font-medium text-gray-700 mb-2">Image URL</label>
                <input type="url" name="image_url" id="image_url" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required value="{{ old('image_url') }}">
                @error('image_url')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-sm text-gray-500">Enter a URL to an image of people worshipping or having fun in church</p>
            </div>

            <div class="mb-4">
                <label for="tagline" class="block text-sm font-medium text-gray-700 mb-2">Tagline</label>
                <input type="text" name="tagline" id="tagline" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required value="{{ old('tagline') }}" maxlength="255">
                @error('tagline')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-sm text-gray-500">A catchy tagline for this slide (max 255 characters)</p>
            </div>

            <div class="mb-6">
                <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                <input type="number" name="order" id="order" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required value="{{ old('order', 0) }}" min="0">
                @error('order')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-sm text-gray-500">Lower numbers appear first in the slideshow</p>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('admin.slideshows.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                    Create Slide
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
