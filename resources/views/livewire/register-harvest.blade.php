<div class="flex justify-center items-center">
    <div class="max-w-md mx-auto p-4 bg-white shadow-md rounded-md">
        <p class="text-center text-lg font-semibold mb-4">Register Harvest</p>

        <form wire:submit.prevent="yourMethod">
            @csrf

            <!-- Use wire:model to bind the selected hive ID -->
            <select wire:model="selectedHiveId" required name="hiveId" id="hive" class="mt-1 mb-4 w-full bg-white border border-gray-300 text-black py-2 px-3 rounded-lg focus:outline-none focus:border-gray-500">
                <x-hives-select :hives="$hives" />
            </select>

            <!-- Conditionally show the rest of the form if a hive ID is selected -->
            @if ($selectedHiveId)
                <x-label for="harvestWeight" value="{{ __('Honning vekt: ') }}" />
                <x-input wire:model="harvestWeight" id="harvestWeight" class="mt-1 mb-4 w-full" type="number" name="harvestWeight" required autofocus autocomplete="harvestWeight" />

                <x-label for="supersHarvested" value="{{ __('Antall skattekasser innhøstet: ') }}" />
                <x-input wire:model="supersHarvested" id="supersHarvested" class="mt-1 mb-4 w-full" type="number" name="supersHarvested" required autofocus autocomplete="supersHarvested" />

                <x-label for="harvestDate" value="{{ __('Dato for innhøsting: ') }}" />
                <x-input wire:model="harvestDate" id="harvestDate" class="mt-1 mb-4 w-full" type="date" name="harvestDate" required autofocus autocomplete="harvestDate" />

                <x-label for="description" value="{{ __('Beskrivelse') }}" />
                <x-input wire:model="description" id="description" class="mt-1 mb-4 w-full lg:w-2/3 xl:w-1/2" type="text" name="description" required autofocus autocomplete="description" />

                <button type="button" wire:click="selectAllSupers()" class="mb-4">Select All Supers</button>
            @endif

            <button type="submit" class="bg-orange-500 hover:bg-green-500 text-white py-2 px-4 rounded-md transition-all duration-300">
                {{ __('Registrer innhøsting') }}
            </button>
        </form>
    </div>
</div>
