@extends('layouts.app')

@section('title', 'Home - BCF Church Fellowship')
@section('meta_description', 'BCF Church Fellowship - Building a community of believers in Paso Santa Maria, Bulacan. Join us for worship, fellowship, and spiritual growth.')

@section('content')

<style>
    /* Import engaging fonts */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
    
    /*a Feature Cards */
    .feature-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }
    
    .feature-card {
        background: linear-gradient(145deg, #1e40af, #1e3a8a);
        border-radius: 20px;
        padding: 2.5rem 2rem;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 15px 30px -10px rgba(30, 58, 138, 0.2);
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.1);
        transform: translateY(0);
        z-index: 1;
    }
    
    .feature-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
        z-index: -1;
    }
    
    .feature-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 50px -12px rgba(30, 58, 138, 0.3);
    }
    
    .feature-card:hover::before {
        opacity: 1;
    }
    
    .feature-icon {
        width: 70px;
        height: 70px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.75rem;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }
    
    .feature-icon::after {
        content: '';
        position: absolute;
        top: -5px;
        left: -5px;
        right: -5px;
        bottom: -5px;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.1));
        border-radius: 24px;
        opacity: 0;
        transition: opacity 0.4s ease;
    }
    
    .feature-card:hover .feature-icon {
        transform: scale(1.08);
        background: rgba(255, 255, 255, 0.15);
    }
    
    .feature-card:hover .feature-icon::after {
        opacity: 1;
    }
    
    .feature-icon i {
        font-size: 1.75rem;
        color: white;
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .feature-card:hover .feature-icon i {
        transform: scale(1.15);
    }
    
    .feature-card h3 {
        color: white;
        font-size: 1.625rem;
        font-weight: 700;
        margin-bottom: 1.25rem;
        position: relative;
        display: inline-block;
    }
    
    .feature-card h3::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 50px;
        height: 3px;
        background: rgba(255, 255, 255, 0.5);
        border-radius: 3px;
        transition: width 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .feature-card:hover h3::after {
        width: 70px;
    }
    
    .feature-card p {
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 2rem;
        line-height: 1.7;
        font-size: 1.05rem;
        transition: color 0.3s ease;
    }
    
    .feature-card .btn {
        display: inline-flex;
        align-items: center;
        background: white;
        color: #1e40af;
        padding: 0.75rem 1.75rem;
        border-radius: 9999px;
        font-weight: 600;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        z-index: 1;
        box-shadow: 0 4px 15px -3px rgba(59, 130, 246, 0.3);
    }
    
    .feature-card .btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #ffffff, #f0f4ff);
        z-index: -1;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .feature-card .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.4);
    }
    
    .feature-card .btn:active {
        transform: translateY(-1px);
    }
    
    .feature-card .btn i {
        transition: transform 0.3s ease;
        margin-left: 0.5rem;
    }
    
    .feature-card .btn:hover i {
        transform: translateX(3px);
    }
    
    * {
        font-family: 'Poppins', sans-serif;
    }
    /* CSS Variables */
    :root {
        --primary-color: #1e40af;
        --primary-dark: #1e3a8a;
        --primary-light: #3b82f6;
        --text-light: #ffffff;
        --text-muted: #e2e8f0;
        --glass-bg: rgba(30, 64, 175, 0.3);
        --glass-border: rgba(255, 255, 255, 0.2);
    }

    /* Advanced Animations */
    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    @keyframes morphing {
        0%, 100% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
        50% { border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%; }
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        33% { transform: translateY(-20px) rotate(2deg); }
        66% { transform: translateY(10px) rotate(-2deg); }
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.05); opacity: 0.8; }
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(60px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-60px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(60px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes gateSlideLeft {
        from {
            opacity: 0;
            transform: translateX(-100px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateX(0) scale(1);
        }
    }

    @keyframes gateSlideRight {
        from {
            opacity: 0;
            transform: translateX(100px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateX(0) scale(1);
        }
    }

    @keyframes glow {
        0%, 100% {
            box-shadow: 0 0 20px rgba(102, 126, 234, 0.4),
                        0 0 40px rgba(102, 126, 234, 0.2),
                        0 0 60px rgba(102, 126, 234, 0.1);
        }
        50% {
            box-shadow: 0 0 30px rgba(102, 126, 234, 0.6),
                        0 0 50px rgba(102, 126, 234, 0.3),
                        0 0 70px rgba(102, 126, 234, 0.2);
        }
    }

    @keyframes particle {
        0% {
            transform: translateY(0) translateX(0) scale(0);
            opacity: 0;
        }
        10% {
            opacity: 1;
        }
        100% {
            transform: translateY(-100vh) translateX(100px) scale(1);
            opacity: 0;
        }
    }

    /* Utility Classes */
    .gradient-bg {
        background: var(--primary-gradient);
        background-size: 400% 400%;
        animation: gradientShift 15s ease infinite;
    }

    .glass-effect {
        background: var(--glass-bg);
        backdrop-filter: blur(10px);
        border: 1px solid var(--glass-border);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    }

    .morphing-shape {
        animation: morphing 8s ease-in-out infinite;
    }

    .floating {
        animation: float 6s ease-in-out infinite;
    }

    .pulsing {
        animation: pulse 2s ease-in-out infinite;
    }

    .glowing {
        animation: glow 2s ease-in-out infinite;
    }

    .slide-up {
        animation: slideInUp 0.8s ease-out forwards;
    }

    .slide-left {
        animation: slideInLeft 0.8s ease-out forwards;
    }

    .slide-right {
        animation: slideInRight 0.8s ease-out forwards;
    }

    .gate-slide-left {
        animation: gateSlideLeft 1s ease-out forwards;
    }

    .gate-slide-right {
        animation: gateSlideRight 1s ease-out forwards;
    }

    /* Card Styles */
    .modern-card {
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border: 2px solid #e5e7eb;
        overflow: hidden;
    }
    
    .modern-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(30, 64, 175, 0.15);
    }
    
    .card-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .card-icon {
        width: 40px;
        height: 40px;
        background: var(--primary-color);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        flex-shrink: 0;
    }
    
    .announcement-item, .event-item {
        padding: 1rem;
        border-radius: 12px;
        margin-bottom: 0.75rem;
        transition: all 0.2s ease;
        border: 1px solid transparent;
    }
    
    .announcement-item:hover, .event-item:hover {
        background: rgba(30, 64, 175, 0.05);
        border-color: rgba(30, 64, 175, 0.1);
        transform: translateX(5px);
    }
    
    .announcement-title, .event-title {
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
        font-size: 1.1rem;
        line-height: 1.4;
    }
    
    .announcement-meta, .event-meta {
        font-size: 0.9rem;
        color: #64748b;
        line-height: 1.5;
    }
    
    .view-all-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
        transition: all 0.2s ease;
        font-size: 1rem;
    }
    
    .view-all-link:hover {
        color: var(--primary-dark);
        gap: 0.75rem;
        transform: translateX(3px);
    }

    /* Feature Grid */
    .feature-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 6rem;
        margin-top: 3rem;
    }
    
    .feature-card {
        background: white;
        color: #1e40af;
        padding: 2.5rem;
        border-radius: 20px;
        text-align: center;
        transition: all 0.3s ease;
        border: 2px solid #e5e7eb;
        position: relative;
        overflow: hidden;
        min-height: 250px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
    }
    
    .feature-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        background: white;
        cursor: pointer;
    }
    
    .feature-icon {
        width: 60px;
        height: 60px;
        background: #1e40af;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 1.5rem;
        color: white;
        transition: all 0.3s ease;
    }
    
    .feature-card:hover .feature-icon {
        transform: scale(1.1) rotate(5deg);
        background: #2563eb;
    }
    
    .feature-card h3 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: #1e40af;
        line-height: 1.3;
    }
    
    .feature-card p {
        color: #64748b;
        line-height: 1.6;
        font-size: 1rem;
        font-weight: 400;
    }
    
    .feature-btn {
        background: #1e40af;
        color: white;
        border: 2px solid #1e40af;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-top: auto;
        backdrop-filter: blur(10px);
        text-decoration: none;
        min-width: 140px;
    }
    
    .feature-btn:hover {
        background: #2563eb;
        border-color: #2563eb;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(30, 64, 175, 0.3);
    }
    
    .feature-btn:active {
        transform: translateY(0);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }
    
    .modern-btn {
        padding: 1rem 2rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1.1rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        transition: all 0.3s ease;
        border: 2px solid transparent;
        position: relative;
        overflow: hidden;
        letter-spacing: 0.01em;
        white-space: nowrap;
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        transform: translateY(0);
    }
    
    .modern-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
    }
    
    .modern-btn:active {
        transform: translateY(0);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }
    
    .btn-primary {
        background: var(--text-light);
        color: var(--primary-color);
        border: 2px solid var(--text-light);
    }
    
    .btn-primary:hover {
        background: #f8fafc;
        border-color: #f8fafc;
    }
    
    .btn-secondary {
        background: transparent;
        color: var(--text-light);
        border: 2px solid var(--text-light);
        backdrop-filter: blur(10px);
    }
    
    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.8);
    }

    /* Particle Background */
    .particle {
        position: fixed;
        pointer-events: none;
        opacity: 0;
        z-index: 1;
    }

    .particle-1 {
        width: 4px;
        height: 4px;
        background: rgba(102, 126, 234, 0.6);
        animation: particle 8s linear infinite;
        animation-delay: 0s;
    }

    .particle-2 {
        width: 6px;
        height: 6px;
        background: rgba(118, 75, 162, 0.6);
        animation: particle 10s linear infinite;
        animation-delay: 2s;
    }

    .particle-3 {
        width: 3px;
        height: 3px;
        background: rgba(240, 147, 251, 0.6);
        animation: particle 12s linear infinite;
        animation-delay: 4s;
    }

    /* Delay Classes */
    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-300 { animation-delay: 0.3s; }
    .delay-400 { animation-delay: 0.4s; }
    .delay-500 { animation-delay: 0.5s; }
    .delay-600 { animation-delay: 0.6s; }
    .delay-700 { animation-delay: 0.7s; }
    .delay-800 { animation-delay: 0.8s; }

    /* Section Spacing */
    .section-spacing {
        padding: 5rem 0;
    }
    
    /* Animation Classes */
    .lazy-section {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.7s ease-out;
        will-change: opacity, transform;
    }

    .lazy-section.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    .slide-up {
        opacity: 0;
        transform: translateY(40px);
        transition: all 0.6s ease-out;
    }

    .slide-up.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    .fade-in {
        opacity: 0;
        transition: opacity 0.6s ease-out;
    }

    .fade-in.is-visible {
        opacity: 1;
    }

    .delay-100 { transition-delay: 0.1s; }
    .delay-200 { transition-delay: 0.2s; }
    .delay-300 { transition-delay: 0.3s; }
    .delay-400 { transition-delay: 0.4s; }

    /* Responsive Typography */
    .hero-title {
        font-size: clamp(1.5rem, 4vw, 3rem);
        line-height: 1.3;
        font-weight: 700;
        text-align: center !important;
        margin-left: auto !important;
        margin-right: auto !important;
        width: 100% !important;
        display: block !important;
        position: relative !important;
        left: 0 !important;
        right: 0 !important;
        letter-spacing: 0.02em;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        margin-bottom: 1rem !important;
    }

    .hero-subtitle {
        font-size: clamp(0.9rem, 2vw, 1.1rem);
        line-height: 1.7;
        font-weight: 400;
        letter-spacing: 0.01em;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        margin-bottom: 1.5rem !important;
    }

    /* Scroll Indicator */
    .scroll-indicator {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        width: 30px;
        height: 50px;
        border: 2px solid rgba(255, 255, 255, 0.8);
        border-radius: 25px;
        display: flex;
        justify-content: center;
        padding-top: 10px;
    }

    .scroll-indicator::before {
        content: '';
        width: 4px;
        height: 10px;
        background: white;
        border-radius: 2px;
        animation: scroll 2s infinite;
    }

    @keyframes scroll {
        0% { transform: translateY(0); opacity: 1; }
        100% { transform: translateY(15px); opacity: 0; }
    }

    /* Stats Section */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px;
        margin: 60px 0;
    }
    
    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
    }
    
    @media (max-width: 480px) {
        .stats-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }
    }

    .stat-item {
        text-align: center;
        padding: 30px;
        border-radius: 15px;
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
    }

    .stat-item:hover {
        transform: translateY(-5px);
        background: rgba(255, 255, 255, 0.1);
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 800;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .stat-label {
        font-size: 1.1rem;
        color: rgba(255, 255, 255, 0.8);
        margin-top: 10px;
    }
    
    /* Carousel Text Styles */
    #church-family-carousel .carousel-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
        color: #ffffff !important;
        text-shadow: 0 1px 3px rgba(0,0,0,0.5) !important;
    }
    
    #church-family-carousel .carousel-description {
        color: #e2e8f0 !important;
        font-size: 1rem;
        line-height: 1.5;
    }
