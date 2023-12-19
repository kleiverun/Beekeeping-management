<div class="flex items-center justify-center">
    <div class="max-w-md p-4 mx-auto bg-white rounded-md shadow-2xl shadow-orange-500">
        <p class="mb-4 text-lg font-semibold text-center">{{ __('Registrer inspeksjon') }}</p>
        <form action="#" method="POST">
            @csrf

            <label for="hive" class="block text-sm font-semibold mb-1">{{ __('Hive:') }}</label>
            <select name="hiveId" id="hive" class="w-full px-3 py-2 mt-1 mb-4 text-black bg-white border border-gray-300 rounded-lg focus:outline-none focus:border-gray-500">
                <x-hives-option :hives="$hives"/>
            </select>

            <label for="inspectionDate" class="block text-sm font-semibold mb-1">{{ __('Dato for inspeksjonen:') }}</label>
            <x-input id="inspectionDate" class="w-full px-3 py-2 mb-4 text-black bg-white border border-gray-300 rounded-lg focus:outline-none focus:border-gray-500" type="date" name="inspectionDate" required autofocus autocomplete="inspectionDate"/>

            <label for="description" class="block text-sm font-semibold mb-1">{{ __('Beskrivelse:') }}</label>
            <x-input id="description" class="w-full px-3 py-2 mb-4 text-black bg-white border border-gray-300 rounded-lg focus:outline-none focus:border-gray-500" type="text" name="description" required autofocus autocomplete="description"/>

            <button type="submit" class="w-full px-4 py-2 text-white transition-all duration-300 bg-orange-500 rounded-md hover:bg-green-500">
                {{ __('Opprett inspeksjon') }}
            </button>
        </form>
    </div>
</div>
