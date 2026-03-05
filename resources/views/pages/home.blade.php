@extends('layouts.site')

@push('title')
    Sistema Escolar
@endpush

@section('content')
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

    <header class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <h1 class="text-5xl font-extrabold text-slate-900 leading-tight mb-6">
                    Gestão Escolar <br>
                    <span class="text-indigo-600">Inteligente e Simples.</span>
                </h1>
                <p class="text-lg text-slate-600 mb-8 max-w-lg">
                    A plataforma completa para conectar Diretores, Professores e Alunos do Ensino Médio em um ambiente
                    digital integrado.
                </p>
                <div class="flex space-x-4">
                    <a href="{{ route('about') }}"
                        class="bg-slate-900 text-white px-8 py-3 rounded-xl font-semibold hover:bg-slate-800 transition">Saiba
                        Mais</a>
                    <a href="{{ route('project.schedule') }}"
                        class="border border-slate-300 text-slate-700 px-8 py-3 rounded-xl font-semibold hover:bg-slate-100 transition">Cronograma
                        2026</a>
                </div>
            </div>
            <div class="md:w-1/2">
                <div class="relative bg-indigo-100 rounded-3xl p-8 overflow-hidden">
                    <div
                        class="bg-white rounded-xl shadow-2xl p-4 transform rotate-2 hover:rotate-0 transition duration-500">
                        <div class="flex items-center justify-between mb-4 border-b pb-2">
                            <span class="font-bold text-slate-700">Dashboard Administrativo</span>
                            <div class="flex space-x-1">
                                <div class="w-2 h-2 rounded-full bg-red-400"></div>
                                <div class="w-2 h-2 rounded-full bg-yellow-400"></div>
                                <div class="w-2 h-2 rounded-full bg-green-400"></div>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <div class="h-4 bg-slate-100 rounded w-3/4"></div>
                            <div class="h-4 bg-slate-100 rounded w-1/2"></div>
                            <div class="h-20 bg-indigo-50 rounded w-full flex items-end p-2">
                                <div class="h-full w-1/5 bg-indigo-400 mx-1 rounded-t"></div>
                                <div class="h-2/3 w-1/5 bg-indigo-300 mx-1 rounded-t"></div>
                                <div class="h-4/5 w-1/5 bg-indigo-500 mx-1 rounded-t"></div>
                                <div class="h-1/2 w-1/5 bg-indigo-200 mx-1 rounded-t"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-slate-900">Acesse seu Painel</h2>
                <p class="text-slate-500 mt-2">Selecione o seu perfil para continuar</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition border border-slate-100 group">
                    <div
                        class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center mb-6 group-hover:bg-indigo-600 group-hover:text-white transition duration-300">
                        <i class="fa-solid fa-user-tie text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Administração</h3>
                    <p class="text-slate-500 mb-6 text-sm">Diretores e Coordenadores podem gerenciar turmas, professores e
                        emitir relatórios.</p>
                    <a href="/admin" class="text-indigo-600 font-semibold flex items-center hover:underline">Acessar <i
                            class="fa-solid fa-arrow-right ml-2 text-xs"></i></a>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition border border-slate-100 group">
                    <div
                        class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center mb-6 group-hover:bg-emerald-600 group-hover:text-white transition duration-300">
                        <i class="fa-solid fa-chalkboard-user text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Professor</h3>
                    <p class="text-slate-500 mb-6 text-sm">Lançamento de notas, frequências e planos de aula para suas
                        turmas atribuídas.</p>
                    <a href="{{ route('teacher.index') }}"
                        class="text-emerald-600 font-semibold flex items-center hover:underline">Acessar <i
                            class="fa-solid fa-arrow-right ml-2 text-xs"></i></a>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition border border-slate-100 group">
                    <div
                        class="w-14 h-14 bg-amber-50 text-amber-600 rounded-lg flex items-center justify-center mb-6 group-hover:bg-amber-600 group-hover:text-white transition duration-300">
                        <i class="fa-solid fa-graduation-cap text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Aluno</h3>
                    <p class="text-slate-500 mb-6 text-sm">Acesso a notas, materiais de estudo e acompanhamento do
                        desempenho acadêmico.</p>
                    <a href="{{ route('student.index') }}"
                        class="text-amber-600 font-semibold flex items-center hover:underline">Acessar <i
                            class="fa-solid fa-arrow-right ml-2 text-xs"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-indigo-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl font-bold text-white mb-2">+15k</div>
                    <div class="text-indigo-100 text-sm uppercase tracking-wide">Alunos Ativos</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-white mb-2">98%</div>
                    <div class="text-indigo-100 text-sm uppercase tracking-wide">Precisão IA</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-white mb-2">+500</div>
                    <div class="text-indigo-100 text-sm uppercase tracking-wide">Escolas</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-white mb-2">24/7</div>
                    <div class="text-indigo-100 text-sm uppercase tracking-wide">Suporte Online</div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row gap-12 items-center">
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-bold text-slate-900 mb-6">Por que escolher o EduConnect?</h2>
                    <div class="space-y-6">
                        <div class="flex">
                            <div class="flex-shrink-0 mt-1">
                                <div
                                    class="flex items-center justify-center h-10 w-10 rounded-md bg-indigo-50 text-indigo-600">
                                    <i class="fa-solid fa-bolt"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-slate-800">Alertas em Tempo Real</h4>
                                <p class="text-slate-600">Notificações instantâneas para coordenadores quando um padrão de
                                    risco é detectado pelo algoritmo.</p>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="flex-shrink-0 mt-1">
                                <div
                                    class="flex items-center justify-center h-10 w-10 rounded-md bg-indigo-50 text-indigo-600">
                                    <i class="fa-solid fa-shield"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-slate-800">Segurança de Dados</h4>
                                <p class="text-slate-600">Criptografia de ponta a ponta e total conformidade com a LGPD para
                                    proteção dos dados dos alunos.</p>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="flex-shrink-0 mt-1">
                                <div
                                    class="flex items-center justify-center h-10 w-10 rounded-md bg-indigo-50 text-indigo-600">
                                    <i class="fa-solid fa-mobile-screen-button"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-slate-800">Acesso Mobile</h4>
                                <p class="text-slate-600">Interface otimizada para smartphones, permitindo que professores
                                    lancem notas de qualquer lugar.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 grid grid-cols-2 gap-4">
                    <div class="bg-slate-100 h-64 rounded-2xl overflow-hidden relative group">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=400"
                            class="object-cover w-full h-full grayscale group-hover:grayscale-0 transition duration-500"
                            alt="Estudantes">
                    </div>
                    <div class="bg-slate-100 h-64 rounded-2xl mt-8 overflow-hidden relative group">
                        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=400"
                            class="object-cover w-full h-full grayscale group-hover:grayscale-0 transition duration-500"
                            alt="Tecnologia">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-slate-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-slate-900 mb-12">Dúvidas Frequentes</h2>
            <div class="space-y-4">
                <details
                    class="group bg-white border border-slate-200 rounded-xl p-6 [&_summary::-webkit-details-marker]:hidden">
                    <summary class="flex items-center justify-between cursor-pointer">
                        <h3 class="text-lg font-medium text-slate-800">Como funciona a previsão de evasão?</h3>
                        <span class="text-indigo-600 transition group-open:rotate-180"><i
                                class="fa-solid fa-chevron-down"></i></span>
                    </summary>
                    <p class="mt-4 text-slate-600 leading-relaxed italic text-sm">
                        Nosso sistema analisa mais de 20 variáveis, incluindo frequência, histórico de notas e participação
                        em atividades extracurriculares para gerar um score de risco.
                    </p>
                </details>

                <details
                    class="group bg-white border border-slate-200 rounded-xl p-6 [&_summary::-webkit-details-marker]:hidden">
                    <summary class="flex items-center justify-between cursor-pointer">
                        <h3 class="text-lg font-medium text-slate-800">É possível integrar com outros sistemas?</h3>
                        <span class="text-indigo-600 transition group-open:rotate-180"><i
                                class="fa-solid fa-chevron-down"></i></span>
                    </summary>
                    <p class="mt-4 text-slate-600 leading-relaxed text-sm">
                        Sim, possuímos uma API robusta que permite a importação e exportação de dados para secretarias de
                        educação e sistemas governamentais.
                    </p>
                </details>
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-slate-900 rounded-3xl p-8 md:p-16 text-center relative overflow-hidden">
                <div class="relative z-10">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Pronto para modernizar sua escola?</h2>
                    <p class="text-slate-400 text-lg mb-10 max-w-2xl mx-auto">Junte-se a centenas de instituições que já
                        estão combatendo a evasão escolar com inteligência de dados.</p>
                    <a href="/contato"
                        class="bg-white text-slate-900 px-10 py-4 rounded-xl font-bold hover:bg-indigo-50 transition shadow-xl">Solicitar
                        Demonstração</a>
                </div>
                <div class="absolute -top-24 -right-24 w-64 h-64 bg-indigo-500/10 rounded-full"></div>
                <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-indigo-500/10 rounded-full"></div>
            </div>
        </div>
    </section>

    <footer class="bg-white border-t border-slate-200 py-10">
        <div class="max-w-7xl mx-auto px-4 text-center text-slate-500 text-sm">
            &copy; 2026 EduConnect - Sistema Escolar Integrado. Todos os direitos reservados.
        </div>
    </footer>
@endsection