</style>



<!-- Modern Hero Section -->
<section class="min-h-screen flex items-center justify-center relative overflow-hidden" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset('images/worship1.jpeg') }}') !important; background-size: cover !important; background-position: center !important; background-repeat: no-repeat !important;">
    <!-- Background Elements Removed -->
    <div class="absolute inset-0">
    </div>
    
    <!-- Hero Content -->
    <div class="relative z-5 text-center px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto mt-8">
        <!-- Church Logo -->
        <div class="mb-8" style="margin-top: 3rem;">
            <div class="inline-block">
                <img src="{{ asset('images/bcf real logo.png') }}" alt="BCF Church Fellowship Logo" class="w-24 h-24 sm:w-32 sm:h-32 object-contain filter drop-shadow-2xl">
            </div>
        </div>
        
        <!-- Main Title -->
        <div class="w-full text-center" style="text-align: center !important;">
            <h1 class="hero-title text-white slide-up" style="text-align: center !important; margin: 0 auto !important; display: block !important;">
                Welcome to <span class="text-white font-bold">Breakthrough Christian Fellowship</span>
            </h1>
        </div>
        
        <!-- Subtitle -->
        <p class="hero-subtitle text-white max-w-3xl mx-auto slide-up delay-200">
            Experience the transformative power of faith, community, and worship. Join us as we grow together in Christ's love and serve our community with compassion and joy.
        </p>
        
        <!-- CTA Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12 slide-up delay-300">
            <a href="{{ route('live-stream') }}" class="modern-btn btn-primary text-lg px-8 py-4">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Watch Live Service
            </a>
            <a href="{{ route('events.index') }}" class="modern-btn btn-secondary text-lg px-8 py-4">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                Upcoming Events
            </a>
        </div>
        
        <!-- Stats Section -->
        <div class="stats-grid slide-up delay-400">
            <div class="stat-item">
                <div class="stat-number">14+</div>
                <div class="stat-label">Years of Ministry</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">150+</div>
                <div class="stat-label">Church Members</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">2</div>
                <div class="stat-label">Weekly Services</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">24/7</div>
                <div class="stat-label">Prayer Support</div>
            </div>
        </div>
    </div>
    
    </section>

