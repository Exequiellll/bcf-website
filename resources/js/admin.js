document.addEventListener('DOMContentLoaded', function() {
    // Make sure admin login links work correctly
    document.querySelectorAll('a[href*="admin/login"]').forEach(link => {
        link.addEventListener('click', function(e) {
            // If the link was already handled by another script, don't prevent default
            if (e.defaultPrevented) return;
            
            // Force a full page load for the admin login
            window.location.href = this.href;
            e.preventDefault();
        });
    });
});
