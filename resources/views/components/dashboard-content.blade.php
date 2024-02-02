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
    <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
        {{__('Your hives')}}
    </h2>
    @if($cordinates->isNotEmpty())
        <div class="mt-5" id="map">
        <script>
            map = L.map('map').setView([0, 0], 2);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);
            @foreach($cordinates as $cordinate)
            L.marker([{{ $cordinate->latitude }}, {{ $cordinate->longitude }}]).addTo(map)
                .bindPopup('{{ $cordinate->name }}')
                .openPopup();
            @endforeach
        </script>
    @endif
        </div>
</div>


