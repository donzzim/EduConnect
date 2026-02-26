@extends('layouts.site')

@push('title')
    Saiba mais
@endpush

@section('content')
    <x-nav>
        <a href="{{ route('home') }}" class="text-2xl font-bold text-indigo-600 tracking-tight">Edu<span
                class="text-slate-800">Connect</span></a>
        <a href="{{ route('home') }}" class="text-slate-600 hover:text-indigo-600 font-medium transition">
            <i class="fa-solid fa-arrow-left mr-2"></i> Voltar para Home
        </a>
    </x-nav>

    <header class="py-16 bg-gradient-to-b from-white to-slate-50">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <span class="text-indigo-600 font-bold tracking-widest uppercase text-sm">Nossa Missão</span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 mt-4 mb-6 leading-tight">
                Transformando a educação através de <span class="text-indigo-600">dados.</span>
            </h1>
            <p class="text-xl text-slate-600 leading-relaxed">
                O EduConnect não é apenas um diário de classe digital. É uma plataforma preditiva desenhada para o Ensino
                Médio, focada em garantir o sucesso de cada aluno antes mesmo do ano letivo terminar.
            </p>
        </div>
    </header>

    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="order-2 md:order-1">
                    <div class="bg-indigo-600 rounded-3xl p-8 shadow-2xl overflow-hidden relative">
                        <div class="absolute top-0 right-0 p-4 opacity-10">
                            <i class="fa-solid fa-brain text-9xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-white mb-6 italic">O Poder dos Algoritmos</h2>
                        <ul class="space-y-6">
                            <li class="flex items-start">
                                <div class="flex-shrink-0 bg-white/20 p-2 rounded-lg text-white">
                                    <i class="fa-solid fa-chart-line text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-bold text-white uppercase tracking-wide">Risco de Evasão</h4>
                                    <p class="text-indigo-100 text-sm">Identificamos padrões de frequência e engajamento
                                        para prever possíveis desistências.</p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 bg-white/20 p-2 rounded-lg text-white">
                                    <i class="fa-solid fa-triangle-exclamation text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-bold text-white uppercase tracking-wide">Risco de Reprovação
                                    </h4>
                                    <p class="text-indigo-100 text-sm">Análise preditiva baseada no histórico de notas e
                                        evolução contínua do estudante.</p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 bg-white/20 p-2 rounded-lg text-white">
                                    <i class="fa-solid fa-user-doctor text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-bold text-white uppercase tracking-wide">Intervenção Pedagógica
                                    </h4>
                                    <p class="text-indigo-100 text-sm">Sugerimos ações diretas para coordenadores e
                                        professores agirem no momento certo.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="order-1 md:order-2">
                    <h3 class="text-3xl font-bold text-slate-800 mb-6">Como o EduConnect funciona?</h3>
                    <p class="text-slate-600 mb-6 leading-relaxed">
                        Utilizamos modelos de <strong>Machine Learning</strong> treinados para analisar o comportamento
                        acadêmico. O sistema processa dados inseridos diariamente por professores para gerar insights em
                        tempo real.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center p-4 bg-white rounded-xl border border-slate-200 shadow-sm">
                            <i class="fa-solid fa-check-circle text-emerald-500 text-xl mr-3"></i>
                            <span class="text-slate-700 font-medium">Dashboard intuitivo para diretores e
                                coordenadores.</span>
                        </div>
                        <div class="flex items-center p-4 bg-white rounded-xl border border-slate-200 shadow-sm">
                            <i class="fa-solid fa-check-circle text-emerald-500 text-xl mr-3"></i>
                            <span class="text-slate-700 font-medium">Alertas automáticos via sistema.</span>
                        </div>
                        <div class="flex items-center p-4 bg-white rounded-xl border border-slate-200 shadow-sm">
                            <i class="fa-solid fa-check-circle text-emerald-500 text-xl mr-3"></i>
                            <span class="text-slate-700 font-medium">Foco total no Ensino Médio e ENEM.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-white border-t border-slate-200 py-12 mt-10">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-slate-500 text-sm mb-4 tracking-wider uppercase font-semibold">Tecnologias Utilizadas</p>
            <div class="flex justify-center space-x-6 text-slate-400 text-2xl">
                <i class="fa-brands fa-laravel hover:text-red-500 transition"></i>
                <i class="fa-brands fa-php hover:text-indigo-600 transition"></i>
                <i class="fa-brands fa-python hover:text-blue-500 transition" title="Para Machine Learning"></i>
                <i class="fa-brands fa-js hover:text-yellow-500 transition"></i>
            </div>
            <div class="mt-8 text-slate-400 text-xs italic">
                EduConnect &copy; 2026 - Inovação na Educação Pública e Privada.
            </div>
        </div>
    </footer>
@endsection
