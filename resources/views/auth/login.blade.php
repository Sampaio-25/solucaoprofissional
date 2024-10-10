<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('imagens/logo.png') }}" alt="Logo" class="mx-auto custom-logo" />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

       
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="senha" value="{{ __('Senha') }}" />
                <x-input id="senha" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Lembre-me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 me-4 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                    {{ __('Criar Cadastro') }}
                </a>

                <x-button class="bg-green-400 hover:bg-green-500 text-white">
                    {{ __('Entrar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<style>
    .custom-logo {
        height: 9rem; /* Ajuste a altura conforme necessário */
        width: auto; /* Mantém a proporção da imagem */
        margin-bottom: -1rem; /* Adiciona espaço inferior ao logo */
    }
</style>
