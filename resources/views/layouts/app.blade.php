<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'BCF Church Fellowship'))</title>
    <meta name="description" content="@yield('meta_description', 'Welcome to BCF Church Fellowship - Building a community of believers, growing in faith, and sharing God\'s love.')">
    <meta property="og:title" content="@yield('title', config('app.name', 'BCF Church Fellowship'))">
    <meta property="og:description" content="@yield('meta_description', 'Welcome to BCF Church Fellowship - Building a community of believers, growing in faith, and sharing God\'s love.')">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('images/bcf real logo.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "Church",
        "name": "BCF Church Fellowship",
        "alternateName": "Breakthrough Christian Fellowship",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('images/bcf real logo.png') }}",
        "email": "Bcf.connect@gmail.com",
        "address": {
            "@@type": "PostalAddress",
            "addressLocality": "Santa Maria",
            "addressRegion": "Bulacan",
            "addressCountry": "PH"
        },
        "sameAs": [
            "https://www.facebook.com/bcfchurch.ph"
        ]
    }
    </script>
    @stack('structured_data')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Vite CSS and JS -->
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/bcf real logo.png') }}">
    
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        html, body {
            overflow-x: hidden;
            max-width: 100%;
        }

        /* Header Scroll Behavior */
        .header-transition {
            transition: transform 0.3s ease-in-out;
        }
        
        .header-hidden {
            transform: translateY(-100%);
            transition: transform 0.3s ease-in-out;
        }

        /* Enhanced Hamburger menu icon animation */
        .hamburger-icon {
            position: relative;
            width: 28px;
            height: 24px;
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            transform-style: preserve-3d;
        }
        
        .hamburger-icon span {
            display: block;
            position: absolute;
            height: 3px;
            width: 100%;
            background: currentColor;
            border-radius: 3px;
            opacity: 1;
            left: 0;
            transform: rotate(0deg);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            transform-origin: center;
        }
        
        .hamburger-icon span:nth-child(1) {
            top: 5px;
            transform-origin: 50% 50%;
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1), 
                        width 0.2s ease, 
                        top 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .hamburger-icon span:nth-child(2) {
            top: 11px;
            opacity: 1;
            transition: all 0.2s ease;
        }
        
        .hamburger-icon span:nth-child(3) {
            top: 17px;
            transform-origin: 50% 50%;
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1), 
                        width 0.2s ease, 
                        top 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .hamburger-icon.open {
            transform: rotate(180deg);
        }
        
        .hamburger-icon.open span:nth-child(1) {
            transform: rotate(45deg);
            top: 12px;
            left: 0;
            width: 100%;
        }
        
        .hamburger-icon.open span:nth-child(2) {
            opacity: 0;
            transform: scaleX(0);
        }
        
        .hamburger-icon.open span:nth-child(3) {
            transform: rotate(-45deg);
            top: 12px;
            left: 0;
            width: 100%;
        }
        
        /* Enhanced dropdown animation with pull effect */
        #desktop-dropdown {
            transform-origin: top center;
            transform: translateY(-100%) scaleY(0.9);
            opacity: 0;
            visibility: hidden;
            transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
            box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.1);
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            border-radius: 0 0 12px 12px;
            width: 100%;
            left: 0;
            right: 0;
            will-change: transform, opacity;
            overflow: hidden;
        }
        
        #desktop-dropdown:not(.hidden) {
            transform: translateY(0) scaleY(1);
            opacity: 1;
            visibility: visible;
        }
        
        /* Staggered animation for menu items */
        /* Initial state for menu items */
        .menu-item {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Animation for menu items when dropdown is opening */
        #desktop-dropdown:not(.hidden) .menu-item {
            animation: slideIn 0.4s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
            animation-delay: calc(0.05s * var(--i, 0));
            opacity: 0;
            transform: translateY(-5px);
        }
        
        @keyframes slideIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        :root {
            --primary: #1e40af;
            --primary-dark: #1e3a8a;
            --primary-light: #3b82f6;
            --accent: #4f46e5;
            --text: #1f2937;
            --text-light: #6b7280;
            --bg: #f9fafb;
            --card-bg: #ffffff;
            --border: #e5e7eb;
        }

        * {
            font-family: 'Poppins', sans-serif;
            box-sizing: border-box;
        }
        
        .logo-text {
            font-family: 'Playfair Display', serif;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Modern card */
        .card {
            @apply bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-md;
        }

        /* Button styles */
        .btn {
            @apply px-6 py-2.5 rounded-lg font-medium transition-all duration-300 flex items-center justify-center gap-2;
        }
        
        .btn-primary {
            @apply bg-gradient-to-r from-blue-600 to-blue-800 text-white hover:shadow-lg hover:-translate-y-0.5;
        }

        .btn-outline {
            @apply border-2 border-blue-600 text-blue-600 hover:bg-blue-50;
        }

        /* Navigation */
        .menu-item {
            position: relative;
            margin-left: 0rem;
            margin-right: -1.5rem;
            padding-left: 3rem;
            padding-right: 1.5rem;
        }
        
        .menu-item:hover {
            background-color: #f9fafb;
        }

        .nav-link {
            @apply text-gray-700 hover:text-blue-600 px-4 py-2.5 rounded-lg transition-all duration-300 relative mx-1 flex items-center;
        }
        
        .nav-link:hover {
            @apply bg-blue-50;
        }
        
        .nav-link.active {
            @apply text-blue-700 font-medium bg-blue-50;
        }

        .nav-link.active {
            @apply font-semibold after:opacity-100;
        }

        /* Desktop styles */
        @media (min-width: 768px) {
            .mobile-menu {
                top: 100%;
                left: auto;
                right: 1rem;
                transform: translateY(-20px);
                max-width: 280px;
                border-radius: 0.5rem;
                box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
                width: auto;
                min-width: 220px;
                visibility: hidden; /* Ensure it's hidden by default on desktop too */
            }
            
            .mobile-menu a {
                padding: 0.6rem 1.5rem;
            }
            
            .mobile-menu a:hover {
                background-color: #f9fafb;
                color: #1d4ed8;
            }
            
            .mobile-menu a:hover i {
                color: #3b82f6;
            }
        }

    </style>
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-900">
    <!-- Fixed Header Container -->
    <div style="position: relative;">
        <header id="main-header" class="header-transition" style="position: fixed !important; top: 0 !important; left: 0 !important; right: 0 !important; z-index: 50 !important; background-color: rgba(255, 255, 255, 0.95) !important; backdrop-filter: blur(8px) !important; -webkit-backdrop-filter: blur(8px) !important; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05) !important; width: 100% !important; margin: 0 !important; padding: 0 !important;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" x-data="{ mobileOpen: false }">
            <div class="flex items-center justify-between h-20 w-full">
                <!-- Logo -->
                <div class="flex-shrink-0 w-48">
                    <a href="{{ route('home') }}" class="flex items-center group">
                        <img src="{{ asset('images/bcf real logo.png') }}" alt="BCF Church Fellowship Logo" class="h-12 w-auto transition-transform duration-500 group-hover:rotate-6">
                        <div class="ml-3">
                            <p class="text-s font-semibold tracking-wider text-blue-800 uppercase logo-text">BCF Church</p>
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center flex-1 justify-center">
                    <nav class="flex items-center space-x-8">
                        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                            <i class="fas fa-home mr-1"></i> Home
                        </a>
                        <a href="{{ route('announcements.index') }}" class="nav-link {{ request()->routeIs('announcements.*') ? 'active' : '' }}">
                            <i class="fas fa-bullhorn mr-1"></i> Announcements
                        </a>
                        <a href="{{ route('events.index') }}" class="nav-link {{ request()->routeIs('events.*') ? 'active' : '' }}">
                            <i class="fas fa-calendar-alt mr-1"></i> Events
                        </a>
                        <a href="{{ route('schedules.index') }}" class="nav-link {{ request()->routeIs('schedules.*') ? 'active' : '' }}">
                            <i class="fas fa-clock mr-1"></i> Schedule
                        </a>
                        <a href="{{ route('church-people.index') }}" class="nav-link {{ request()->routeIs('church-people.*') ? 'active' : '' }}">
                            <i class="fas fa-users mr-1"></i> Our Team
                        </a>
                    </nav>
                </div>

                <!-- Desktop Menu Button (Far Right Side) -->
                <div class="hidden md:flex items-center w-48 justify-end">
                    <button id="desktop-menu-button" type="button" class="text-gray-700 hover:text-blue-700 focus:outline-none p-2 rounded-full hover:bg-gray-100 transition-colors">
                        <div class="hamburger-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>
                    <!-- Desktop Dropdown Menu - Full Width -->
                    <div id="desktop-dropdown" class="hidden fixed left-0 right-0 top-20 mt-0 w-full bg-white shadow-lg z-50">
                        <div class="w-full">
                            <div class="flex flex-col" role="menu" aria-orientation="vertical" aria-labelledby="desktop-menu-button">
                                <a href="{{ route('home') }}" class="menu-item flex items-center px-6 py-4 text-black hover:bg-gray-100 transition-colors group relative" role="menuitem">
                                    <div class="absolute left-0 top-0 bottom-0 w-1 bg-transparent group-hover:bg-blue-600 transition-colors"></div>
                                    <i class="fas fa-home text-gray-800 w-6"></i>
                                    <span class="ml-3">Home</span>
                                </a>
                                <a href="{{ route('join') }}" class="menu-item flex items-center px-6 py-4 text-black hover:bg-gray-100 transition-colors group relative" role="menuitem">
                                    <div class="absolute left-0 top-0 bottom-0 w-1 bg-transparent group-hover:bg-blue-600 transition-colors"></div>
                                    <i class="fas fa-user-plus text-gray-800 w-6"></i>
                                    <span class="ml-3">Join Us</span>
                                </a>
                                <a href="{{ route('donate') }}" class="menu-item flex items-center px-6 py-4 text-black hover:bg-gray-100 transition-colors group relative" role="menuitem">
                                    <div class="absolute left-0 top-0 bottom-0 w-1 bg-transparent group-hover:bg-blue-600 transition-colors"></div>
                                    <i class="fas fa-hand-holding-heart text-gray-800 w-6"></i>
                                    <span class="ml-3">Donation</span>
                                </a>
                                <a href="{{ route('about') }}" class="menu-item flex items-center px-6 py-4 text-black hover:bg-gray-100 transition-colors group" role="menuitem">
                                    <div class="absolute left-0 top-0 bottom-0 w-1 bg-transparent group-hover:bg-blue-600 transition-colors"></div>
                                    <i class="fas fa-info-circle text-gray-800 w-6"></i>
                                    <span class="ml-3">About Us</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="flex-shrink-0 md:hidden">
                    <button id="mobile-menu-button" type="button"
                        @click="mobileOpen = !mobileOpen"
                        :aria-expanded="mobileOpen.toString()"
                        class="text-gray-700 hover:text-blue-700 focus:outline-none px-4 py-2 transition-transform"
                        aria-controls="mobile-menu">
                        <i class="fas text-2xl transition-all duration-300" :class="mobileOpen ? 'fa-times rotate-90' : 'fa-bars'"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile menu (hidden by default) -->
            <div id="mobile-menu"
                x-show="mobileOpen"
                x-cloak
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 -translate-y-2 max-h-0"
                x-transition:enter-end="opacity-100 translate-y-0 max-h-screen"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 max-h-screen"
                x-transition:leave-end="opacity-0 -translate-y-2 max-h-0"
                @click.outside="mobileOpen = false"
                class="md:hidden overflow-hidden border-t border-gray-100">
                <div class="pt-2 pb-3 space-y-1">
                    <a href="{{ route('home') }}" @click="mobileOpen = false" class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-blue-700 {{ request()->routeIs('home') ? 'bg-gray-50 text-blue-700' : '' }}">
                        <i class="fas fa-home mr-2"></i> Home
                    </a>
                    <a href="{{ route('announcements.index') }}" @click="mobileOpen = false" class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-blue-700 {{ request()->routeIs('announcements.*') ? 'bg-gray-50 text-blue-700' : '' }}">
                        <i class="fas fa-bullhorn mr-2"></i> Announcements
                    </a>
                    <a href="{{ route('events.index') }}" @click="mobileOpen = false" class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-blue-700 {{ request()->routeIs('events.*') ? 'bg-gray-50 text-blue-700' : '' }}">
                        <i class="fas fa-calendar-alt mr-2"></i> Events
                    </a>
                    <a href="{{ route('schedules.index') }}" @click="mobileOpen = false" class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-blue-700 {{ request()->routeIs('schedules.*') ? 'bg-gray-50 text-blue-700' : '' }}">
                        <i class="fas fa-clock mr-2"></i> Schedule
                    </a>
                    <a href="{{ route('church-people.index') }}" @click="mobileOpen = false" class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-blue-700 {{ request()->routeIs('church-people.*') ? 'bg-gray-50 text-blue-700' : '' }}">
                        <i class="fas fa-users mr-2"></i> Our Team
                    </a>
                    <a href="{{ route('join') }}" @click="mobileOpen = false" class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-blue-700 {{ request()->routeIs('join') ? 'bg-gray-50 text-blue-700' : '' }}">
                        <i class="fas fa-user-plus mr-2"></i> Join Us
                    </a>
                    <a href="{{ route('donate') }}" @click="mobileOpen = false" class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-blue-700 {{ request()->routeIs('donate') ? 'bg-gray-50 text-blue-700' : '' }}">
                        <i class="fas fa-hand-holding-heart mr-2"></i> Donation
                    </a>
                    <a href="{{ route('about') }}" @click="mobileOpen = false" class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-blue-700 {{ request()->routeIs('about') ? 'bg-gray-50 text-blue-700' : '' }}">
                        <i class="fas fa-info-circle mr-2"></i> About Us
                    </a>
                </div>
            </div>
        </div>


        </header>
    </div>

    <main class="min-h-screen" style="padding-top: 80px !important; margin-top: 0 !important;">
        <div>
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-blue-900 to-blue-800 text-white mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- About -->
                <div class="space-y-4">
                    <div class="flex items-center">
                        <img src="{{ asset('images/bcf real logo.png') }}" alt="BCF Logo" class="h-12 w-auto">
                        <div class="ml-3">
                            <p class="font-bold text-xl logo-text">BCF Fellowship</p>
                            <p class="text-blue-200 text-sm">Est. 2011</p>
                        </div>
                    </div>
                    <p class="text-blue-100 text-sm">
                        Building a community of believers, growing in faith, and sharing God's love with the world.
                    </p>
                   <div class="flex space-x-4">
                        <a href="https://www.facebook.com/bcfchurch.ph"
                            class="text-blue-200 hover:text-white transition-colors"
                            target="_blank"
                            rel="noopener noreferrer">
                            <i class="fab fa-facebook-f text-lg"></i>
                        </a>

                        <a href="mailto:Bcf.connect@gmail.com" class="text-blue-200 hover:text-white transition-colors">
                            <i class="fas fa-envelope text-lg"></i>
                        </a>
                        
                        <a href="#" class="text-blue-200 hover:text-white transition-colors">
                            <i class="fab fa-instagram text-lg"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-blue-200 hover:text-white transition-colors">Home</a></li>
                        <li><a href="{{ route('announcements.index') }}" class="text-blue-200 hover:text-white transition-colors">Announcements</a></li>
                        <li><a href="{{ route('events.index') }}" class="text-blue-200 hover:text-white transition-colors">Upcoming Events</a></li>
                        <li><a href="{{ route('schedules.index') }}" class="text-blue-200 hover:text-white transition-colors">Service Schedule</a></li>
                        <li><a href="{{ route('church-people.index') }}" class="text-blue-200 hover:text-white transition-colors">Our Team</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                    <address class="not-italic">
                        <div class="flex items-start mb-3">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-blue-300"></i>
                            <span class="text-blue-100">#0912 Paso Santa Maria, Bulacan, Philippines</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <i class="fas fa-phone-alt mr-3 text-blue-300"></i>
                            <span class="text-blue-100">+63 123 456 7890</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-blue-300"></i>
                            <a href="mailto:info@bcffellowship.com" class="text-blue-100 hover:text-white transition-colors">info@bcffellowship.com</a>
                        </div>
                    </address>
                </div>

                <!-- Service Times -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Service Times</h3>
                    <ul class="space-y-2">
                        <li class="flex justify-between">
                            <span class="text-blue-200">Sunday Morning</span>
                            <span class="text-blue-100">9:00 AM - 11:00 AM</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-blue-200">Sunday Evening</span>
                            <span class="text-blue-100">5:00 PM - 7:00 PM</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-blue-200">Wednesday Bible Study</span>
                            <span class="text-blue-100">7:00 PM - 8:30 PM</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-blue-700 mt-12 pt-8 text-center text-blue-200 text-sm">
                <p>&copy; {{ date('Y') }} BCF Church Fellowship. All rights reserved.</p>
            </div>
    </footer>


    @stack('modals')
    @stack('scripts')
    
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                mirror: false
            });
        });
    </script>

    <script>
        // Close desktop menu function
        function closeDesktopMenu() {
            const desktopDropdown = document.getElementById('desktop-dropdown');
            const hamburger = document.querySelector('#desktop-menu-button .hamburger-icon');
            if (desktopDropdown && hamburger) {
                desktopDropdown.classList.add('hidden');
                hamburger.classList.remove('open');
            }
        }
        
        // Simple scroll-based header show/hide
        document.addEventListener('DOMContentLoaded', function() {
            const header = document.getElementById('main-header');
            let lastScroll = 0;
            
            window.addEventListener('scroll', function() {
                const currentScroll = window.pageYOffset;
                
                // At top of page - always show header
                if (currentScroll <= 0) {
                    header.classList.remove('header-hidden');
                    return;
                }
                
                // Scrolling down and past 100px - hide header
                if (currentScroll > lastScroll && currentScroll > 100) {
                    header.classList.add('header-hidden');
                } 
                // Scrolling up - show header
                else if (currentScroll < lastScroll) {
                    header.classList.remove('header-hidden');
                }
                
                lastScroll = currentScroll;
            });
        });

        // Desktop dropdown elements (mobile menu handled by Alpine.js)
        const desktopMenuButton = document.getElementById('desktop-menu-button');
        const desktopDropdown = document.getElementById('desktop-dropdown');

        // Enhanced desktop dropdown menu toggle with pull animation
        desktopMenuButton.addEventListener('click', function(e) {
            e.stopPropagation();
            const hamburger = this.querySelector('.hamburger-icon');
            
            // Toggle hamburger animation
            hamburger.classList.toggle('open');
            
            if (desktopDropdown.classList.contains('hidden')) {
                // Show dropdown with pull-down animation
                desktopDropdown.classList.remove('hidden');
                
                // Trigger animation
                setTimeout(() => {
                    desktopDropdown.style.transform = 'translateY(0) scaleY(1)';
                    desktopDropdown.style.opacity = '1';
                    desktopDropdown.style.visibility = 'visible';
                    
                    // Animate menu items with staggered delay
                    const menuItems = desktopDropdown.querySelectorAll('.menu-item');
                    menuItems.forEach((item, index) => {
                        item.style.setProperty('--i', index);
                        item.style.transitionDelay = `${index * 50}ms`;
                        // Force reflow to ensure the transition is applied
                        void item.offsetWidth;
                    });
                }, 10);
            } else {
                // Hide dropdown with pull-up animation
                desktopDropdown.style.transform = 'translateY(-100%) scaleY(0.9)';
                desktopDropdown.style.opacity = '0';
                desktopDropdown.style.visibility = 'hidden';
                
                // Wait for the animation to complete before hiding
                setTimeout(() => {
                    if (desktopDropdown.style.visibility === 'hidden') {
                        desktopDropdown.classList.add('hidden');
                    }
                }, 400);
            }
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (!desktopMenuButton.contains(event.target) && !desktopDropdown.contains(event.target)) {
                const hamburger = desktopMenuButton.querySelector('.hamburger-icon');
                if (hamburger) {
                    hamburger.classList.remove('open');
                }
                
                // Pull up animation
                desktopDropdown.style.transform = 'translateY(-100%) scaleY(0.9)';
                desktopDropdown.style.opacity = '0';
                desktopDropdown.style.visibility = 'hidden';
                
                // Reset menu items
                const menuItems = desktopDropdown.querySelectorAll('.menu-item');
                menuItems.forEach(item => {
                    item.style.transform = 'translateY(-5px)';
                    item.style.opacity = '0';
                });
                
                // Wait for the animation to complete before hiding
                setTimeout(() => {
                    desktopDropdown.classList.add('hidden');
                }, 400);
            }
        });

        // Close dropdown when pressing Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && !desktopDropdown.classList.contains('hidden')) {
                const hamburger = desktopMenuButton.querySelector('.hamburger-icon');
                if (hamburger) {
                    hamburger.classList.remove('open');
                }
                
                // Pull up animation
                desktopDropdown.style.transform = 'translateY(-100%) scaleY(0.9)';
                desktopDropdown.style.opacity = '0';
                desktopDropdown.style.visibility = 'hidden';
                
                // Reset menu items
                const menuItems = desktopDropdown.querySelectorAll('.menu-item');
                menuItems.forEach(item => {
                    item.style.transform = 'translateY(-5px)';
                    item.style.opacity = '0';
                });
                
                // Wait for the animation to complete before hiding
                setTimeout(() => {
                    if (desktopDropdown.classList.contains('opacity-0')) {
                        desktopDropdown.classList.add('hidden');
                    }
                }, 150);
            }
        });
        
        // Form submission is handled in the community-signup-modal component
        // No duplicate handler needed here
    </script>
</body>
</html>

