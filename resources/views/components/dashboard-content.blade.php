@props(['cordinates'])
<div class="p-6 lg:p-8 bg-orange border-b border-gray-200">
    <x-application-logo class="block h-12 w-auto"/>

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Welcome {{ Auth::user()->email }}!
    </h1>

    <p class="mt-6 text-gray-500 leading-relaxed">
        This software aims to create an elegant way to keep track of your bee needs.
    </p>
</div>

<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class="flex items-center space-x-4">
        @foreach([
            'dashboard' => 'Dashboard',
            'newHive' => 'Registrer et nytt bifolk',
            'newApiary' => 'Registrer en ny bigård',
            'apiaries' => 'Se dine bigårder og bikuber',
            'newQueen' => 'Registrer dronning',
            'newHarvest' => 'Registrer innhøsting',
        ] as $route => $label)
            <a href="{{ route($route) }}" class="bg-orange-500 text-white py-2 px-4 rounded-md transition-all duration-200 transform hover:scale-105">
                {{ __($label) }}
            </a>
        @endforeach
    </div>
    <script>
        map = L.map('map').setView([0, 0], 2); // Centered at (0, 0) with zoom level 2
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
            }).addTo(map);
            @foreach($cordinates as $cordinate)
            L.marker([{{ $cordinate->latitude }}, {{ $cordinate->longitude }}]).addTo(map)
            .bindPopup('{{ $cordinate->name }}')
            .openPopup();
            @endforeach
    </script>
</div>


