@extends('layouts.site')

@push('title')
    Contato
@endpush

@section('content')
    <header class="py-14 bg-gradient-to-b from-white to-slate-100 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-indigo-600 font-semibold uppercase tracking-widest text-xs">
                Fale Conosco
            </p>

            <h1 class="mt-3 text-4xl md:text-5xl font-extrabold text-slate-900">
                Entre em contato com o EduConnect
            </h1>

            <p class="mt-5 text-slate-600 max-w-3xl">
                Estamos prontos para esclarecer dúvidas, receber sugestões e apoiar instituições interessadas
                em conhecer melhor a proposta do sistema. Utilize nossos canais de contato ou envie uma mensagem
                diretamente pelo formulário.
            </p>

            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white border border-slate-200 rounded-2xl p-5">
                    <p class="text-sm text-slate-500">Atendimento</p>
                    <p class="text-xl font-bold text-slate-900 mt-1">Seg a Sex</p>
                    <p class="text-sm text-slate-600 mt-2">
                        Das 08h às 18h
                    </p>
                </div>

                <div class="bg-white border border-slate-200 rounded-2xl p-5">
                    <p class="text-sm text-slate-500">Contato principal</p>
                    <p class="text-xl font-bold text-slate-900 mt-1">(27) 3333-2048</p>
                    <p class="text-sm text-slate-600 mt-2">
                        Atendimento institucional fictício
                    </p>
                </div>

                <div class="bg-white border border-slate-200 rounded-2xl p-5">
                    <p class="text-sm text-slate-500">Localização</p>
                    <p class="text-xl font-bold text-slate-900 mt-1">Vila Velha - ES</p>
                    <p class="text-sm text-slate-600 mt-2">
                        Endereço ilustrativo para apresentação do projeto
                    </p>
                </div>
            </div>
        </div>
    </header>

    <section class="py-14 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Informações de contato --}}
                <div class="lg:col-span-1 space-y-6">
                    <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm">
                        <div class="w-12 h-12 rounded-2xl bg-indigo-100 text-indigo-700 flex items-center justify-center text-xl">
                            <i class="fa-solid fa-building"></i>
                        </div>

                        <h2 class="mt-4 text-2xl font-bold text-slate-900">
                            Informações institucionais
                        </h2>

                        <p class="mt-3 text-slate-600 leading-relaxed">
                            Utilize os canais abaixo para contato com a equipe responsável pelo projeto EduConnect.
                        </p>

                        <div class="mt-6 space-y-5">
                            <div class="flex items-start gap-4">
                                <div class="mt-1 text-indigo-600 text-lg">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-slate-900">Endereço</p>
                                    <p class="text-slate-600 text-sm">
                                        Av. Champagnat, 1024, Centro<br>
                                        Vila Velha - ES, CEP 29100-012
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="mt-1 text-indigo-600 text-lg">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-slate-900">Telefones</p>
                                    <p class="text-slate-600 text-sm">
                                        (27) 3333-2048<br>
                                        (27) 99876-4521
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="mt-1 text-indigo-600 text-lg">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-slate-900">E-mails</p>
                                    <p class="text-slate-600 text-sm">
                                        contato@educonnect.edu.br<br>
                                        suporte@educonnect.edu.br
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="mt-1 text-indigo-600 text-lg">
                                    <i class="fa-solid fa-clock"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-slate-900">Horário de atendimento</p>
                                    <p class="text-slate-600 text-sm">
                                        Segunda a sexta-feira<br>
                                        08h00 às 18h00
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm">
                        <h3 class="text-xl font-bold text-slate-900">
                            Redes e canais digitais
                        </h3>

                        <p class="mt-3 text-slate-600 text-sm leading-relaxed">
                            Você também pode acompanhar novidades e entrar em contato pelos nossos canais digitais.
                        </p>

                        <div class="mt-5 space-y-3">
                            <a href="#"
                               class="flex items-center justify-between border border-slate-200 rounded-2xl px-4 py-3 hover:bg-slate-50 transition">
                                <span class="flex items-center gap-3 text-slate-700 font-medium">
                                    <i class="fa-brands fa-instagram text-pink-600"></i>
                                    @educonnect.oficial
                                </span>
                                <i class="fa-solid fa-arrow-up-right-from-square text-slate-400"></i>
                            </a>

                            <a href="#"
                               class="flex items-center justify-between border border-slate-200 rounded-2xl px-4 py-3 hover:bg-slate-50 transition">
                                <span class="flex items-center gap-3 text-slate-700 font-medium">
                                    <i class="fa-brands fa-linkedin text-blue-700"></i>
                                    EduConnect Institucional
                                </span>
                                <i class="fa-solid fa-arrow-up-right-from-square text-slate-400"></i>
                            </a>

                            <a href="#"
                               class="flex items-center justify-between border border-slate-200 rounded-2xl px-4 py-3 hover:bg-slate-50 transition">
                                <span class="flex items-center gap-3 text-slate-700 font-medium">
                                    <i class="fa-brands fa-whatsapp text-emerald-600"></i>
                                    (27) 99876-4521
                                </span>
                                <i class="fa-solid fa-arrow-up-right-from-square text-slate-400"></i>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Formulário + mapa --}}
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-white border border-slate-200 rounded-3xl p-6 md:p-8 shadow-sm">
                        <h2 class="text-2xl font-bold text-slate-900">
                            Envie sua mensagem
                        </h2>

                        <p class="mt-3 text-slate-600">
                            Preencha o formulário abaixo para falar com a equipe do projeto.
                        </p>

                        <form action="#" method="POST" class="mt-8">
                            @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">
                                        Nome completo
                                    </label>
                                    <input type="text" id="name" name="name"
                                           class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                           placeholder="Digite seu nome">
                                </div>

                                <div>
                                    <label for="phone" class="block text-sm font-semibold text-slate-700 mb-2">
                                        Telefone
                                    </label>
                                    <input type="text" id="phone" name="phone"
                                           class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                           placeholder="(27) 99999-9999">
                                </div>

                                <div class="md:col-span-2">
                                    <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">
                                        E-mail
                                    </label>
                                    <input type="email" id="email" name="email"
                                           class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                           placeholder="voce@exemplo.com">
                                </div>

                                <div class="md:col-span-2">
                                    <label for="subject" class="block text-sm font-semibold text-slate-700 mb-2">
                                        Assunto
                                    </label>
                                    <input type="text" id="subject" name="subject"
                                           class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                           placeholder="Digite o assunto da mensagem">
                                </div>

                                <div class="md:col-span-2">
                                    <label for="message" class="block text-sm font-semibold text-slate-700 mb-2">
                                        Mensagem
                                    </label>
                                    <textarea id="message" name="message" rows="6"
                                              class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                              placeholder="Escreva sua mensagem aqui..."></textarea>
                                </div>
                            </div>

                            <div class="mt-6 flex flex-col sm:flex-row gap-3">
                                <button type="submit"
                                        class="inline-flex items-center justify-center gap-2 bg-slate-900 text-white px-6 py-3 rounded-2xl font-semibold hover:bg-indigo-600 transition-all shadow-sm">
                                    <i class="fa-solid fa-paper-plane"></i>
                                    Enviar mensagem
                                </button>

                                <a href="{{ route('home') }}"
                                   class="inline-flex items-center justify-center gap-2 bg-white border border-slate-300 text-slate-700 px-6 py-3 rounded-2xl font-semibold hover:bg-slate-100 transition-all">
                                    <i class="fa-solid fa-house"></i>
                                    Voltar ao início
                                </a>
                            </div>
                        </form>
                    </div>

                    <div class="bg-white border border-slate-200 rounded-3xl p-6 md:p-8 shadow-sm">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-6">
                            <div>
                                <h2 class="text-2xl font-bold text-slate-900">
                                    Nossa localização
                                </h2>
                                <p class="mt-2 text-slate-600">
                                    Mapa ilustrativo com foco em Vila Velha - ES.
                                </p>
                            </div>

                            <div class="inline-flex items-center gap-2 text-sm text-slate-500">
                                <i class="fa-solid fa-map-location-dot text-indigo-600"></i>
                                Vila Velha - Espírito Santo
                            </div>
                        </div>

                        <div class="overflow-hidden rounded-3xl border border-slate-200">
                            <iframe
                                src="https://www.google.com/maps?q=Vila+Velha,+ES&output=embed"
                                width="100%"
                                height="420"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
