@extends('layouts.site')

@push('title')
    Cronograma do Projeto
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

    <header class="py-14 bg-gradient-to-b from-white to-slate-100 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-indigo-600 font-semibold uppercase tracking-widest text-xs">Planejamento do Projeto</p>
            <h1 class="mt-3 text-4xl md:text-5xl font-extrabold text-slate-900">Cronograma Ficticio do EduConnect</h1>
            <p class="mt-5 text-slate-600 max-w-3xl">
                Linha do tempo simulada para entrega do sistema escolar integrado, com marcos de analise, desenvolvimento,
                testes, treinamento e go-live.
            </p>

            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white border border-slate-200 rounded-2xl p-5">
                    <p class="text-sm text-slate-500">Periodo do projeto</p>
                    <p class="text-xl font-bold text-slate-900 mt-1">Jan/2026 a Dez/2026</p>
                </div>
                <div class="bg-white border border-slate-200 rounded-2xl p-5">
                    <p class="text-sm text-slate-500">Duracao prevista</p>
                    <p class="text-xl font-bold text-slate-900 mt-1">12 meses</p>
                </div>
                <div class="bg-white border border-slate-200 rounded-2xl p-5">
                    <p class="text-sm text-slate-500">Status geral (ficticio)</p>
                    <p class="text-xl font-bold text-emerald-700 mt-1">Em execucao - 58%</p>
                </div>
            </div>
        </div>
    </header>

    <section class="py-14 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-slate-900 mb-8">Fases e entregas</h2>

            <div class="space-y-4">
                <div class="bg-slate-50 border border-slate-200 rounded-xl p-5">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                        <h3 class="font-bold text-slate-800">1. Descoberta e levantamento de requisitos</h3>
                        <span class="text-sm font-semibold text-indigo-700 bg-indigo-100 px-3 py-1 rounded-full">Jan -
                            Fev</span>
                    </div>
                    <p class="text-slate-600 mt-3">Mapeamento de perfis (diretor, professor e aluno), regras academicas e
                        fluxos criticos.</p>
                </div>

                <div class="bg-slate-50 border border-slate-200 rounded-xl p-5">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                        <h3 class="font-bold text-slate-800">2. UX, arquitetura e modelagem de dados</h3>
                        <span class="text-sm font-semibold text-indigo-700 bg-indigo-100 px-3 py-1 rounded-full">Mar -
                            Abr</span>
                    </div>
                    <p class="text-slate-600 mt-3">Definicao das telas principais, estrutura de banco, permissoes e padrao
                        tecnico Laravel + Filament.</p>
                </div>

                <div class="bg-slate-50 border border-slate-200 rounded-xl p-5">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                        <h3 class="font-bold text-slate-800">3. Desenvolvimento dos modulos nucleares</h3>
                        <span class="text-sm font-semibold text-indigo-700 bg-indigo-100 px-3 py-1 rounded-full">Mai -
                            Ago</span>
                    </div>
                    <p class="text-slate-600 mt-3">Implementacao de turmas, notas, frequencia, alertas preditivos e
                        dashboards de acompanhamento.</p>
                </div>

                <div class="bg-slate-50 border border-slate-200 rounded-xl p-5">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                        <h3 class="font-bold text-slate-800">4. Testes integrados e homologacao</h3>
                        <span class="text-sm font-semibold text-indigo-700 bg-indigo-100 px-3 py-1 rounded-full">Set -
                            Out</span>
                    </div>
                    <p class="text-slate-600 mt-3">Cenarios E2E, validacao com usuarios chave e ajustes para conformidade
                        com LGPD.</p>
                </div>

                <div class="bg-slate-50 border border-slate-200 rounded-xl p-5">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                        <h3 class="font-bold text-slate-800">5. Capacitacao, implantacao e sustentacao inicial</h3>
                        <span class="text-sm font-semibold text-indigo-700 bg-indigo-100 px-3 py-1 rounded-full">Nov -
                            Dez</span>
                    </div>
                    <p class="text-slate-600 mt-3">Treinamentos, go-live assistido e monitoramento das primeiras semanas de
                        operacao.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-14 bg-slate-50 border-y border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-slate-900">Calendario de Eventos (Abril/2026)</h2>
                <span class="text-sm text-slate-500">Eventos ficticios para acompanhamento do projeto</span>
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden">
                <div
                    class="grid grid-cols-7 bg-slate-100 text-center text-xs font-bold uppercase tracking-wide text-slate-600">
                    <div class="py-3">Seg</div>
                    <div class="py-3">Ter</div>
                    <div class="py-3">Qua</div>
                    <div class="py-3">Qui</div>
                    <div class="py-3">Sex</div>
                    <div class="py-3">Sab</div>
                    <div class="py-3">Dom</div>
                </div>

                <div class="grid grid-cols-7 text-sm">
                    <div class="h-24 p-2 border border-slate-100 text-slate-300">30</div>
                    <div class="h-24 p-2 border border-slate-100 text-slate-300">31</div>
                    <div class="h-24 p-2 border border-slate-100">
                        <span class="font-semibold text-slate-700">1</span>
                    </div>
                    <div class="h-24 p-2 border border-slate-100">
                        <span class="font-semibold text-slate-700">2</span>
                    </div>
                    <div class="h-24 p-2 border border-slate-100">
                        <span class="font-semibold text-slate-700">3</span>
                    </div>
                    <div class="h-24 p-2 border border-slate-100">
                        <span class="font-semibold text-slate-700">4</span>
                    </div>
                    <div class="h-24 p-2 border border-slate-100">
                        <span class="font-semibold text-slate-700">5</span>
                    </div>

                    <div class="h-24 p-2 border border-slate-100">
                        <span class="font-semibold text-slate-700">6</span>
                    </div>
                    <div class="h-24 p-2 border border-slate-100">
                        <span class="font-semibold text-slate-700">7</span>
                        <span
                            class="mt-2 inline-block text-[11px] px-2 py-1 rounded-full bg-indigo-100 text-indigo-700">Sprint
                            planning</span>
                    </div>
                    <div class="h-24 p-2 border border-slate-100">
                        <span class="font-semibold text-slate-700">8</span>
                    </div>
                    <div class="h-24 p-2 border border-slate-100">
                        <span class="font-semibold text-slate-700">9</span>
                        <span
                            class="mt-2 inline-block text-[11px] px-2 py-1 rounded-full bg-amber-100 text-amber-700">Workshop
                            UX</span>
                    </div>
                    <div class="h-24 p-2 border border-slate-100">
                        <span class="font-semibold text-slate-700">10</span>
                    </div>
                    <div class="h-24 p-2 border border-slate-100 bg-slate-50">
                        <span class="font-semibold text-slate-700">11</span>
                    </div>
                    <div class="h-24 p-2 border border-slate-100 bg-slate-50">
                        <span class="font-semibold text-slate-700">12</span>
                    </div>

                    <div class="h-24 p-2 border border-slate-100">
                        <span class="font-semibold text-slate-700">13</span>
                        <span
                            class="mt-2 inline-block text-[11px] px-2 py-1 rounded-full bg-emerald-100 text-emerald-700">Revisao
                            tecnica</span>
                    </div>
                    <div class="h-24 p-2 border border-slate-100">
                        <span class="font-semibold text-slate-700">14</span>
                    </div>
                    <div class="h-24 p-2 border border-slate-100">
                        <span class="font-semibold text-slate-700">15</span>
                    </div>
                    <div class="h-24 p-2 border border-slate-100">
                        <span class="font-semibold text-slate-700">16</span>
                    </div>
                    <div class="h-24 p-2 border border-slate-100">
                        <span class="font-semibold text-slate-700">17</span>
                        <span
                            class="mt-2 inline-block text-[11px] px-2 py-1 rounded-full bg-indigo-100 text-indigo-700">Demo
                            sprint</span>
                    </div>
                    <div class="h-24 p-2 border border-slate-100 bg-slate-50">
                        <span class="font-semibold text-slate-700">18</span>
                    </div>
                    <div class="h-24 p-2 border border-slate-100 bg-slate-50">
                        <span class="font-semibold text-slate-700">19</span>
                    </div>

                    <div class="h-24 p-2 border border-slate-100">
                        <span class="font-semibold text-slate-700">20</span>
                    </div>
                    <div class="h-24 p-2 border border-slate-100">
                        <span class="font-semibold text-slate-700">21</span>
                        <span class="mt-2 inline-block text-[11px] px-2 py-1 rounded-full bg-rose-100 text-rose-700">Teste
                            integrado</span>
                    </div>
                    <div class="h-24 p-2 border border-slate-100">
                        <span class="font-semibold text-slate-700">22</span>
                    </div>
                    <div class="h-24 p-2 border border-slate-100">
                        <span class="font-semibold text-slate-700">23</span>
                    </div>
                    <div class="h-24 p-2 border border-slate-100">
                        <span class="font-semibold text-slate-700">24</span>
                        <span
                            class="mt-2 inline-block text-[11px] px-2 py-1 rounded-full bg-amber-100 text-amber-700">Comite
                            gestor</span>
                    </div>
                    <div class="h-24 p-2 border border-slate-100 bg-slate-50">
                        <span class="font-semibold text-slate-700">25</span>
                    </div>
                    <div class="h-24 p-2 border border-slate-100 bg-slate-50">
                        <span class="font-semibold text-slate-700">26</span>
                    </div>

                    <div class="h-24 p-2 border border-slate-100">
                        <span class="font-semibold text-slate-700">27</span>
                    </div>
                    <div class="h-24 p-2 border border-slate-100">
                        <span class="font-semibold text-slate-700">28</span>
                        <span
                            class="mt-2 inline-block text-[11px] px-2 py-1 rounded-full bg-emerald-100 text-emerald-700">Treinamento
                            piloto</span>
                    </div>
                    <div class="h-24 p-2 border border-slate-100">
                        <span class="font-semibold text-slate-700">29</span>
                    </div>
                    <div class="h-24 p-2 border border-slate-100">
                        <span class="font-semibold text-slate-700">30</span>
                        <span
                            class="mt-2 inline-block text-[11px] px-2 py-1 rounded-full bg-rose-100 text-rose-700">Release
                            candidato</span>
                    </div>
                    <div class="h-24 p-2 border border-slate-100 text-slate-300">1</div>
                    <div class="h-24 p-2 border border-slate-100 text-slate-300">2</div>
                    <div class="h-24 p-2 border border-slate-100 text-slate-300">3</div>
                </div>
            </div>

            <div class="mt-6 flex flex-wrap gap-3 text-xs">
                <span class="px-3 py-1 rounded-full bg-indigo-100 text-indigo-700">Planejamento</span>
                <span class="px-3 py-1 rounded-full bg-amber-100 text-amber-700">Alinhamento</span>
                <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700">Validacao</span>
                <span class="px-3 py-1 rounded-full bg-rose-100 text-rose-700">Qualidade/Release</span>
            </div>
        </div>
    </section>

    <section class="py-14 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-slate-900 mb-6">Proximos marcos planejados</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="border border-slate-200 rounded-xl p-5">
                    <p class="text-sm text-slate-500">12/05/2026</p>
                    <h3 class="font-bold text-slate-800 mt-1">Inicio do modulo de frequencia inteligente</h3>
                    <p class="text-slate-600 text-sm mt-2">Implementacao de regras de alerta por ausencia consecutiva.</p>
                </div>
                <div class="border border-slate-200 rounded-xl p-5">
                    <p class="text-sm text-slate-500">03/07/2026</p>
                    <h3 class="font-bold text-slate-800 mt-1">Entrega beta para escola parceira</h3>
                    <p class="text-slate-600 text-sm mt-2">Ambiente piloto com suporte dedicado para observacao de uso
                        real.</p>
                </div>
                <div class="border border-slate-200 rounded-xl p-5">
                    <p class="text-sm text-slate-500">18/09/2026</p>
                    <h3 class="font-bold text-slate-800 mt-1">Homologacao com gestao academica</h3>
                    <p class="text-slate-600 text-sm mt-2">Checklist de conformidade pedagogica e juridica antes do
                        go-live.</p>
                </div>
                <div class="border border-slate-200 rounded-xl p-5">
                    <p class="text-sm text-slate-500">25/11/2026</p>
                    <h3 class="font-bold text-slate-800 mt-1">Go-live controlado</h3>
                    <p class="text-slate-600 text-sm mt-2">Ativacao gradual por perfil com monitoramento diario de
                        incidentes.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-white border-t border-slate-200 py-10">
        <div class="max-w-7xl mx-auto px-4 text-center text-slate-500 text-sm">
            &copy; 2026 EduConnect - Sistema Escolar Integrado. Todos os direitos reservados.
        </div>
    </footer>
@endsection
