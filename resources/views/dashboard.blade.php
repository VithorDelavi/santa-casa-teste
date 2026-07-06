<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Sistema de Controle de Acesso - Santa Casa
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg p-8">

                <h3 class="text-2xl font-bold text-gray-800 mb-2">
                    Bem-vindo, {{ Auth::user()->name }}!
                </h3>

                <p class="text-gray-600 mb-6">
                    Você acessou o Sistema de Controle de Acesso da Santa Casa.
                </p>

                <div class="border rounded-lg p-5 bg-gray-50">
                    <h4 class="font-semibold text-lg mb-3">
                        Informações da sessão
                    </h4>

                    <ul class="space-y-2 text-gray-700">
                        <li>
                            <strong>Perfil:</strong>
                            {{ Auth::user()->getRoleNames()->first() }}
                        </li>

                        <li>
                            <strong>E-mail:</strong>
                            {{ Auth::user()->email }}
                        </li>
                    </ul>
                </div>

                <div class="mt-6 text-gray-600">
                    Utilize o menu superior para acessar as funcionalidades disponíveis para o seu perfil.
                </div>

            </div>

        </div>
    </div>
</x-app-layout>