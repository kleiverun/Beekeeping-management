@if( ! $apiaries->isEmpty() )
    @foreach ($apiaries as $apiary)
        <div class="relative flex flex-col text-gray-700 bg-white shadow-md w-96 rounded-xl bg-clip-border space-x-4">
            <div class="p-6">
                <h5 class="block mb-2 font-sans text-xl font-semibold leading-snug tracking-normal text-gray-900">
                    {{ $apiary->name }}
                </h5>
                <p class="block font-sans text-base font-light leading-relaxed text-inherit text-orange-500">
                    {{ $apiary->address }}
                </p>
                @if ($apiary->latitude != null && $apiary->longitude != null)
                    {{-- Map container --}}
                    <div id="map_{{ $apiary->id }}" class="leaflet-map" style="height: 200px;">
                    </div>    {{-- Initialize map for each apiary --}}
                    <script>
                        var map_{{ $apiary->id }} = L.map('map_{{ $apiary->id }}').setView([{{ $apiary->latitude }}, {{ $apiary->longitude }}], 5);
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; OpenStreetMap contributors'
                        }).addTo(map_{{ $apiary->id }});
                        L.marker([{{ $apiary->latitude }}, {{ $apiary->longitude }}]).addTo(map_{{ $apiary->id }});
                    </script>
                @endif
            </div>

            <div class="p-6 pt-0">
                <a href="{{ route('hive.index', ['id' => $apiary->id]) }}"
                   class="select-none rounded-lg bg-orange-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-orange-500/20 transition-all hover:shadow-lg hover:shadow-orange-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                    <span class="inline-block mr-2">Se bikuber</span>
                    <svg class="inline-block w-4 h-4 align-middle" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </a>
            </div>
        </div>
    @endforeach

@else
    <div class="text-center items-c">
        <div class="bg-white p-8 rounded-lg shadow-lg w-96 inline-block">
            <p class="text-lg mb-4">Du har ikke registrert noen bigårder ennå.</p>
            <form action="{{ url('/newApiary') }}" method="get">
                @csrf
                <x-button type="submit" class="text-white bg-orange-500 hover:bg-orange-700 transition-transform duration-300 transform hover:scale-110">
                    Opprett en ny bigård
                </x-button>

            </form>
        </div>
    </div>

@endif
