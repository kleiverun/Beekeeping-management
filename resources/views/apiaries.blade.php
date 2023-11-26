<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>All apiaries</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <style>
        /* Your existing styles here */
        #map {
            height: 300px; /* Adjust the height as needed */
            display: none;
        }
    </style>

</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alle apiaries') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 ">
                    @include('components.bigard-card')
            </div>
        </div>
    </div>
</x-app-layout>