<!-- Features Section -->
<section class="bg-white py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold mb-4 text-blue-800">
                What We Offer
            </h2>
            <p class="text-xl max-w-3xl mx-auto text-gray-600">
                Discover the various ways you can connect, grow, and serve with our church community
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Worship Feature -->
            <div class="relative bg-gradient-to-br from-blue-600 to-indigo-800 rounded-2xl p-8 text-white transform transition-all duration-500 hover:scale-[1.02] hover:shadow-2xl hover:shadow-blue-500/20 overflow-hidden group"
                 data-aos="fade-up"
                 data-aos-delay="100">
                <!-- Hover effect overlay -->
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 to-indigo-700/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mb-6 transition-all duration-500 group-hover:bg-white/30 group-hover:scale-110">
                        <i class="fas fa-praying-hands text-2xl transform group-hover:scale-110 transition-transform"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Inspiring Worship</h3>
                    <p class="text-blue-100 mb-6">
                        Experience powerful worship services that lift your spirit and draw you closer to God through contemporary music and heartfelt praise.
                    </p>
                    <a href="{{ route('about') }}" class="inline-flex items-center text-blue-100 hover:text-white font-medium transition-all duration-300 hover:translate-x-1">
                        Learn More <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                </div>
            </div>
            
            <!-- Community Feature -->
            <div class="relative bg-gradient-to-br from-purple-600 to-indigo-800 rounded-2xl p-8 text-white transform transition-all duration-500 hover:scale-[1.02] hover:shadow-2xl hover:shadow-purple-500/20 overflow-hidden group"
                 data-aos="fade-up"
                 data-aos-delay="200">
                <!-- Hover effect overlay -->
                <div class="absolute inset-0 bg-gradient-to-br from-purple-500/10 to-indigo-700/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mb-6 transition-all duration-500 group-hover:bg-white/30 group-hover:scale-110">
                    <i class="fas fa-users text-2xl transform group-hover:scale-110 transition-transform"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Vibrant Community</h3>
                    <p class="text-purple-100 mb-6">
                        Join a loving family where you can build lasting friendships, find support, and grow together in faith and fellowship.
                    </p>
                    <a href="{{ route('join') }}" class="inline-flex items-center text-purple-100 hover:text-white font-medium transition-all duration-300 hover:translate-x-1">
                        Join Us <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                </div>
            </div>
            
            <!-- Service & Outreach Feature -->
            <div class="relative bg-gradient-to-br from-green-600 to-indigo-700 rounded-2xl p-8 text-white transform transition-all duration-500 hover:scale-[1.02] hover:shadow-2xl hover:shadow-indigo-500/20 overflow-hidden group"
                 data-aos="fade-up"
                 data-aos-delay="300">
                <!-- Hover effect overlay -->
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/10 to-blue-700/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mb-6 transition-all duration-500 group-hover:bg-white/30 group-hover:scale-110">
                    <i class="fas fa-hands-helping text-2xl transform group-hover:scale-110 transition-transform"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Service & Outreach</h3>
                    <p class="text-green-100 mb-6">
                        Make a difference in our community through various service opportunities and outreach programs that share God's love in practical ways.
                    </p>
                    <a href="{{ route('donate') }}" class="inline-flex items-center text-green-100 hover:text-white font-medium transition-all duration-300 hover:translate-x-1">
                        Get Involved <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Church Family Carousel Section -->

