<div class="flex justify-center mt-10">
    <div class="bg-white p-8 w-full max-w-md rounded-lg shadow-2xl">
        <h1 class="text-3xl text-center mb-8">Opprett bigård</h1>
        <form method="POST" action="{{ route('ApiaryController.store') }}" class="p-6 mt-8">
            @csrf
            <div class="mb-4">
                <div>
                    <x-label for="name" value="{{ __('Bigårdens navn:') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                </div>
                <div>
                    <x-label for="address" value="{{ __('Bigårdens adresse: ') }}" />
                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                        autofocus autocomplete="address" />
                </div>

                <button class="flex items-center p-4 bg-blue-500 text-white rounded-full" id="showMapButton"
                    type="button">
                    <span class="mr-2">Trykk her for å velge lokasjon</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18l-2-4H8l-2 4V8h12v8z" />
                        </svg>
                </button>

                <!-- Your existing form fields go here -->
                <input type="hidden" id="latitudeInput" name="latitude" value="">
                <input type="hidden" id="longitudeInput" name="longitude" value="">

                <div id="map"></div>

                <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
                <script src="{{asset('js/map.js')}}"> </script>

            </div>

            <div class="flex justify-between">
                <x-button class="bg-orange-500 hover:bg-green-500 text-white">
                    {{ __('Registrer') }}
                </x-button>
            </div>
        </form>
    </div>
</div>
