<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Church Community - Welcome</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        
        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        
        <!-- Font Awesome for icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
        <style>
            .slide-fade-enter {
                opacity: 0;
            }
            .slide-fade-enter-active {
                transition: opacity 1s ease-in-out;
            }
            .slide-fade-leave-active {
                transition: opacity 1s ease-in-out;
                opacity: 0;
            }
            .worship-bg {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            }
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            .animate-fade-in {
                animation: fadeInUp 1s ease-out;
            }
        </style>
    </head>
    <body class="min-h-screen bg-gray-100">
        <!-- Navigation -->
        <nav class="bg-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <i class="fas fa-church text-purple-600 text-2xl mr-3"></i>
                        <span class="font-bold text-xl text-gray-800">Church Community</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="bg-purple-600 text-white px-4 py-2 rounded-md hover:bg-purple-700 transition">
                                <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-600 hover:text-purple-600 transition">
                                <i class="fas fa-sign-in-alt mr-2"></i>Login
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-purple-600 text-white px-4 py-2 rounded-md hover:bg-purple-700 transition">
                                    <i class="fas fa-user-plus mr-2"></i>Register
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Slideshow Hero Section -->
        <section class="relative h-screen overflow-hidden">
            <div id="slideshow" class="relative h-full">
                <!-- Slides will be dynamically inserted here -->
            </div>
            
            <!-- Slideshow Indicators -->
            <div id="slideshow-indicators" class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-2 z-20">
                <!-- Indicators will be dynamically inserted here -->
            </div>
            
            <!-- Manual Navigation -->
            <button id="prev-slide" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/20 backdrop-blur-sm text-white p-3 rounded-full hover:bg-white/30 transition z-20">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button id="next-slide" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/20 backdrop-blur-sm text-white p-3 rounded-full hover:bg-white/30 transition z-20">
                <i class="fas fa-chevron-right"></i>
            </button>
        </section>

        <!-- Welcome Section -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Welcome to Our Church Community</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto mb-8">
                    Join us in worship, fellowship, and service. Experience the love of Christ in a caring community where everyone is welcome.
                </p>
                <div class="grid md:grid-cols-3 gap-8 mt-12">
                    <div class="text-center">
                        <i class="fas fa-praying-hands text-purple-600 text-4xl mb-4"></i>
                        <h3 class="text-xl font-semibold mb-2">Worship</h3>
                        <p class="text-gray-600">Join our uplifting worship services every Sunday</p>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-users text-purple-600 text-4xl mb-4"></i>
                        <h3 class="text-xl font-semibold mb-2">Community</h3>
                        <p class="text-gray-600">Connect with others through fellowship and service</p>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-heart text-purple-600 text-4xl mb-4"></i>
                        <h3 class="text-xl font-semibold mb-2">Service</h3>
                        <p class="text-gray-600">Make a difference through our outreach programs</p>
                    </div>
                </div>
            </div>
        </section>
    </body>

    <script>
        // Default slides if none exist in database
        const defaultSlides = [
            {
                image_url: 'https://images.unsplash.com/photo-1515522683264-b826b5d8e61c?w=1920&h=1080&fit=crop',
                tagline: 'Experience the Joy of Worship Together'
            },
            {
                image_url: 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=1920&h=1080&fit=crop',
                tagline: 'Growing in Faith and Community'
            },
            {
                image_url: 'https://images.unsplash.com/photo-1513836279014-a89f7a76ae86?w=1920&h=1080&fit=crop',
                tagline: 'Serving Others with Love and Compassion'
            },
            {
                image_url: 'https://images.unsplash.com/photo-1511739001486-6bfe10ce785f?w=1920&h=1080&fit=crop',
                tagline: 'Building Lifelong Friendships in Faith'
            },
            {
                image_url: 'https://images.unsplash.com/photo-1516473169283-a5a3844f9b69?w=1920&h=1080&fit=crop',
                tagline: 'Celebrating God\'s Love Through Music'
            }
        ];

        let currentSlide = 0;
        let slides = [];
        let slideInterval;

        // Initialize slideshow
        function initSlideshow() {
            // Try to fetch slides from API, fallback to defaults
            fetch('/api/slideshows/active')
                .then(response => response.json())
                .then(data => {
                    slides = data.length > 0 ? data : defaultSlides;
                    renderSlideshow();
                    startAutoSlide();
                })
                .catch(error => {
                    console.log('Using default slides:', error);
                    slides = defaultSlides;
                    renderSlideshow();
                    startAutoSlide();
                });
        }

        // Render slideshow
        function renderSlideshow() {
            const slideshowContainer = document.getElementById('slideshow');
            const indicatorsContainer = document.getElementById('slideshow-indicators');
            
            // Clear existing content
            slideshowContainer.innerHTML = '';
            indicatorsContainer.innerHTML = '';
            
            // Create slides
            slides.forEach((slide, index) => {
                const slideDiv = document.createElement('div');
                slideDiv.className = `absolute inset-0 transition-opacity duration-1000 ${index === 0 ? 'opacity-100' : 'opacity-0'}`;
                slideDiv.innerHTML = `
                    <img src="${slide.image_url}" alt="${slide.tagline}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/40"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-center text-white px-4">
                            <h1 class="text-4xl md:text-6xl font-bold mb-4 animate-fade-in">${slide.tagline}</h1>
                            <p class="text-xl md:text-2xl animate-fade-in" style="animation-delay: 0.5s">
                                Join us this Sunday for an inspiring service
                            </p>
                        </div>
                    </div>
                `;
                slideshowContainer.appendChild(slideDiv);
                
                // Create indicator
                const indicator = document.createElement('button');
                indicator.className = `w-3 h-3 rounded-full transition-all duration-300 ${index === 0 ? 'bg-white w-8' : 'bg-white/50'}`;
                indicator.onclick = () => goToSlide(index);
                indicatorsContainer.appendChild(indicator);
            });
        }

        // Go to specific slide
        function goToSlide(index) {
            const slideElements = document.querySelectorAll('#slideshow > div');
            const indicators = document.querySelectorAll('#slideshow-indicators button');
            
            // Hide current slide
            slideElements[currentSlide].classList.remove('opacity-100');
            slideElements[currentSlide].classList.add('opacity-0');
            indicators[currentSlide].classList.remove('bg-white', 'w-8');
            indicators[currentSlide].classList.add('bg-white/50');
            
            // Show new slide
            currentSlide = index;
            slideElements[currentSlide].classList.remove('opacity-0');
            slideElements[currentSlide].classList.add('opacity-100');
            indicators[currentSlide].classList.remove('bg-white/50');
            indicators[currentSlide].classList.add('bg-white', 'w-8');
            
            // Reset auto-slide timer
            resetAutoSlide();
        }

        // Next slide
        function nextSlide() {
            const nextIndex = (currentSlide + 1) % slides.length;
            goToSlide(nextIndex);
        }

        // Previous slide
        function prevSlide() {
            const prevIndex = (currentSlide - 1 + slides.length) % slides.length;
            goToSlide(prevIndex);
        }

        // Start auto-slide
        function startAutoSlide() {
            slideInterval = setInterval(nextSlide, 2000);
        }

        // Reset auto-slide
        function resetAutoSlide() {
            clearInterval(slideInterval);
            startAutoSlide();
        }

        // Event listeners
        document.getElementById('next-slide').addEventListener('click', nextSlide);
        document.getElementById('prev-slide').addEventListener('click', prevSlide);

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', initSlideshow);
        
        // Pause on hover
        document.getElementById('slideshow').addEventListener('mouseenter', () => clearInterval(slideInterval));
        document.getElementById('slideshow').addEventListener('mouseleave', startAutoSlide);
    </script>
</html>
