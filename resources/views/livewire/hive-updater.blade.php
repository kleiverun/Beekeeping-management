<div class="max-w-sm bg-white border-2 border-white rounded-lg shadow dark:bg-gray-800 dark:border-orange-900 relative">
    <!-- Delete Button -->
    <button type="button" class="absolute top-2 right-2 text-red-500 hover:text-red-700 focus:outline-none" onclick="deleteBikube({{ $hive->id }})">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
            <path d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>
    <div class="p-5">
        <!-- Bee Image -->
        <img class="rounded-t-lg text-white" src="{{ asset('storage/img/hive.jpg') }}" alt="Bee Image" />

        <!-- Beehive Details -->
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-orange-500">
            Bikube #{{ $hive->id }}
        </h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-white">
            Identifikasjon: {{ $hive->hiveDescription }}
        </p>

        <p class="mb-3 font-normal dark:text-white">
            Bikubens estimerte styrke:
            <span class="text-gradient-{{ $hive->hiveStrength }}">
                {{ $hive->hiveStrength }}
            </span>
        </p>

        <p class="mb-3 font-normal text-gray-700 dark:text-white">
            Antall skattekasser:
            <span class="text-gradient-{{ $hive->super }}">
                {{ $hive->super }}
            </span>
        </p>

        <button wire:click="increaseSuper" wire:loading.attr="disabled" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50">
            + Legg til skattekasse
        </button>

        <button wire:click="decreaseSuper" wire:loading.attr="disabled" class="px-4 py-2 text-white bg-red-500 rounded-lg mt-2 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-opacity-50">
            - Fjern skattekasse
        </button>

    </div>
</div>
