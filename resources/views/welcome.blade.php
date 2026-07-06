<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema de Controle de Acesso - Santa Casa</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-lg rounded-xl p-10 w-full max-w-xl text-center">

        <h1 class="text-4xl font-bold text-[#005B9A] mb-2">
            Santa Casa
        </h1>

        <h2 class="text-xl font-medium text-gray-700 mb-6">
            Sistema de Controle de Acesso
        </h2>
        
        <p class="text-gray-600 mb-8">
            Sistema desenvolvido para gerenciamento de usuários,
            perfis e permissões de acesso aos módulos internos da instituição.
        </p>

        <div class="flex justify-center gap-4">

            @auth

            <a href="{{ route('dashboard') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                Acessar Sistema
            </a>

            @else

            <a href="{{ route('login') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                Entrar
            </a>

            @if(Route::has('register'))
            <a href="{{ route('register') }}"
                class="border border-gray-300 hover:bg-gray-100 px-6 py-2 rounded-lg">
                Registrar
            </a>
            @endif

            @endauth

        </div>

        <p class="text-sm text-gray-400 mt-8">
            Desenvolvido em Laravel 13
        </p>

    </div>

</body>

</html>