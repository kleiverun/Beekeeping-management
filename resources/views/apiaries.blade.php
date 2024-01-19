<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Alle bigårder</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <style>
        /* Your existing styles here */
        #map {
            height: 300px; /* Adjust the height as needed */
            display: none;
        }
             /* Add this CSS to your stylesheet or in a style tag in your HTML file */
         .arrow-container {
             display: inline-block;
             transition: transform 0.3s ease; /* Adjust the transition duration and timing function as needed */
         }

        a:hover .arrow-container svg {
            transform: rotate(-90deg) translateY(10px); /* Adjust the values as needed */
        }
    </style>
    </style>
</head>

<body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alle dine bigårder') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto px-4 lg:px-0">
                @include('components.apiary-card')
        </div>

    </div>
</x-app-layout>
</body>

</html>
