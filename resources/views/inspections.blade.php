<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alle inspeksjoner for bigård')  }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto px-4 lg:px-8">
                <div class="w-full">
                    <x-inspectiontable :inspections="$inspections" />
                </div>
        </div>
    </div>
</x-app-layout>
