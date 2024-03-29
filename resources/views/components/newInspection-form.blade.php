<div class="flex items-center justify-center">
    <div class="max-w-md p-4 mx-auto bg-white rounded-md ">
        <p class="mb-4 text-lg font-semibold text-center">{{ __('Registrer inspeksjon') }}</p>
        <form action="{{route('InspectionController.store')}}" method="POST">
            @csrf
            <label for="hive" class="block text-sm mb-1">{{ __('Bikube:') }}</label>
            <select name="hive_id" id="hive" class="w-full px-3 py-2 mt-1 mb-4 text-black bg-white border border-gray-300 rounded-lg focus:outline-none focus:border-gray-500">
                @if(count($hives) === 0)
                    <option value="" disabled selected>Ingen kuber tilgjengelige</option>
                @else
                    <x-hives-option :hives="$hives"/>
                @endif
            </select>

            <label for="inspectionDate" class="block text-sm mb-1">{{ __('Dato for inspeksjonen:') }}</label>
            <x-input id="inspectionDate" class="w-full px-3 py-2 mb-4 text-black bg-white border border-gray-300 rounded-lg focus:outline-none focus:border-gray-500" type="date" name="inspectionDate" required autofocus autocomplete="inspectionDate"/>

            <label for="description" class="block text-sm mb-1">{{ __('Beskrivelse:') }}</label>
            <x-input id="description" class="w-full px-3 py-2 mb-4 text-black bg-white border border-gray-300 rounded-lg focus:outline-none focus:border-gray-500" type="text" name="description" required autofocus autocomplete="description"/>

            <button type="submit" class="w-full px-4 py-2 text-white transition-all duration-300 bg-orange-500 rounded-md hover:bg-green-500">
                {{ __('Opprett inspeksjon') }}
            </button>
        </form>
    </div>
</div>
