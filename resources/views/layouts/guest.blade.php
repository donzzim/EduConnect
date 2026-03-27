<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'EduConnect') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full overflow-hidden font-sans antialiased bg-slate-950 text-slate-100">
<div class="fixed inset-0 -z-10">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_20%,_rgba(56,189,248,0.15),_transparent_40%)]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_80%,_rgba(59,130,246,0.1),_transparent_40%)]"></div>
</div>

<div class="flex h-full w-full">
    <section class="relative hidden w-1/2 flex-col justify-between p-16 lg:flex border-r border-white/5">
        <div class="z-10 space-y-12">
            <a href="/" class="inline-flex transition hover:opacity-80">
                <x-application-logo class="h-12 w-auto text-white [&>svg]:fill-cyan-400" color="text-slate-100" />
            </a>

            <div class="max-w-md space-y-6">
                <h1 class="text-5xl font-bold leading-tight tracking-tight text-white xl:text-6xl">
                    Sua jornada acadêmica, <span class="text-indigo-600">simplificada.</span>
                </h1>
                <p class="text-lg leading-relaxed text-slate-400">
                    Acesse o portal EduConnect para gerenciar suas disciplinas, interagir com docentes e acompanhar seu progresso em tempo real.
                </p>
            </div>
        </div>

        <div class="z-10 grid grid-cols-2 gap-4">
            <div class="rounded-2xl bg-white/5 p-5 backdrop-blur-md border border-white/10">
                <p class="text-sm font-medium text-cyan-400 italic">Ambiente Seguro</p>
                <p class="mt-1 text-xs text-slate-400">Dados protegidos por criptografia de ponta.</p>
            </div>
            <div class="rounded-2xl bg-white/5 p-5 backdrop-blur-md border border-white/10">
                <p class="text-sm font-medium text-cyan-400 italic">Multi-dispositivo</p>
                <p class="mt-1 text-xs text-slate-400">Acesse do PC, tablet ou smartphone.</p>
            </div>
        </div>
    </section>

    <main class="flex w-full items-center justify-center bg-white px-8 lg:w-1/2">
        <div class="w-full max-w-md">
            <div class="mb-10 lg:hidden text-center">
                <x-application-logo class="mx-auto h-10 w-auto text-slate-900" />
            </div>
            {{ $slot }}
        </div>
    </main>
</div>
</body>
</html>
