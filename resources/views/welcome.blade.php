<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 flex items-center justify-center min-h-screen">
    <div class="max-w-6xl mx-auto p-6 lg:p-8">
        <div class="flex justify-end">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="p-6">
                <h1 class="text-2xl font-bold">Bem-vindo ao Laravel</h1>
                <p class="mt-4 text-gray-600 dark:text-gray-400">Laravel tem um ecossistema incrivelmente rico. Sugerimos começar com a documentação e tutoriais em vídeo.</p>
                <div class="mt-6">
                    <a href="https://laravel.com/docs" class="text-indigo-600 dark:text-indigo-400 underline">Documentação</a>
                </div>
                <div class="mt-2">
                    <a href="https://laracasts.com" class="text-indigo-600 dark:text-indigo-400 underline">Laracasts</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
