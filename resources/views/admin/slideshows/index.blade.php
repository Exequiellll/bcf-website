@extends('layouts.admin')

@section('title', 'Manage Slideshow')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 mb-6">
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">Manage Slideshow</h1>
        <a href="{{ route('admin.slideshows.create') }}" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add New Slide
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <!-- Desktop Table -->
        <div class="hidden md:block overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preview</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tagline</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($slideshows as $slideshow)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="{{ $slideshow->image_url }}" alt="{{ $slideshow->tagline }}" class="h-16 w-24 object-cover rounded">
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $slideshow->tagline }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-900">{{ $slideshow->order }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($slideshow->is_active)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">Inactive</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <form action="{{ route('admin.slideshows.toggle', $slideshow) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button type="submit" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                        {{ $slideshow->is_active ? 'Deactivate' : 'Activate' }}
                                    </button>
                                </form>
                                <a href="{{ route('admin.slideshows.edit', $slideshow) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                <form action="{{ route('admin.slideshows.destroy', $slideshow) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this slide?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                No slides found. <a href="{{ route('admin.slideshows.create') }}" class="text-blue-600 hover:text-blue-800">Create your first slide</a>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Mobile Cards -->
        <div class="md:hidden divide-y divide-gray-200">
            @forelse ($slideshows as $slideshow)
                <div class="p-4">
                    <div class="flex gap-3 mb-3">
                        <img src="{{ $slideshow->image_url }}" alt="{{ $slideshow->tagline }}" class="h-20 w-28 object-cover rounded flex-shrink-0">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-gray-900 break-words">{{ $slideshow->tagline }}</p>
                            <div class="flex items-center gap-2 mt-2 flex-wrap">
                                <span class="text-xs text-gray-500">Order: {{ $slideshow->order }}</span>
                                @if ($slideshow->is_active)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">Inactive</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-3 text-sm">
                        <form action="{{ route('admin.slideshows.toggle', $slideshow) }}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="text-indigo-600 hover:text-indigo-900 font-medium">
                                {{ $slideshow->is_active ? 'Deactivate' : 'Activate' }}
                            </button>
                        </form>
                        <a href="{{ route('admin.slideshows.edit', $slideshow) }}" class="text-indigo-600 hover:text-indigo-900 font-medium">Edit</a>
                        <form action="{{ route('admin.slideshows.destroy', $slideshow) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this slide?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 font-medium">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="p-6 text-center text-gray-500">
                    No slides found. <a href="{{ route('admin.slideshows.create') }}" class="text-blue-600 hover:text-blue-800">Create your first slide</a>.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
