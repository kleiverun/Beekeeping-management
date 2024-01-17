<!-- The form in your Blade file -->
<div class="flex items-center justify-center">
    <div class="max-w-md p-4 mx-auto bg-white rounded-md shadow-md">
        <p class="mb-4 text-lg  text-center">Registrer innhøsting</p>

        <form wire:submit.prevent="newHarvest">
            @csrf
            <label for="hive">{{ __('Hvilken bikube har blitt innhøstet?') }}</label>
            <select wire:model="selectedHiveId" wire:change="handleHiveidChange" name="hiveId" id="hive"
                    class="w-full px-3 py-2 mt-1 mb-4 text-black bg-white border border-gray-300 rounded-lg focus:outline-none focus:border-gray-500">
                <option class="text-gray-400" value="0" selected>{{__('Velg bikube')}}</option>
                <x-hives-option :hives="$hives"/>
            </select>

            <!-- Display form elements only when a hive is selected -->
            @if ($selectedHiveId)
                <x-label for="harvestWeight" value="{{ __('Honning vekt i kg: ') }}"/>
                <x-input wire:model="harvestWeight" id="harvestWeight" class="w-full mt-1 mb-4" type="number"
                         name="harvestWeight" required autofocus autocomplete="harvestWeight" min="0" max="200"/>

                <x-label for="supersHarvested" value="{{ __('Antall skattekasser innhøstet: ') }}"/>
                <x-input wire:model="supersHarvested" id="supersHarvested" class="w-full mt-1 mb-4" type="number"
                         name="supersHarvested" required autofocus autocomplete="supersHarvested"
                         max="{{ $maxSkattekasser }}" min="0"/>


                <!-- Display an error message if the entered value exceeds the maximum -->
                @error('supersHarvested')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

                <x-label for="dateHarvested" value="{{ __('Dato for innhøsting: ') }}"/>
                <x-input wire:model="dateHarvested" id="dateHarvested" class="w-full mt-1 mb-4" type="date"
                         name="dateHarvested" required autofocus autocomplete="dateHarvested"/>

                <x-label for="description" value="{{ __('Skriv inn beskrivelse:') }}"/>
                <x-input wire:model="description" id="description" class="w-full mt-1 mb-4 lg:w-2/3 xl:w-1/2"
                         type="text" name="description" required autofocus autocomplete="description"/>

                <button type="button" wire:click="selectAllSupers()"
                        class="mb-4 transition-all duration-300 hover:bg-green-100 hover:border-green-500 focus:outline-none focus:border-green-500">
                    Velg alle skattekasser
                </button>
            @endif


            <button type="submit"
                    class="px-4 py-2 text-white transition-all duration-300 bg-orange-500 rounded-md hover:bg-orange-700 ">
                {{ __('Registrer innhøsting') }}
            </button>
        </form>
    </div>
</div>
