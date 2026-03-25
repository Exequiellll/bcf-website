@extends('layouts.admin')

@section('title', 'Live Stream')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="mb-6">
            <div class="flex justify-between items-center mb-2">
                <h1 class="text-3xl font-bold text-gray-900">Live Stream Management</h1>
                <div class="flex items-center space-x-2">
                    <button id="toggle-live-btn" 
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-md transition-all {{ $isLive ? 'bg-red-600 hover:bg-red-700 text-white' : 'bg-green-600 hover:bg-green-700 text-white' }}"
                            data-is-live="{{ $isLive ? 'true' : 'false' }}">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            @if($isLive)
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z"></path>
                            @else
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            @endif
                        </svg>
                        {{ $isLive ? 'Stop Stream' : 'Go Live' }}
                    </button>
                    <a href="{{ route('live-stream') }}" target="_blank" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 shadow-md hover:shadow-lg transition-all">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                        View Live Page
                    </a>
                </div>
            </div>
            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-lg">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-blue-700">
                            <strong>Manage Live Stream</strong> - Configure your Facebook Live embed code and control when your stream is live. Toggle the stream status to show/hide the live stream on your website.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Stream Configuration -->
            <div class="bg-white shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Stream Configuration</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Configure your Facebook Live stream settings
                    </p>
                </div>
                <div class="px-4 py-5 sm:p-6">
                    <form method="POST" action="{{ route('admin.livestream.update') }}">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="live_title" class="block text-sm font-medium text-gray-700 mb-2">Stream Title</label>
                            <input type="text" 
                                   name="live_title" 
                                   id="live_title" 
                                   value="{{ old('live_title', $liveTitle) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                   placeholder="e.g., Sunday Morning Service">
                        </div>

                        <div class="mb-4">
                            <label for="live_description" class="block text-sm font-medium text-gray-700 mb-2">Stream Description</label>
                            <textarea name="live_description" 
                                      id="live_description" 
                                      rows="3" 
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                      placeholder="Brief description of the current stream">{{ old('live_description', $liveDescription) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="facebook_live_embed_url" class="block text-sm font-medium text-gray-700 mb-2">Facebook Live Embed Code</label>
                            <p class="text-sm text-gray-500 mb-2">Paste the Facebook embed code for your live stream here. You can get this from your Facebook page's video embed options.</p>
                            <textarea name="facebook_live_embed_url" 
                                      id="facebook_live_embed_url" 
                                      rows="8" 
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 font-mono text-sm">{{ old('facebook_live_embed_url', $facebookEmbedUrl) }}</textarea>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                                Save Configuration
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Stream Status -->
            <div class="bg-white shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Stream Status</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Current status and preview
                    </p>
                </div>
                <div class="px-4 py-5 sm:p-6">
                    <div class="mb-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                @if($isLive)
                                    <div class="h-3 w-3 bg-red-500 rounded-full animate-pulse"></div>
                                @else
                                    <div class="h-3 w-3 bg-gray-400 rounded-full"></div>
                                @endif
                            </div>
                            <div class="ml-3">
                                <h4 class="text-sm font-medium text-gray-900">
                                    Stream Status: 
                                    <span class="{{ $isLive ? 'text-red-600' : 'text-gray-600' }}">
                                        {{ $isLive ? 'LIVE' : 'OFFLINE' }}
                                    </span>
                                </h4>
                                <p class="text-sm text-gray-500">
                                    {{ $isLive ? 'Your stream is currently visible to visitors' : 'Use the Go Live button to start streaming' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    @if($facebookEmbedUrl)
                        <div class="mb-4">
                            <h5 class="text-sm font-medium text-gray-700 mb-2">Stream Preview</h5>
                            <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                                <div class="text-sm text-gray-600">
                                    {!! $facebookEmbedUrl !!}
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-8 bg-gray-50 rounded-lg">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No stream configured</h3>
                            <p class="mt-1 text-sm text-gray-500">Add your Facebook Live embed code to get started.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleBtn = document.getElementById('toggle-live-btn');
    
    toggleBtn.addEventListener('click', function() {
        const isCurrentlyLive = this.dataset.isLive === 'true';
        const newStatus = !isCurrentlyLive;
        
        fetch('{{ route("admin.livestream.toggle") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                is_live: newStatus
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update button state
                this.dataset.isLive = newStatus ? 'true' : 'false';
                
                if (newStatus) {
                    this.className = 'inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-md transition-all bg-red-600 hover:bg-red-700 text-white';
                    this.innerHTML = `
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z"></path>
                        </svg>
                        Stop Stream
                    `;
                } else {
                    this.className = 'inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-md transition-all bg-green-600 hover:bg-green-700 text-white';
                    this.innerHTML = `
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Go Live
                    `;
                }
                
                // Show success message
                const alertDiv = document.createElement('div');
                alertDiv.className = 'max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 notification-enter';
                alertDiv.innerHTML = `
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-lg shadow-md relative flex items-center" role="alert">
                        <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="block sm:inline font-medium">${data.message}</span>
                    </div>
                `;
                
                const main = document.querySelector('main');
                main.insertBefore(alertDiv, main.firstChild);
                
                // Remove alert after 3 seconds
                setTimeout(() => {
                    alertDiv.remove();
                }, 3000);
                
                // Reload page to update status display
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            }
        })
        .catch(error => {
            console.error('Error toggling stream:', error);
        });
    });
});
</script>
@append
@endsection
