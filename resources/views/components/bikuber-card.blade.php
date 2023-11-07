@foreach ($bikuber as $bikube)
<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="p-5">
        <!-- Bee Image -->
        <img class="rounded-t-lg" src="{{ asset('storage/img/bikube.jpg') }}" alt="Bee Image" />

        <!-- Beehive Details -->
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            Bikube #{{ $bikube->id }}
        </h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            Identifikasjon: {{ $bikube->identifikasjon }}
        </p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            Styrke på bikube: {{ $bikube->estimertStyrke }}
        </p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            Antall skattekasser: {{ $bikube->antallSkattekasser }}
        </p>

        <!-- View Details Button -->
        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-600 rounded-lg hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-800 dark:bg-yellow-500 dark:hover:bg-yellow-600 dark:focus:ring-yellow-700">
            View Details
            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
</div>
@endforeach
