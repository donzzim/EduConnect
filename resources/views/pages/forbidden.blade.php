@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto p-6">
        <h1 class="text-2xl font-bold">Acesso negado</h1>
        <p class="mt-2 text-slate-600">Você não tem permissão para acessar esta página.</p>
        <a href="{{ url('/dashboard') }}" class="inline-block mt-4 px-4 py-2 rounded bg-slate-900 text-white">
            Voltar
        </a>
    </div>
@endsection
