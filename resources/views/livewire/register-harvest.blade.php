<!-- The form in your Blade file -->
<div class="flex items-center justify-center">
    <div class="max-w-md p-4 mx-auto bg-white rounded-md shadow-md">
        <p class="mb-4 text-lg font-semibold text-center">Register Harvest</p>

        <form wire:submit.prevent="newHarvest">
            @csrf
            <!-- Use wire:model to bind the selected hive ID -->
            <select wire:model="selectedHiveId" name="hiveId" id="hive"
                    class="w-full px-3 py-2 mt-1 mb-4 text-black bg-white border border-gray-300 rounded-lg focus:outline-none focus:border-gray-500">
                <x-hives-option :hives="$hives" />
            </select>

            <!-- Display form elements only when a hive is selected -->
            @if ($selectedHiveId)
                <x-label for="harvestWeight" value="{{ __('Honning vekt i kg: ') }}" />
                <x-input wire:model="harvestWeight" id="harvestWeight" class="w-full mt-1 mb-4" type="number"
                         name="harvestWeight" required autofocus autocomplete="harvestWeight" />

                <x-label for="supersHarvested" value="{{ __('Antall skattekasser innhøstet: ') }}" />
                <x-input wire:model="supersHarvested" id="supersHarvested" class="w-full mt-1 mb-4" type="number"
                name="supersHarvested" required autofocus autocomplete="supersHarvested" max="{{ $maxSkattekasser }}" min="0" />


                <!-- Display an error message if the entered value exceeds the maximum -->
                @error('supersHarvested')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <x-label for="harvestDate" value="{{ __('Dato for innhøsting: ') }}" />
                <x-input wire:model="harvestDate" id="harvestDate" class="w-full mt-1 mb-4" type="date"
                         name="harvestDate" required autofocus autocomplete="harvestDate" />

                <x-label for="description" value="{{ __('Beskrivelse') }}" />
                <x-input wire:model="description" id="description" class="w-full mt-1 mb-4 lg:w-2/3 xl:w-1/2"
                         type="text" name="description" required autofocus autocomplete="description" />
            @endif

            <button type="button" wire:click="selectAllSupers()" class="mb-4">Select All Supers</button>

            <button type="submit"
                    class="px-4 py-2 text-white transition-all duration-300 bg-orange-500 rounded-md hover:bg-green-500">
                {{ __('Registrer innhøsting') }}
            </button>
        </form>
    </div>
</div>
