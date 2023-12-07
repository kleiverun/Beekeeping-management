@props(['harvests'])

<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
    @foreach($harvests as $harvest)
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md">
            <div class="p-5">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-orange-500 ">
                    Innhøsting {{$harvest->id}}
                </h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-700">
                    Vekt: {{ $harvest->harvestWeight }} kg
                </p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-700">
                    Antall skattekasser: {{ $harvest->supersHarvested }}
                </p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-700">
                    Dato: {{ $harvest->dateHarvested }}
                </p>
            </div>
            <!-- You can add delete button or any other actions here -->
            <!-- <button type="button" class="absolute text-red-500 top-2 right-2 hover:text-red-700 focus:outline-none" onclick="deleteHarvest({{ $harvest->id }})">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button> -->
        </div>
    @endforeach
</div>
