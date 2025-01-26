/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...require('tailwindcss/defaultTheme').fontFamily.sans],
            },
            colors: {
                light: {
                    bg: '#f9fafb',
                    text: '#1f2937',
                },
                dark: {
                    bg: '#1f2937',
                    text: '#e5e7eb',
                    highlight: '#ffffff',
                },
            },
        },
    },
    darkMode: 'class',
    plugins: [],
};
