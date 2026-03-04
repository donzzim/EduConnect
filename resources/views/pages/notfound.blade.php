{{-- resources/views/errors/404.blade.php --}}
@extends('layouts.site')

@push('title')
    404
@endpush

@section('content')
    <div class="min-h-screen bg-slate-50 flex items-center justify-center px-4 py-6">
        <div class="w-full max-w-3xl">
            <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">
                {{-- Header --}}
                <div class="flex items-center justify-between px-5 sm:px-6 py-3.5 border-b border-slate-200">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <div
                            class="flex items-center justify-center w-9 h-9 bg-indigo-600 rounded-xl shadow-md shadow-blue-200">
                            <i class="fas fa-graduation-cap text-white"></i>
                        </div>
                        <span class="text-lg sm:text-xl font-extrabold tracking-tight">
                            <span class="text-indigo-600">EDU</span><span class="text-slate-800">CONNECT</span>
                        </span>
                    </a>

                    <span
                        class="hidden sm:inline-flex items-center gap-2 text-xs font-semibold text-slate-600 bg-slate-100 px-3 py-1.5 rounded-full">
                        <i class="fa-solid fa-triangle-exclamation text-amber-500"></i>
                        Página não encontrada
                    </span>
                </div>

                {{-- Body --}}
                <div class="px-5 sm:px-6 py-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                        {{-- Left --}}
                        <div>
                            <div class="flex items-end gap-3 mb-3">
                                <span class="text-5xl sm:text-6xl font-extrabold text-slate-900 leading-none">404</span>
                                <span class="text-[11px] font-bold tracking-widest uppercase text-indigo-600 pb-1">
                                    Not Found
                                </span>
                            </div>

                            <h1 class="text-xl sm:text-2xl font-extrabold text-slate-900 leading-snug mb-2">
                                Não encontramos essa página.
                            </h1>

                            <p class="text-sm text-slate-600 leading-relaxed mb-5">
                                O link pode estar incorreto ou a página foi movida. Use um atalho abaixo para continuar.
                            </p>

                            <div class="w-full">
                                <a href="{{ route('home') }}"
                                    class="w-full flex items-center justify-center bg-slate-900 text-white px-4 py-2.5 rounded-xl font-semibold hover:bg-indigo-600 transition-all shadow-sm">
                                    <i class="fa-solid fa-house mr-2"></i>
                                    Voltar para o início
                                </a>
                            </div>

                            <div class="mt-4 text-xs text-slate-500">
                                Precisa de ajuda? <span class="font-semibold text-slate-700">suporte@educonnect.local</span>
                            </div>
                        </div>

                        {{-- Right --}}
                        <div class="bg-indigo-50 rounded-3xl p-4 sm:p-5 border border-indigo-100">
                            <div class="bg-white rounded-2xl border border-slate-100 p-4">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="font-bold text-slate-700 text-sm">Rotas rápidas</span>
                                    <span
                                        class="text-[10px] font-semibold text-indigo-600 bg-indigo-50 px-2 py-1 rounded-full">
                                        Ajuda
                                    </span>
                                </div>

                                <div class="space-y-2.5">
                                    <a href="{{ route('home') }}"
                                        class="flex items-center justify-between p-2.5 rounded-xl border border-slate-200 hover:bg-slate-50 transition">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-9 h-9 rounded-xl bg-indigo-600 text-white flex items-center justify-center">
                                                <i class="fa-solid fa-house text-sm"></i>
                                            </div>
                                            <div>
                                                <div class="font-semibold text-slate-800 text-sm leading-tight">Página
                                                    Inicial</div>
                                                <div class="text-[11px] text-slate-500 leading-tight">Visão geral</div>
                                            </div>
                                        </div>
                                        <i class="fa-solid fa-arrow-right text-slate-400 text-[10px]"></i>
                                    </a>

                                    <a href="/admin"
                                        class="flex items-center justify-between p-2.5 rounded-xl border border-slate-200 hover:bg-slate-50 transition">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-9 h-9 rounded-xl bg-emerald-600 text-white flex items-center justify-center">
                                                <i class="fa-solid fa-gauge text-sm"></i>
                                            </div>
                                            <div>
                                                <div class="font-semibold text-slate-800 text-sm leading-tight">Painel</div>
                                                <div class="text-[11px] text-slate-500 leading-tight">Admin / Professor
                                                </div>
                                            </div>
                                        </div>
                                        <i class="fa-solid fa-arrow-right text-slate-400 text-[10px]"></i>
                                    </a>

                                    <a href="{{ route('about') }}"
                                        class="flex items-center justify-between p-2.5 rounded-xl border border-slate-200 hover:bg-slate-50 transition">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-9 h-9 rounded-xl bg-slate-900 text-white flex items-center justify-center">
                                                <i class="fa-solid fa-circle-info text-sm"></i>
                                            </div>
                                            <div>
                                                <div class="font-semibold text-slate-800 text-sm leading-tight">Saiba mais
                                                </div>
                                                <div class="text-[11px] text-slate-500 leading-tight">Sobre o SISAPRE</div>
                                            </div>
                                        </div>
                                        <i class="fa-solid fa-arrow-right text-slate-400 text-[10px]"></i>
                                    </a>
                                </div>

                                <div class="mt-3 p-3 rounded-2xl bg-slate-50 border border-slate-200">
                                    <div class="flex items-start gap-3">
                                        <div
                                            class="w-9 h-9 rounded-xl bg-amber-500 text-white flex items-center justify-center flex-shrink-0">
                                            <i class="fa-solid fa-lightbulb text-sm"></i>
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-800 text-sm leading-tight">Dica</div>
                                            <p class="text-xs text-slate-600 mt-0.5 leading-snug">
                                                Confira o endereço ou use um dos atalhos.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                {{-- Footer --}}
                <div class="px-5 sm:px-6 py-3.5 border-t border-slate-200 text-center text-slate-500 text-xs">
                    &copy; 2026 EduConnect - Sistema Escolar Integrado.
                </div>
            </div>
        </div>
    </div>
@endsection