<section id="church-family-carousel" class="py-16 md:py-24 relative overflow-hidden" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);">
    <!-- Decorative Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -right-20 -top-20 w-64 h-64 bg-blue-500/5 rounded-full filter blur-3xl"></div>
        <div class="absolute -left-20 -bottom-20 w-72 h-72 bg-indigo-500/5 rounded-full filter blur-3xl"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col lg:flex-row gap-12 items-center">
            <!-- Left Column - Text Content -->
            <div class="w-full lg:w-5/12">
                <div class="max-w-lg mx-auto lg:mx-0">
                    <h2 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">
                        Experience the <span class="text-blue-300">Warmth</span> of Our Church Family
                    </h2>
                    <p class="text-lg text-blue-100 mb-8 leading-relaxed">
                        Join our vibrant community where faith grows, relationships flourish, and lives are transformed through the love of Christ.
                    </p>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <div class="w-10 h-10 rounded-full bg-blue-500/20 flex items-center justify-center">
                                    <i class="fas fa-hands-praying text-blue-300"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-xl font-semibold text-white mb-1">Inspiring Worship</h3>
                                <p class="text-blue-100">Experience the presence of God through our uplifting worship services.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <div class="w-10 h-10 rounded-full bg-blue-500/20 flex items-center justify-center">
                                    <i class="fas fa-people-group text-blue-300"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-xl font-semibold text-white mb-1">Loving Community</h3>
                                <p class="text-blue-100">Connect with others and build meaningful relationships.</p>
                            </div>
                        </div>

                         <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <div class="w-10 h-10 rounded-full bg-blue-500/20 flex items-center justify-center">
                                    <i class="fas fa-hands-helping text-blue-300"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-xl font-semibold text-white mb-1">Service & Outreach</h3>
                                <p class="text-blue-100">Connect with us through acts of worship</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Carousel -->
            <div class="w-full lg:w-7/12 relative">
                <div class="relative overflow-hidden rounded-2xl bg-transparent">
                    <div id="gallery-carousel" class="relative w-full h-[500px] overflow-visible">
                        <!-- Carousel Items -->
                        <div class="carousel-item absolute inset-0 w-full h-full transition-all duration-700 ease-in-out opacity-100" data-index="0" style="opacity: 1;">
                            <div class="w-full h-full flex items-center justify-center">
                                <img src="{{ asset('images/churchAct1.jpg') }}"
                                     alt="Worship Service"
                                     class="rounded-2xl mx-auto h-full w-auto object-contain"
                                     style="max-width: 100%; max-height: 100%; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);"
                                     loading="eager"
                                     onerror="console.error('Error loading image:', this.src); this.src='https://placehold.co/800x500/1e40af/ffffff?text=Worship+Service'">
                            </div>
                        </div>
                        
                        <div class="carousel-item absolute inset-0 w-full h-full transition-all duration-700 ease-in-out opacity-0" data-index="1">
                            <div class="w-full h-full flex items-center justify-center">
                                <img src="{{ asset('images/churchAct2.jpg') }}"
                                     alt="Community Gathering"
                                     class="rounded-2xl mx-auto h-full w-auto object-contain"
                                     style="max-width: 100%; max-height: 100%; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);"
                                     loading="eager"
                                     onerror="console.error('Error loading image:', this.src); this.src='https://placehold.co/800x500/7e22ce/ffffff?text=Community+Gathering'">
                            </div>
                        </div>
                        
                        <div class="carousel-item absolute inset-0 w-full h-full transition-all duration-700 ease-in-out opacity-0" data-index="2">
                            <div class="w-full h-full flex items-center justify-center">
                                <img src="{{ asset('images/churchAct3.jpg') }}"
                                     alt="Bible Study"
                                     class="rounded-2xl mx-auto h-full w-auto object-contain"
                                     style="max-width: 100%; max-height: 100%; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);"
                                     loading="eager"
                                     onerror="console.error('Error loading image:', this.src); this.src='https://placehold.co/800x500/7e22ce/ffffff?text=Bible+Study'">
                            </div>
                        </div>
                    </div>
                    <!-- Carousel Indicators -->
                    <div class="absolute bottom-1 left-0 right-0 flex justify-center space-x-2 z-10">
                        <button class="carousel-indicator w-10 h-1.5 rounded-full bg-black/30 hover:bg-black/70 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50" data-slide-to="0" aria-label="Go to slide 1"></button>
                        <button class="carousel-indicator w-10 h-1.5 rounded-full bg-black/30 hover:bg-black/70 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50" data-slide-to="1" aria-label="Go to slide 2"></button>
                        <button class="carousel-indicator w-10 h-1.5 rounded-full bg-black/30 hover:bg-black/70 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50" data-slide-to="2" aria-label="Go to slide 3"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Announcements & Events Section -->
