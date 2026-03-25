/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', 'sans-serif'],
                serif: ['Playfair Display', 'serif'],
            },
            colors: {
                primary: {
                    DEFAULT: '#1e40af',
                    dark: '#1e3a8a',
                    light: '#3b82f6',
                },
                accent: '#4f46e5',
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
}
