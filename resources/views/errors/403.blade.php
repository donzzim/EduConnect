<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso negado</title>
    @vite(['resources/css/app.css'])
</head>

<body class="min-h-screen bg-gray-100 text-gray-900">
    <main class="mx-auto flex min-h-screen max-w-3xl flex-col items-center justify-center px-6 text-center">
        <p class="text-sm font-semibold uppercase tracking-wide text-red-600">Erro 403</p>
        <h1 class="mt-3 text-4xl font-bold">Acesso negado</h1>
        <p class="mt-4 text-base text-gray-600">
            Você não tem permissão para acessar esta área com o seu perfil atual.
        </p>

        <div class="mt-8 flex gap-3">
            <a href="{{ route('home') }}"
                class="rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-indigo-500">
                Voltar para início
            </a>
            @auth
                <a href="{{ url('/' . auth()->user()->role) }}"
                    class="rounded-lg border border-gray-300 px-5 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-50">
                    Ir para minha área
                </a>
            @endauth
        </div>
    </main>
</body>

</html>
