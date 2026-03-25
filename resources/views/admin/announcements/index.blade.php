@extends('layouts.admin')

@section('title', 'Announcements')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="mb-6">
            <div class="flex justify-between items-center mb-2">
                <h1 class="text-3xl font-bold text-gray-900">Announcements</h1>
                <a href="{{ route('admin.announcements.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 shadow-md hover:shadow-lg transition-all">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Create Announcement
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
                            <strong>Create Announcements</strong> to share important news, updates, and information with your church community. Announcements can be published immediately or saved as drafts for later.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <ul class="divide-y divide-gray-200">
                @forelse($announcements as $announcement)
                    <li>
                        <div class="px-4 py-4 sm:px-6 flex justify-between items-center">
                            <div class="flex-1">
                                <h3 class="text-lg font-medium text-gray-900">{{ $announcement->title }}</h3>
                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $announcement->published_at ? $announcement->published_at->format('M d, Y') : $announcement->created_at->format('M d, Y') }}
                                    @if($announcement->is_published)
                                        <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Published</span>
                                    @else
                                        <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Draft</span>
                                    @endif
                                </p>
                            </div>
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.announcements.edit', $announcement->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                <form method="POST" action="{{ route('admin.announcements.destroy', $announcement->id) }}" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="px-4 py-4 sm:px-6">
                        <p class="text-gray-500">No announcements yet.</p>
                    </li>
                @endforelse
            </ul>
        </div>
        
        <div class="mt-4">
            {{ $announcements->links() }}
        </div>
    </div>
</div>
@endsection

