<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        /* Your existing styles here */
        #map {
            height: 300px; /* Adjust the height as needed */
            display: none;
        }

         #popup-modal {
             display: true;
         }

        #close-modal:checked + #popup-modal {
            display: flex;
        }
    </style>

    <title>Ny kube</title>
</head>
<body>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Registrer ny bigård') }}
            </h2>
        </x-slot>
        <div class="py-12">



            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    @if(session('success'))
                        <p class="text-red-700"> {{session('success')}}</p>
                    @endif
                    <x-newapiary-form/>
                </div>

            </div>

        </div>
    </x-app-layout>

    </body>
</html>
