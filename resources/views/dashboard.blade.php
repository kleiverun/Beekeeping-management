<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Vue directive, adjust based on your project setup -->
    @vite('resources/css/app.css')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Leaflet styles and scripts -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <style>
        /* Your existing styles here */
        #map {
            height: 300px; /* Adjust the height as needed */
            /* display: none; */ /* Commenting out the display: none; to show the map */
        }
    </style>
</head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Your Vue or Blade component content -->
                <x-dashboard-content :cordinates="$cordinates" />
            </div>
        </div>
    </div>
</x-app-layout>

</html>
