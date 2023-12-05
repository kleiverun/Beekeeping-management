<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Registrer innhøsting av honning') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @if ($allHives->count() < 1 )
                    @php
                        redirect()->route('newHive')->with('message', 'Du har ingen bikuber registrert. Vennligst registrer en bikube før du registrerer innhøsting av honning.');
                    @endphp
                @endif
                @livewire('RegisterHarvest')
            </div>
        </div>
    </div>


</x-app-layout>
