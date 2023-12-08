<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alle bikuber') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

                @foreach ($allHives as $hive)
                   @livewire('skattekasser-updater', ['allHives' => $allHives])
                @endforeach
            </div>
        </div>
    </div>


</x-app-layout>
