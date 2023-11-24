<div class="flex justify-center mt-10">
    <div class="bg-white p-8 w-full max-w-md rounded-lg shadow-2xl">
        <h1 class="text-3xl text-center mb-8">Opprett bigård</h1>
        <form method="POST" action="{{ route('ApiaryController.store') }}" class="p-6 mt-8">
            @csrf
            <div class="mb-4">
                <div>
                    <x-label for="navn" value="{{ __('Navn') }}" />
                    <x-input id="navn" class="block mt-1 w-full" type="text" name="navn" :value="old('navn')" required autofocus autocomplete="navn" />
                </div>
                <div>
                    <x-label for="adress" value="{{ __('Adresse') }}" />
                    <x-input id="adress" class="block mt-1 w-full" type="text" name="adress" :value="old('adress')" required autofocus autocomplete="adress" />
                </div>

                <button class="flex items-center p-4 bg-blue-500 text-white rounded-full" id="showMapButton" type="button">
                    <span class="mr-2">Trykk her for å velge lokasjon</span>
                    <div>
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18l-2-4H8l-2 4V8h12v8z"/>
                      </svg>
                    </div>
                  </button>


            <div id="map"></div>

            <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
            <script>
                let map;
                let markers = [];

                // Function to initialize the map
                function initMap() {
                    map = L.map('map').setView([0, 0], 2); // Centered at (0, 0) with zoom level 2
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '© OpenStreetMap contributors'
                    }).addTo(map);
                }

                // Button click event to show/hide the map
                const showMapButton = document.getElementById('showMapButton');
                const mapContainer = document.getElementById('map');

                showMapButton.addEventListener('click', () => {
                    if (!map) {
                        initMap(); // Initialize the map if not already initialized
                    }

                    mapContainer.style.display = mapContainer.style.display === 'none' ? 'block' : 'none'; // Toggle map visibility

                    if (mapContainer.style.display === 'block') {
                        // Ensure the map is visible after initializing
                        map.invalidateSize();

                        // Clear existing markers
                        markers.forEach(marker => map.removeLayer(marker));
                        markers = [];

                        // Add click event to the map to place a marker
                        map.on('click', (e) => {
                            const lat = e.latlng.lat.toFixed(4);
                            const lng = e.latlng.lng.toFixed(4);

                            // Log the marker's coordinates (you can customize this part)
                            console.log(`Latitude: ${lat}, Longitude: ${lng}`);

                            // Remove existing markers
                            markers.forEach(marker => map.removeLayer(marker));
                            markers = [];

                            // Add a marker to the map
                            const newMarker = L.marker([lat, lng]).addTo(map);
                            markers.push(newMarker);
                        });
                    }
                });
            </script>
            </div>

            <div class="flex justify-between">
                <x-button class="bg-orange-500 hover:bg-green-500 text-white">
                    {{ __('Registrer') }}
                </x-button>
            </div>
        </form>
    </div>
</div>
