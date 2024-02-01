
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alle bikuber') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

                    @if(! $allHives -> isEmpty())
                        @foreach ($allHives as $hive)
                            @livewire('Hive-updater', ['hive' => $hive])
                        @endforeach
                @else
                    <div class="max-w-md mx-auto p-4 bg-white shadow-md rounded-md text-center">
                        <p class="text-orange-500 text-lg mb-4">Det er ingen bikuber registrert på denne bigårder</p>
                        <form action="{{ url('/newHive') }}" method="get">
                            @csrf
                            <x-button type="submit" class="bg-orange-500 hover:bg-blue-700 text-white py-2 px-4 rounded-md transition-all duration-300">
                                Legg til bikube
                            </x-button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>


</x-app-layout>
