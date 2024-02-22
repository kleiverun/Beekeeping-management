let map;
let markers = [];

// Function to initialize the map
function initMap() {
    map = L.map("map").setView([0, 0], 2); // Centered at (0, 0) with zoom level 2
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: "© OpenStreetMap contributors",
    }).addTo(map);
}

// Button click event to show/hide the map
const showMapButton = document.getElementById("showMapButton");
const mapContainer = document.getElementById("map");
const latitudeInput = document.getElementById("latitudeInput");
const longitudeInput = document.getElementById("longitudeInput");

showMapButton.addEventListener("click", () => {
    if (!map) {
        initMap(); // Initialize the map if not already initialized
    }

    mapContainer.style.display =
        mapContainer.style.display === "none" ? "block" : "none"; // Toggle map visibility

    if (mapContainer.style.display === "block") {
        // Ensure the map is visible after initializing
        map.invalidateSize();

        // Clear existing markers
        markers.forEach((marker) => map.removeLayer(marker));
        markers = [];

        // Add click event to the map to place a marker
        map.on("click", (e) => {
            const lat = e.latlng.lat.toFixed(4);
            const lng = e.latlng.lng.toFixed(4);

            // Log the marker's coordinates (you can customize this part)
            console.log(`Latitude: ${lat}, Longitude: ${lng}`);

            // Update the hidden input fields with the clicked coordinates
            latitudeInput.value = lat;
            longitudeInput.value = lng;

            // Remove existing markers
            markers.forEach((marker) => map.removeLayer(marker));
            markers = [];

            // Add a marker to the map
            const newMarker = L.marker([lat, lng]).addTo(map);
            markers.push(newMarker);
        });
    }
});
