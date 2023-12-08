@props(['harvests'])

<div class="grid grid-cols-1 gap-4 pt-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
    @foreach($harvests as $harvest)
        <div class="max-w-md overflow-hidden bg-white border border-gray-300 rounded-lg shadow-md">
            <div class="p-6">
                <h5 class="mb-2 text-xl font-semibold text-orange-600">
                    Innhøsting {{$harvest->id}}
                </h5>
                <p class="mb-2 text-gray-600">
                    Vekt: {{ $harvest->harvestWeight }} kg
                </p>
                <p class="mb-2 text-gray-600">
                    Antall skattekasser: {{ $harvest->supersHarvested }}
                </p>
                <p class="mb-2 text-gray-600">
                    Dato: {{ $harvest->dateHarvested }}
                </p>
            </div>
        </div>
    @endforeach
</div>