<section class="py-20 bg-white lazy-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-24">
            
            <!-- Announcements Card -->
            <div class="modern-card slide-left mt-8">
                <div class="p-8">
                    <div class="flex items-center mb-6">
                        <div class="p-3 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl mr-4">
                            <i class="fas fa-bullhorn text-white text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Latest Announcements</h2>
                    </div>
                    
                    @if($announcements->count() > 0)
                        <div class="space-y-4">
                            @foreach($announcements->take(3) as $index => $announcement)
                                <a href="{{ route('announcements.show', $announcement->id) }}" class="block p-4 rounded-lg bg-gradient-to-r from-blue-50 to-transparent hover:from-blue-100 transition-all duration-300 group">
                                    <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">
                                        {{ $announcement->title }}
                                    </h3>
                                    <p class="text-sm text-gray-600 mt-1">
                                        <i class="far fa-calendar mr-2"></i>
                                        {{ $announcement->published_at ? $announcement->published_at->format('M d, Y') : $announcement->created_at->format('M d, Y') }}
                                    </p>
                                </a>
                            @endforeach
                        </div>
                        <div class="mt-6">
                            <a href="{{ route('announcements.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-semibold group">
                                View all announcements
                                <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    @else
                        <div class="text-center py-8">
                            <i class="fas fa-bullhorn text-gray-300 text-4xl mb-4"></i>
                            <p class="text-gray-600">No announcements at this time.</p>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Events Card -->
            <div class="modern-card slide-right mt-8">
                <div class="p-8">
                    <div class="flex items-center mb-6">
                        <div class="p-3 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl mr-4">
                            <i class="fas fa-calendar-alt text-white text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Upcoming Events</h2>
                    </div>
                    
                    @if($upcomingEvents->count() > 0)
                        <div class="space-y-4">
                            @foreach($upcomingEvents->take(3) as $index => $event)
                                <a href="{{ route('events.show', $event->id) }}" class="block p-4 rounded-lg bg-gradient-to-r from-purple-50 to-transparent hover:from-purple-100 transition-all duration-300 group">
                                    <h3 class="text-lg font-semibold text-gray-800 group-hover:text-purple-600 transition-colors">
                                        {{ $event->title }}
                                    </h3>
                                    <p class="text-sm text-gray-600 mt-1">
                                        <i class="far fa-clock mr-2"></i>
                                        {{ $event->event_date->format('M d, Y g:i A') }}
                                    </p>
                                    @if($event->location)
                                        <p class="text-sm text-gray-600 mt-1">
                                            <i class="fas fa-map-marker-alt mr-2"></i>
                                            {{ $event->location }}
                                        </p>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                        <div class="mt-6">
                            <a href="{{ route('events.index') }}" class="inline-flex items-center text-purple-600 hover:text-purple-800 font-semibold group">
                                View all events
                                <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    @else
                        <div class="text-center py-8">
                            <i class="fas fa-calendar-alt text-gray-300 text-4xl mb-4"></i>
                            <p class="text-gray-600">No upcoming events at this time.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Live Stream CTA -->
        <div class="mt-12 text-center">
            <div class="inline-block p-1 rounded-2xl" style="background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%);">
                <div class="bg-white rounded-2xl p-8">
                    <h2 class="text-3xl font-bold mb-4" style="color: #1e40af; line-height: 1.3;">
                        Join Our Live Stream
                    </h2>
                    <p class="text-lg mb-6 max-w-2xl mx-auto" style="color: #64748b; line-height: 1.6;">
                        Can't make it to church? Join us online for our live worship services and experience the presence of God from anywhere in the world.
                    </p>
                    <a href="{{ route('live-stream') }}" class="modern-btn btn-primary text-lg px-8 py-4">
                        <i class="fas fa-play mr-2"></i>
                        Watch Live Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Carousel functionality
    class ChurchCarousel {
        constructor() {
            this.carousel = document.getElementById('gallery-carousel');
            if (!this.carousel) return;
            
            this.items = Array.from(document.querySelectorAll('.carousel-item'));
            this.prevBtn = document.getElementById('prevBtn');
            this.nextBtn = document.getElementById('nextBtn');
            this.indicators = document.querySelectorAll('.carousel-indicator');
            this.currentIndex = 0;
            this.isTransitioning = false;
            this.autoSlideInterval = null;
            this.slideDuration = 5000; // 5 seconds
            
            this.init();
        }
        
        init() {
            console.log('Initializing carousel...');
            
            // Set initial state
            this.items.forEach((item, index) => {
                if (index === 0) {
                    item.style.opacity = '1';
                    item.style.transform = 'translateX(0)';
                    item.style.zIndex = '2';
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'translateX(100%)';
                    item.style.zIndex = '1';
                }
                item.style.transition = 'opacity 0.7s ease, transform 0.7s cubic-bezier(0.16, 1, 0.3, 1)';
                item.style.willChange = 'opacity, transform';
                
                // Debug image loading
                const img = item.querySelector('img');
                if (img) {
                    img.onload = () => console.log(`Image loaded: ${img.src}`);
                    img.onerror = () => console.error(`Error loading image: ${img.src}`);
                }
            });
            
            // Set up event listeners
            if (this.prevBtn) this.prevBtn.addEventListener('click', () => this.prevSlide());
            if (this.nextBtn) this.nextBtn.addEventListener('click', () => this.nextSlide());
            
            // Touch events for mobile
            this.carousel.addEventListener('touchstart', (e) => this.handleTouchStart(e), { passive: true });
            this.carousel.addEventListener('touchend', (e) => this.handleTouchEnd(e), { passive: true });
            
            // Keyboard navigation
            document.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') this.prevSlide();
                if (e.key === 'ArrowRight') this.nextSlide();
            });
            
            // Indicator clicks
            this.indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => this.goToSlide(index));
            });
            
            // Start auto-slide
            this.startAutoSlide();
            
            // Pause on hover
            this.carousel.addEventListener('mouseenter', () => this.pauseAutoSlide());
            this.carousel.addEventListener('mouseleave', () => this.startAutoSlide());
        }
        
        showSlide(index) {
            if (this.isTransitioning || index < 0 || index >= this.items.length) return;
            
            this.isTransitioning = true;
            const direction = index > this.currentIndex ? 1 : -1;
            const currentSlide = this.items[this.currentIndex];
            const nextSlide = this.items[index];
            
            // Set up initial states
            nextSlide.style.transform = direction === 1 ? 'translateX(100%)' : 'translateX(-100%)';
            nextSlide.style.opacity = '1';
            nextSlide.style.zIndex = '2';
            
            // Animate
            requestAnimationFrame(() => {
                if (currentSlide) {
                    currentSlide.style.transform = direction === 1 ? 'translateX(-100%)' : 'translateX(100%)';
                    currentSlide.style.opacity = '0';
                }
                
                nextSlide.style.transform = 'translateX(0)';
                this.currentIndex = index;
                this.updateIndicators();
                
                // Reset transition flag
                setTimeout(() => {
                    if (currentSlide) {
                        currentSlide.style.zIndex = '1';
                    }
                    this.isTransitioning = false;
                }, 700);
            });
        }
        
        nextSlide() {
            const nextIndex = (this.currentIndex + 1) % this.items.length;
            this.showSlide(nextIndex);
            this.resetAutoSlide();
        }
        
        prevSlide() {
            const prevIndex = (this.currentIndex - 1 + this.items.length) % this.items.length;
            this.showSlide(prevIndex);
            this.resetAutoSlide();
        }
        
        goToSlide(index) {
            if (index === this.currentIndex) return;
            this.showSlide(index);
            this.resetAutoSlide();
        }
        
        updateIndicators() {
            this.indicators.forEach((indicator, index) => {
                indicator.classList.toggle('bg-white/70', index === this.currentIndex);
                indicator.classList.toggle('bg-white/30', index !== this.currentIndex);
            });
        }
        
        startAutoSlide() {
            this.pauseAutoSlide();
            this.autoSlideInterval = setInterval(() => this.nextSlide(), this.slideDuration);
        }
        
        pauseAutoSlide() {
            if (this.autoSlideInterval) {
                clearInterval(this.autoSlideInterval);
                this.autoSlideInterval = null;
            }
        }
        
        resetAutoSlide() {
            this.pauseAutoSlide();
            this.startAutoSlide();
        }
        
        handleTouchStart(e) {
            this.touchStartX = e.touches[0].clientX;
        }
        
        handleTouchEnd(e) {
            if (!this.touchStartX) return;
            
            const touchEndX = e.changedTouches[0].clientX;
            const diff = this.touchStartX - touchEndX;
            
            if (Math.abs(diff) > 50) { // Minimum swipe distance
                if (diff > 0) {
                    this.nextSlide();
                } else {
                    this.prevSlide();
                }
            }
            
            this.touchStartX = null;
        }
    }
    
    // Initialize everything when DOM is loaded
    document.addEventListener('DOMContentLoaded', () => {
        try {
            // Initialize carousel
            const carousel = new ChurchCarousel();
            
            // Initialize particles
            initParticles();
            
            // Intersection Observer for animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            // Separate observer for featured cards with stricter requirements
            const featureCardsObserverOptions = {
                threshold: 0.6,
                rootMargin: '0px 0px -150px 0px'
            };

            const lazySectionsObserverOptions = {
            threshold: 0.2,
            rootMargin: '0px 0px -10% 0px'
        };

        const animatedSelectors = '.slide-up, .slide-left, .slide-right';
        const featureCardSelectors = '.gate-slide-left, .gate-slide-right';

        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) {
                    return;
                }

                const target = entry.target;
                target.style.opacity = '1';
                target.style.animationPlayState = 'running';
                target.style.transform = 'translateX(0) translateY(0)';
                obs.unobserve(target);
        });
    }, observerOptions);

        const featureCardsObserver = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
                if (!entry.isIntersecting) {
                    return;
                }

                const target = entry.target;
                target.style.opacity = '1';
                target.style.animationPlayState = 'running';
                target.style.transform = 'translateX(0) scale(1)';
                obs.unobserve(target);
        });
    }, featureCardsObserverOptions);

        document.querySelectorAll(animatedSelectors).forEach(el => {
        el.style.opacity = '0';
            el.style.animationPlayState = 'paused';
        
        if (el.classList.contains('slide-up')) {
            el.style.transform = 'translateY(30px)';
        } else if (el.classList.contains('slide-left')) {
            el.style.transform = 'translateX(-30px)';
        } else if (el.classList.contains('slide-right')) {
            el.style.transform = 'translateX(30px)';
        }
        
        observer.observe(el);
    });

        document.querySelectorAll(featureCardSelectors).forEach(el => {
        el.style.opacity = '0';
            el.style.animationPlayState = 'paused';
        
        if (el.classList.contains('gate-slide-left')) {
            el.style.transform = 'translateX(-100px) scale(0.95)';
        } else if (el.classList.contains('gate-slide-right')) {
            el.style.transform = 'translateX(100px) scale(0.95)';
        }
        
        featureCardsObserver.observe(el);
    });

        const lazySectionObserver = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) {
                    return;
                }

                entry.target.classList.add('is-visible');
                obs.unobserve(entry.target);
            });
        }, lazySectionsObserverOptions);

        document.querySelectorAll('.lazy-section').forEach(section => {
            lazySectionObserver.observe(section);
        });

    // Smooth scroll behavior
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    // Parallax effect for hero section
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const parallax = document.querySelector('.gradient-bg');
        if (parallax) {
            parallax.style.transform = `translateY(${scrolled * 0.5}px)`;
        }
    });

    // Dynamic particle generation
    function createParticle() {
        const particle = document.createElement('div');
        particle.className = 'particle';
        particle.style.width = Math.random() * 6 + 2 + 'px';
        particle.style.height = particle.style.width;
        particle.style.background = `rgba(${Math.random() * 100 + 100}, ${Math.random() * 100 + 100}, ${Math.random() * 100 + 150}, 0.6)`;
        particle.style.left = Math.random() * window.innerWidth + 'px';
        particle.style.animationDuration = Math.random() * 10 + 5 + 's';
        particle.style.animationDelay = Math.random() * 2 + 's';
        
        document.body.appendChild(particle);
        
        setTimeout(() => {
            particle.remove();
        }, 15000);
    }

    // Create particles periodically
    function initParticles() {
        setInterval(createParticle, 2000);

        // Initialize particles on load
        for (let i = 0; i < 5; i++) {
            setTimeout(createParticle, i * 500);
        }
    }
    
    // Initialize carousel with error handling
    function initCarousel() {
        try {
            const carousel = document.getElementById('gallery-carousel');
            if (!carousel) return;
            
            const items = document.querySelectorAll('.carousel-item');
            if (items.length > 0) {
                items[0].style.opacity = '1';
                items[0].style.transform = 'translateX(0)';
                items[0].style.position = 'relative';
                items[0].style.zIndex = '1';
            }
        } catch (error) {
            console.error('Error initializing carousel:', error);
        }
    }
    
    // Call initialization functions when DOM is fully loaded
    document.addEventListener('DOMContentLoaded', () => {
        initCarousel();
        initParticles();
    });
            
            // Then initialize the carousel
            initCarousel();
            startAutoSlide();
            console.log('Carousel initialized successfully');
        } catch (error) {
            console.error('Error initializing carousel:', error);
            // Fallback: Show first slide statically
            if (items.length > 0) {
                items[0].style.opacity = '1';
                items[0].style.transform = 'translateX(0)';
                items[0].style.position = 'relative';
                items[0].style.zIndex = '1';
            }
        }      
        // Clean up event listeners on unmount
        return () => {
            stopAutoSlide();
            if (nextBtn) nextBtn.removeEventListener('click', handleNextClick);
            if (prevBtn) prevBtn.removeEventListener('click', handlePrevClick);
            window.removeEventListener('blur', stopAutoSlide);
            window.removeEventListener('focus', startAutoSlide);
        };
    });
</script>

<!-- Floating Join Button -->
<a href="{{ route('join') }}" class="fixed bottom-8 right-8 z-50 group" aria-label="Join Us">
    <div class="relative">
        <!-- Subtle background highlight on hover -->
        <div class="absolute inset-0 bg-blue-100/20 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        <!-- Main button -->
        <div class="relative flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-800 rounded-full shadow-md transform transition-all duration-300 hover:shadow-lg hover:scale-105">
            <i class="fas fa-user-plus text-white text-2xl"></i>
        </div>
    </div>
</a>

@endsection
