<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') - {{ config('app.name', 'Church Website') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        html, body {
            overflow-x: hidden;
            max-width: 100%;
        }
        .nav-link {
            transition: color 0.3s ease, border-color 0.3s ease;
        }
        .notification-enter {
            animation: slideDown 0.3s ease-out;
        }
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100">
    @php
        $unreadCount = \App\Models\CommunitySignup::whereNull('read_at')->count();
    @endphp
    <nav class="bg-white shadow-lg border-b border-gray-200" x-data="{ mobileOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold text-blue-600">
                            Admin Panel
                        </a>
                    </div>
                    <div class="hidden lg:ml-6 lg:flex lg:space-x-2">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link border-transparent text-gray-600 hover:text-blue-600 hover:border-blue-500 inline-flex items-center px-3 py-2 border-b-2 text-sm font-medium transition-colors {{ request()->routeIs('admin.dashboard') ? 'border-blue-500 text-blue-600' : '' }}">Dashboard</a>
                        <a href="{{ route('admin.announcements.index') }}" class="nav-link border-transparent text-gray-600 hover:text-blue-600 hover:border-blue-500 inline-flex items-center px-3 py-2 border-b-2 text-sm font-medium transition-colors {{ request()->routeIs('admin.announcements.*') ? 'border-blue-500 text-blue-600' : '' }}">Announcements</a>
                        <a href="{{ route('admin.events.index') }}" class="nav-link border-transparent text-gray-600 hover:text-blue-600 hover:border-blue-500 inline-flex items-center px-3 py-2 border-b-2 text-sm font-medium transition-colors {{ request()->routeIs('admin.events.*') ? 'border-blue-500 text-blue-600' : '' }}">Events</a>
                        <a href="{{ route('admin.schedules.index') }}" class="nav-link border-transparent text-gray-600 hover:text-blue-600 hover:border-blue-500 inline-flex items-center px-3 py-2 border-b-2 text-sm font-medium transition-colors {{ request()->routeIs('admin.schedules.*') ? 'border-blue-500 text-blue-600' : '' }}">Schedules</a>
                        <a href="{{ route('admin.church-people.index') }}" class="nav-link border-transparent text-gray-600 hover:text-blue-600 hover:border-blue-500 inline-flex items-center px-3 py-2 border-b-2 text-sm font-medium transition-colors {{ request()->routeIs('admin.church-people.*') ? 'border-blue-500 text-blue-600' : '' }}">Team</a>
                        <a href="{{ route('admin.sermon-slides.index') }}" class="nav-link border-transparent text-gray-600 hover:text-blue-600 hover:border-blue-500 inline-flex items-center px-3 py-2 border-b-2 text-sm font-medium transition-colors {{ request()->routeIs('admin.sermon-slides.*') ? 'border-blue-500 text-blue-600' : '' }}">Sunday Sermon</a>
                        <a href="{{ route('admin.livestream.index') }}" class="nav-link border-transparent text-gray-600 hover:text-blue-600 hover:border-blue-500 inline-flex items-center px-3 py-2 border-b-2 text-sm font-medium transition-colors {{ request()->routeIs('admin.livestream.*') ? 'border-blue-500 text-blue-600' : '' }}">Live Stream</a>
                        <a href="{{ route('admin.inbox.index') }}" class="nav-link border-transparent text-gray-600 hover:text-blue-600 hover:border-blue-500 inline-flex items-center px-3 py-2 border-b-2 text-sm font-medium transition-colors {{ request()->routeIs('admin.inbox.*') ? 'border-blue-500 text-blue-600' : '' }}">
                            Inbox
                            @if($unreadCount > 0)
                                <span class="ml-2 bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">{{ $unreadCount }}</span>
                            @endif
                        </a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('home') }}" target="_blank" class="hidden lg:inline text-gray-600 hover:text-blue-600 text-sm font-medium transition-colors">
                        View Site
                    </a>
                    <form method="POST" action="{{ route('admin.logout') }}" class="hidden lg:block">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-red-600 text-sm font-medium transition-colors inline-flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Logout
                        </button>
                    </form>
                    <!-- Mobile menu button -->
                    <button @click="mobileOpen = !mobileOpen" class="lg:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-blue-600 hover:bg-gray-100 focus:outline-none">
                        <svg class="h-6 w-6 transition-transform duration-300" :class="mobileOpen ? 'rotate-90' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path x-show="!mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path x-show="mobileOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile menu -->
        <div x-show="mobileOpen"
            x-cloak
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-2 max-h-0"
            x-transition:enter-end="opacity-100 translate-y-0 max-h-screen"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 max-h-screen"
            x-transition:leave-end="opacity-0 -translate-y-2 max-h-0"
            @click.outside="mobileOpen = false"
            class="lg:hidden border-t border-gray-200 bg-white overflow-hidden">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('admin.dashboard') }}" @click="mobileOpen = false" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('admin.dashboard') ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:bg-gray-50' }}">Dashboard</a>
                <a href="{{ route('admin.announcements.index') }}" @click="mobileOpen = false" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('admin.announcements.*') ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:bg-gray-50' }}">Announcements</a>
                <a href="{{ route('admin.events.index') }}" @click="mobileOpen = false" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('admin.events.*') ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:bg-gray-50' }}">Events</a>
                <a href="{{ route('admin.schedules.index') }}" @click="mobileOpen = false" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('admin.schedules.*') ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:bg-gray-50' }}">Schedules</a>
                <a href="{{ route('admin.church-people.index') }}" @click="mobileOpen = false" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('admin.church-people.*') ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:bg-gray-50' }}">Team</a>
                <a href="{{ route('admin.sermon-slides.index') }}" @click="mobileOpen = false" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('admin.sermon-slides.*') ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:bg-gray-50' }}">Sunday Sermon</a>
                <a href="{{ route('admin.livestream.index') }}" @click="mobileOpen = false" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('admin.livestream.*') ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:bg-gray-50' }}">Live Stream</a>
                <a href="{{ route('admin.inbox.index') }}" @click="mobileOpen = false" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('admin.inbox.*') ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:bg-gray-50' }}">
                    Inbox
                    @if($unreadCount > 0)
                        <span class="ml-2 bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">{{ $unreadCount }}</span>
                    @endif
                </a>
                <div class="border-t border-gray-200 mt-2 pt-2">
                    <a href="{{ route('home') }}" target="_blank" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:bg-gray-50">View Site</a>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-3 py-2 rounded-md text-base font-medium text-red-600 hover:bg-red-50">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @if(session('success'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 notification-enter">
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-lg shadow-md relative flex items-center" role="alert">
                    <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="block sm:inline font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 notification-enter">
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded-lg shadow-md relative" role="alert">
                    <div class="flex items-center mb-2">
                        <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="font-semibold">Please fix the following errors:</span>
                    </div>
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
