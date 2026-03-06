@extends('layouts.site')

@push('title')
    Funcionalidades
@endpush

@section('content')
    <header class="py-14 bg-gradient-to-b from-white to-slate-100 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <p class="text-indigo-600 font-semibold uppercase tracking-widest text-xs">
                Estrutura do Sistema
            </p>

            <h1 class="mt-3 text-4xl md:text-5xl font-extrabold text-slate-900">
                Como funciona o EduConnect
            </h1>

            <p class="mt-5 text-slate-600 max-w-3xl">
                O EduConnect foi desenvolvido para integrar alunos, professores e administração em um único ambiente
                digital. Cada perfil possui funcionalidades específicas que contribuem para melhorar a organização
                escolar, o acompanhamento acadêmico e a gestão da instituição.
            </p>

            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-4">

                <div class="bg-white border border-slate-200 rounded-2xl p-5">
                    <p class="text-sm text-slate-500">Área do sistema</p>
                    <p class="text-xl font-bold text-slate-900 mt-1">Aluno</p>
                    <p class="text-sm text-slate-600 mt-2">
                        Acompanhamento de notas, frequência, turma e desempenho escolar.
                    </p>
                </div>

                <div class="bg-white border border-slate-200 rounded-2xl p-5">
                    <p class="text-sm text-slate-500">Área do sistema</p>
                    <p class="text-xl font-bold text-slate-900 mt-1">Professor</p>
                    <p class="text-sm text-slate-600 mt-2">
                        Registro de avaliações, controle de presença e gestão das turmas.
                    </p>
                </div>

                <div class="bg-white border border-slate-200 rounded-2xl p-5">
                    <p class="text-sm text-slate-500">Área do sistema</p>
                    <p class="text-xl font-bold text-slate-900 mt-1">Administração</p>
                    <p class="text-sm text-slate-600 mt-2">
                        Gerenciamento de usuários, turmas, disciplinas e indicadores escolares.
                    </p>
                </div>

            </div>
        </div>
    </header>

    <section class="relative overflow-hidden bg-gradient-to-br from-slate-50 via-white to-indigo-50">
        <div class="relative max-w-7xl mx-auto px-6 py-16 sm:px-8 lg:px-12">
            <div class="max-w-3xl mx-auto text-center">
                <span
                    class="inline-flex items-center gap-2 bg-indigo-100 text-indigo-700 text-sm font-semibold px-4 py-2 rounded-full shadow-sm">
                    <i class="fa-solid fa-circle-info"></i>
                    Sobre as áreas do sistema
                </span>

                <h1 class="mt-6 text-4xl sm:text-5xl font-extrabold tracking-tight text-slate-900 leading-tight">
                    Entenda o papel de cada área do
                    <span class="text-indigo-600">EduConnect</span>
                </h1>

                <p class="mt-5 text-lg text-slate-600 leading-relaxed">
                    O sistema foi projetado para atender diferentes perfis de usuários dentro do ambiente escolar,
                    garantindo organização, praticidade e melhor acompanhamento das atividades acadêmicas e administrativas.
                </p>
            </div>

            <div class="mt-14 grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Área do Aluno --}}
                <div
                    class="group bg-white/90 backdrop-blur-sm border border-slate-200 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 p-8">
                    <div
                        class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-700 flex items-center justify-center text-2xl shadow-sm">
                        <i class="fa-solid fa-user-graduate"></i>
                    </div>

                    <h2 class="mt-6 text-2xl font-bold text-slate-900">
                        Área do Aluno
                    </h2>

                    <p class="mt-4 text-slate-600 leading-relaxed">
                        A área do aluno foi pensada para centralizar as principais informações acadêmicas em um só lugar,
                        facilitando o acompanhamento da vida escolar de forma simples e intuitiva.
                    </p>

                    <div class="mt-6">
                        <h3 class="text-sm font-semibold uppercase tracking-wide text-slate-500">
                            Principais funcionalidades
                        </h3>

                        <ul class="mt-4 space-y-3 text-slate-700">
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-blue-600 mt-1"></i>
                                <span>Visualizar notas e desempenho em cada disciplina.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-blue-600 mt-1"></i>
                                <span>Acompanhar frequência e faltas registradas.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-blue-600 mt-1"></i>
                                <span>Consultar informações da turma e grade de matérias.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-blue-600 mt-1"></i>
                                <span>Acessar avisos, comunicados e informações importantes da escola.</span>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-8 p-4 rounded-2xl bg-slate-50 border border-slate-200">
                        <p class="text-sm text-slate-600 leading-relaxed">
                            O objetivo dessa área é dar mais autonomia ao estudante, permitindo que ele acompanhe sua
                            evolução e se mantenha informado sobre sua rotina escolar.
                        </p>
                    </div>
                </div>

                {{-- Área do Professor --}}
                <div
                    class="group bg-white/90 backdrop-blur-sm border border-slate-200 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 p-8">
                    <div
                        class="w-14 h-14 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-2xl shadow-sm">
                        <i class="fa-solid fa-chalkboard-user"></i>
                    </div>

                    <h2 class="mt-6 text-2xl font-bold text-slate-900">
                        Área do Professor
                    </h2>

                    <p class="mt-4 text-slate-600 leading-relaxed">
                        A área do professor foi desenvolvida para otimizar o acompanhamento pedagógico das turmas,
                        oferecendo recursos que auxiliam no registro e na gestão do processo de ensino.
                    </p>

                    <div class="mt-6">
                        <h3 class="text-sm font-semibold uppercase tracking-wide text-slate-500">
                            Principais funcionalidades
                        </h3>

                        <ul class="mt-4 space-y-3 text-slate-700">
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-emerald-600 mt-1"></i>
                                <span>Lançar notas e avaliações dos alunos.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-emerald-600 mt-1"></i>
                                <span>Registrar presenças e faltas por turma.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-emerald-600 mt-1"></i>
                                <span>Consultar as turmas vinculadas e suas respectivas disciplinas.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-emerald-600 mt-1"></i>
                                <span>Acompanhar o desempenho dos alunos para intervenções pedagógicas.</span>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-8 p-4 rounded-2xl bg-slate-50 border border-slate-200">
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Essa área busca reduzir tarefas repetitivas e dar mais agilidade ao trabalho docente,
                            permitindo foco maior no acompanhamento da aprendizagem.
                        </p>
                    </div>
                </div>

                {{-- Área do Admin --}}
                <div
                    class="group bg-white/90 backdrop-blur-sm border border-slate-200 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 p-8">
                    <div
                        class="w-14 h-14 rounded-2xl bg-amber-100 text-amber-700 flex items-center justify-center text-2xl shadow-sm">
                        <i class="fa-solid fa-user-shield"></i>
                    </div>

                    <h2 class="mt-6 text-2xl font-bold text-slate-900">
                        Área Administrativa
                    </h2>

                    <p class="mt-4 text-slate-600 leading-relaxed">
                        A área administrativa é responsável pelo controle geral do sistema, reunindo funções essenciais
                        para organização escolar, acompanhamento estratégico e gerenciamento de usuários.
                    </p>

                    <div class="mt-6">
                        <h3 class="text-sm font-semibold uppercase tracking-wide text-slate-500">
                            Principais funcionalidades
                        </h3>

                        <ul class="mt-4 space-y-3 text-slate-700">
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-amber-600 mt-1"></i>
                                <span>Gerenciar cadastros de alunos, professores, turmas e disciplinas.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-amber-600 mt-1"></i>
                                <span>Organizar a estrutura escolar e as relações entre usuários.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-amber-600 mt-1"></i>
                                <span>Acompanhar relatórios de desempenho, frequência e indicadores escolares.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-amber-600 mt-1"></i>
                                <span>Centralizar decisões acadêmicas e administrativas do ambiente escolar.</span>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-8 p-4 rounded-2xl bg-slate-50 border border-slate-200">
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Essa área oferece uma visão mais ampla da escola, permitindo uma gestão mais eficiente e
                            orientada por informações organizadas.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Seção complementar --}}
            <div class="mt-16 bg-white border border-slate-200 rounded-3xl shadow-sm p-8 lg:p-10">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                    <div>
                        <span
                            class="inline-flex items-center gap-2 bg-slate-100 text-slate-700 text-sm font-semibold px-4 py-2 rounded-full">
                            <i class="fa-solid fa-diagram-project"></i>
                            Integração entre áreas
                        </span>

                        <h2 class="mt-5 text-3xl font-bold text-slate-900">
                            Um sistema integrado para melhorar a rotina escolar
                        </h2>

                        <p class="mt-4 text-slate-600 leading-relaxed">
                            Embora cada perfil tenha seu próprio ambiente de acesso, todas as áreas trabalham de forma
                            conectada. Isso permite que informações acadêmicas e administrativas circulem de maneira
                            organizada, reduzindo falhas, retrabalho e dificuldades de acompanhamento.
                        </p>

                        <p class="mt-4 text-slate-600 leading-relaxed">
                            Dessa forma, o aluno acompanha seu progresso, o professor gerencia suas turmas e a
                            administração mantém o controle geral da instituição em um ecossistema unificado.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5 text-center">
                            <div class="text-3xl text-blue-600">
                                <i class="fa-solid fa-user-graduate"></i>
                            </div>
                            <h3 class="mt-3 font-bold text-slate-900">Aluno</h3>
                            <p class="mt-2 text-sm text-slate-600">
                                Acompanha informações acadêmicas.
                            </p>
                        </div>

                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5 text-center">
                            <div class="text-3xl text-emerald-600">
                                <i class="fa-solid fa-chalkboard-user"></i>
                            </div>
                            <h3 class="mt-3 font-bold text-slate-900">Professor</h3>
                            <p class="mt-2 text-sm text-slate-600">
                                Registra e acompanha o processo pedagógico.
                            </p>
                        </div>

                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5 text-center">
                            <div class="text-3xl text-amber-600">
                                <i class="fa-solid fa-user-shield"></i>
                            </div>
                            <h3 class="mt-3 font-bold text-slate-900">Admin</h3>
                            <p class="mt-2 text-sm text-slate-600">
                                Gerencia toda a estrutura do sistema.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
