<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página não encontrada</title>
    @vite(['resources/css/app.css'])
</head>

<body class="min-h-screen bg-gray-100 text-gray-900">
    <main class="mx-auto flex min-h-screen max-w-3xl flex-col items-center justify-center px-6 text-center">
        <p class="text-sm font-semibold uppercase tracking-wide text-amber-600">Erro 404</p>
        <h1 class="mt-3 text-4xl font-bold">Página não encontrada</h1>
        <p class="mt-4 text-base text-gray-600">
            A rota que você tentou acessar não existe ou foi movida.
        </p>

        <div class="mt-8">
            <a href="{{ route('home') }}"
                class="rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-indigo-500">
                Voltar para início
            </a>
        </div>
    </main>
</body>

</html>
