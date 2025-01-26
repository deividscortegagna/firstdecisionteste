<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'App') }}</title>
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('theme');
            const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)').matches;

            if (savedTheme === 'dark' || (!savedTheme && prefersDarkScheme)) {
                document.documentElement.classList.add('dark');
                updateThemeIcon('dark');
            } else {
                document.documentElement.classList.remove('dark');
                updateThemeIcon('light');
            }
        });

        function toggleTheme() {
            const htmlElement = document.documentElement;
            const isDarkMode = htmlElement.classList.contains('dark');
            const newTheme = isDarkMode ? 'light' : 'dark';

            if (isDarkMode) {
                htmlElement.classList.remove('dark');
            } else {
                htmlElement.classList.add('dark');
            }

            localStorage.setItem('theme', newTheme);
            updateThemeIcon(newTheme);
        }

        function updateThemeIcon(theme) {
            const themeIcon = document.getElementById('themeIcon');
            if (theme === 'dark') {
                themeIcon.className = 'bi bi-sun text-yellow-500';
            } else {
                themeIcon.className = 'bi bi-moon-fill text-gray-800';
            }
        }
    </script>
</head>
<body class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100 min-h-screen flex flex-col">
    <header class="bg-blue-500 dark:bg-blue-700 text-white py-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center px-6">
            <h1 class="text-2xl font-bold">Dashboard</h1>
            <div class="flex items-center space-x-4">
                <button 
                    id="themeToggle" 
                    class="px-4 py-2 bg-gray-200 dark:bg-gray-700 rounded-full shadow flex items-center justify-center"
                    onclick="toggleTheme()"
                >
                    <i id="themeIcon" class="bi"></i>
                </button>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button 
                        type="submit" 
                        class="px-4 py-2 bg-red-600 hover:bg-red-700 rounded-lg text-white font-semibold transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </header>

    <main class="flex-grow container mx-auto px-6 py-8">
        {{ $slot }}
    </main>

    <footer class="bg-gray-200 dark:bg-gray-800 py-4 text-center">
        <p class="text-sm text-gray-600 dark:text-gray-400">
            © {{ date('Y') }} Seu Sistema. Todos os direitos reservados.
        </p>
    </footer>

    @livewireScripts
</body>
</html>
