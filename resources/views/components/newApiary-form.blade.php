<div class="flex justify-center mt-10">
    <div class="bg-white p-8 w-full max-w-md rounded-lg ">
        <h1 class="text-3xl text-center mb-8">Opprett bigård</h1>
        <form method="POST" action="{{ route('ApiaryController.store') }}" class="p-6 mt-8">
            @csrf
            <div class="mb-4">
                <div>
                    <x-label for="name" value="{{ __('Bigårdens navn:') }}"/>
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                             required autofocus autocomplete="name" maxlength="255"/>
                </div>
                <div>
                    <x-label for="address" value="{{ __('Bigårdens adresse: ') }}"/>
                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                             autofocus autocomplete="address" maxlength="255"/>
                </div>

                <x-button class="mt-3 flex items-center p-4 bg-orange-500 hover:bg-orange-600 text-white rounded-full"
                          id="showMapButton"
                          type="button">
                    Trykk her for å velge sted på kartet
                </x-button>

                <!-- Your existing form fields go here -->
                <input type="hidden" id="latitudeInput" name="latitude" value="">
                <input type="hidden" id="longitudeInput" name="longitude" value="">

                <div id="map"></div>

                <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
                <script src="{{asset('js/map.js')}}"></script>

            </div>

            <div class="flex justify-between">
                <x-button class="bg-orange-500 hover:bg-orange-600 ">
                    {{ __('Registrer') }}
                </x-button>
            </div>
        </form>
    </div>
</div>
