<x-guest-layout>
    <div class="animate-in fade-in slide-in-from-bottom-4 duration-700">
        <header class="mb-8">
            <h2 class="text-3xl font-bold tracking-tight text-slate-900">Login</h2>
            <p class="mt-2 text-sm text-slate-500">Insira suas credenciais para continuar.</p>
        </header>

        <x-auth-session-status class="mb-6 rounded-xl bg-emerald-50 p-4 text-sm text-emerald-700 border border-emerald-100" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div class="space-y-1.5">
                <x-input-label for="email" class="text-xs font-bold uppercase tracking-widest text-slate-400" :value="'E-mail ou Matrícula'" />
                <div class="group relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400 group-focus-within:text-cyan-600 transition-colors">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM5 19a7 7 0 1114 0"></path></svg>
                    </span>
                    <x-text-input id="email" class="block w-full rounded-xl border-slate-200 bg-slate-50 py-3 pl-11 text-sm transition focus:border-cyan-500 focus:ring-4 focus:ring-cyan-500/10" type="text" name="email" :value="old('email')" required autofocus />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs" />
            </div>

            <div class="space-y-1.5">
                <div class="flex items-center justify-between">
                    <x-input-label for="password" class="text-xs font-bold uppercase tracking-widest text-slate-400" :value="'Senha'" />
                    @if (Route::has('password.request'))
                        <a class="text-xs font-semibold text-cyan-600 hover:text-cyan-700" href="{{ route('password.request') }}">Esqueceu?</a>
                    @endif
                </div>
                <div class="group relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400 group-focus-within:text-cyan-600 transition-colors">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 11V7a4 4 0 10-8 0v4m14 0H6a2 2 0 00-2 2v5a2 2 0 002 2h12a2 2 0 002-2v-5a2 2 0 00-2-2z"></path></svg>
                    </span>
                    <x-text-input id="password" class="block w-full rounded-xl border-slate-200 bg-slate-50 py-3 pl-11 text-sm transition focus:border-cyan-500 focus:ring-4 focus:ring-cyan-500/10" type="password" name="password" required />
                </div>
            </div>

            <label class="flex items-center cursor-pointer group">
                <input type="checkbox" name="remember" class="h-4 w-4 rounded border-slate-300 text-cyan-600 focus:ring-cyan-500">
                <span class="ml-3 text-xs font-medium text-slate-500 group-hover:text-slate-700 transition">Manter minha sessão ativa</span>
            </label>

            <div class="pt-2">
                <button type="submit" class="flex w-full items-center justify-center rounded-xl bg-slate-950 py-3.5 text-sm font-bold text-white transition hover:bg-cyan-600 active:scale-[0.98]">
                    Acessar Plataforma
                </button>
                <p class="mt-6 text-center text-[11px] text-slate-400 uppercase tracking-tighter">
                    EduConnect &copy; {{ date('Y') }} &bull; Sistema Acadêmico
                </p>
            </div>
        </form>
    </div>
</x-guest-layout>
