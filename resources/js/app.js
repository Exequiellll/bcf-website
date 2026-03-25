import './bootstrap';
import Alpine from 'alpinejs';
import '../css/app.css';

// Initialize Alpine.js
window.Alpine = Alpine;
Alpine.start();

// Mobile menu toggle
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            const newState = !isExpanded;
            
            // Toggle menu state
            this.setAttribute('aria-expanded', newState);
            mobileMenu.setAttribute('aria-hidden', !newState);
            mobileMenu.classList.toggle('hidden');
            document.body.style.overflow = newState ? 'hidden' : '';
        });

        // Close menu when clicking on a link or outside
        document.addEventListener('click', function(event) {
            const isClickInside = mobileMenuButton.contains(event.target) || mobileMenu.contains(event.target);
            if (!isClickInside && !mobileMenu.classList.contains('hidden')) {
                mobileMenuButton.setAttribute('aria-expanded', 'false');
                mobileMenu.setAttribute('aria-hidden', 'true');
                mobileMenu.classList.add('hidden');
                document.body.style.overflow = '';
            }
        });
    }

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        if (mobileMenu && mobileMenuButton) {
            const isClickInside = mobileMenuButton.contains(event.target) || mobileMenu.contains(event.target);
            if (!isClickInside && mobileMenu.getAttribute('aria-hidden') === 'false') {
                mobileMenu.setAttribute('aria-hidden', 'true');
                mobileMenuButton.setAttribute('aria-expanded', 'false');
                mobileMenuButton.classList.remove('open');
                mobileMenu.classList.remove('open');
                document.body.style.overflow = '';
            }
        }
    });

    // Back to top button
    const backToTopButton = document.getElementById('back-to-top');
    if (backToTopButton) {
        function toggleBackToTop() {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('opacity-0', 'invisible');
                backToTopButton.classList.add('opacity-100', 'visible');
            } else {
                backToTopButton.classList.remove('opacity-100', 'visible');
                backToTopButton.classList.add('opacity-0', 'invisible');
            }
        }

        // Initial check
        toggleBackToTop();

        // Check on scroll
        window.addEventListener('scroll', toggleBackToTop, { passive: true });

        // Smooth scroll to top
        backToTopButton.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
});
