<x-guest-layout>
    <form method="POST" action="#" class="space-y-6">
        @csrf

        <div class="border-b border-gray-200 pb-4 mb-4">
            <h2 class="text-xl font-semibold text-indigo-600">Cadastro de Aluno</h2>
            <p class="text-sm text-gray-500">Preencha os dados acadêmicos e de acesso.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <x-input-label for="name" :value="__('Nome Completo')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="username" :value="__('Nº Matrícula')" />
                <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required placeholder="Ex: 20240001" />
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <div>
                <x-input-label for="documento" :value="__('Documento (CPF/RG)')" />
                <x-text-input id="documento" class="block mt-1 w-full" type="text" name="documento" :value="old('documento')" required />
                <x-input-error :messages="$errors->get('documento')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="data_nascimento" :value="__('Data de Nascimento')" />
                <x-text-input id="data_nascimento" class="block mt-1 w-full" type="date" name="data_nascimento" :value="old('data_nascimento')" required />
                <x-input-error :messages="$errors->get('data_nascimento')" class="mt-2" />
            </div>
        </div>

        <div class="mt-4">
            <x-input-label for="turma_id" :value="__('Turma')" />
            <select id="turma_id" name="turma_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="">Selecione uma turma</option>
                @foreach(\App\Models\Turma::all() as $turma)
                    <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('turma_id')" class="mt-2" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <div>
                <x-input-label for="responsavel" :value="__('Nome do Responsável')" />
                <x-text-input id="responsavel" class="block mt-1 w-full" type="text" name="responsavel" required />
            </div>
            <div>
                <x-input-label for="contato_responsavel" :value="__('Contato do Responsável')" />
                <x-text-input id="contato_responsavel" class="block mt-1 w-full" type="text" name="contato_responsavel" required />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4 border-t pt-4">
            <div>
                <x-input-label for="password" :value="__('Senha')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password_confirmation" :value="__('Confirmar Senha')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div>
        </div>

        <div class="flex items-center justify-end mt-6">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                Já possui cadastro?
            </a>

            <x-primary-button class="ms-4 bg-indigo-600">
                Finalizar Matrícula
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
