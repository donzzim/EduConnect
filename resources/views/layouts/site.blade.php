<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduConnect | @stack('title')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-slate-50 font-sans antialiased">
    <x-nav>
        <div class="flex items-center">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div
                    class="flex items-center justify-center w-10 h-10 bg-indigo-600 rounded-xl shadow-lg shadow-blue-200 transition-transform group-hover:scale-105">
                    <i class="fas fa-graduation-cap text-white text-xl"></i>
                </div>

                <span class="text-2xl font-extrabold tracking-tight">
                        <span class="text-indigo-600">EDU</span><span class="text-slate-800">CONNECT</span>
                    </span>
            </a>
        </div>
    </x-nav>

    @yield('content')

    <x-footer/>
</body>
