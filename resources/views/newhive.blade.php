<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Ny kube</title>
    <title>
        @yield('title', 'Beekeeper')
    </title>
</head>
<body >
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Registrer ny bikube') }}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <x-newhive-form :apiaries="$apiaries" :queens="$queens"/>
                </div>
            </div>
        </div>
    </x-app-layout>

    </body>
</html>
