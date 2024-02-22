@props(['apiaries'])
@if(!$apiaries->isEmpty())
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 max-w-7xl mx-auto">
        @foreach ($apiaries as $apiary)
            <div class="relative flex flex-col text-gray-700 bg-orange-100 shadow-md rounded-xl bg-clip-border space-x-4 ">
                <div class="p-6">
                    <h5 class="block mb-2 font-sans text-xl font-semibold leading-snug tracking-normal text-gray-900">
                        {{ $apiary->name }}
                    </h5>
                    <p class="block font-sans text-base font-light leading-relaxed text-inherit text-orange-500">
                        {{ $apiary->address }}
                    </p>
                    @if ($apiary->latitude != null && $apiary->longitude != null)
                        <div id="map_{{ $apiary->id }}" class="leaflet-map" style="height: 200px;"></div>
                    @endif
                </div>

                <div class="p-6 pt-0">
                    <a href="{{ route('hive.index', ['id' => $apiary->id]) }}"
                       class="inline-block bg-orange-500 text-white font-bold py-2 px-4 rounded-full transition-all shadow-md shadow-orange-500/20 transition-all hover:shadow-lg hover:shadow-orange-500/40 focus:opacity-[0.85] focus:shadow-none ">
                        <span class="inline-block mr-2">Se bikuber</span>
                        <div class="arrow-container">
                            <svg class="inline-block w-4 h-4 align-middle transition-transform transform-none"
                                 xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2"
                                 stroke-linecap="round"
                                 stroke-linejoin="round" aria-hidden="true" alt="Arrow Icon">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </div>
                    </a>
                </div>
                <div class="p-6 pt-0">
                    <a href="{{ route('AllInspectionController.index', ['id' => $apiary->id]) }}"
                       class="inline-block bg-orange-500 text-white font-bold py-2 px-4 rounded-full transition-all shadow-md shadow-orange-500/20 transition-all hover:shadow-lg hover:shadow-orange-500/40 focus:opacity-[0.85] focus:shadow-none ">
                        <span class="inline-block mr-2">Sjekk ut inspeksjonene </span>
                        <div class="arrow-container">
                            <svg class="inline-block w-4 h-4 align-middle transition-transform transform-none"
                                 xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2"
                                 stroke-linecap="round"
                                 stroke-linejoin="round" aria-hidden="true" alt="Arrow Icon">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </div>
                    </a>
                </div>

                @if ($apiary->latitude != null && $apiary->longitude != null)
                    <script>
                        var map_{{ $apiary->id }} = L.map('map_{{ $apiary->id }}').setView([{{ $apiary->latitude }}, {{ $apiary->longitude }}], 5);
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; OpenStreetMap contributors'
                        }).addTo(map_{{ $apiary->id }});
                        L.marker([{{ $apiary->latitude }}, {{ $apiary->longitude }}]).addTo(map_{{ $apiary->id }});
                    </script>
                @endif
            </div>
        @endforeach
    </div>
@else
    <div class="text-center items-c">
        <div class="bg-white p-8 rounded-lg shadow-lg w-96 inline-block">
            <p class="text-lg mb-4">Du har ikke registrert noen bigårder ennå.</p>
            <form action="{{ url('/newApiary') }}" method="get">
                @csrf
                <x-button type="submit"
                          class="text-white bg-orange-500 hover:bg-orange-700 transition-transform duration-300 transform hover:scale-110">
                    Opprett en ny bigård
                </x-button>
            </form>
        </div>
    </div>
@endif
<div class="flex justify-center mt-4">
    {{ $apiaries->links() }}
</div>
