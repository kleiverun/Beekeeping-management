<div class="max-w-md mx-auto p-4 bg-white shadow-md rounded-md">
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
    <h1 class="text-3xl text-center mb-8">Oprett dronning</h1>

    <form action="{{ route('NewQueenController.store') }}" method="post">
        @csrf
        <x-label for="queenBreed" value="{{ __('Dronningens rase') }}"/>
        <x-input id="queenBreed" class="mt-1 mb-4 w-full" type="text" name="queenBreed" :value="old('queenBreed')"
                 required autofocus autocomplete="queenBreed"/>

        <x-label for="queenDate" value="{{ __('Dronningens fødseldato') }}"/>
        <x-input id="queenDate" class="mt-1 mb-4 w-full" type="date" name="queenDate" :value="old('queenDate')" required
                 autofocus autocomplete="queenDate"/>

        <x-label for="queenDescription" value="{{ __('Dronningens beskrivelse') }}"/>
        <x-input id="queenDescription" class="mt-1 mb-4 w-full" type="text" name="queenDescription"
                 :value="old('queenDescription')" required autofocus autocomplete="queenDescription"/>
        <x-label for="hive" class="mt-4">Velg hvilken bikube dronningen er fra</x-label>
        <select required name="hiveId" id="hive"
                class="mt-1 mb-4 w-full bg-white border border-gray-300 text-black py-2 px-3 rounded-lg focus:outline-none focus:border-gray-500">

            <x-hives-select :hives="$hives"/>
        </select>
        <button type="submit"
                class="mt-4 bg-orange-500 hover:bg-green-500 text-white py-2 px-4 rounded-md transition-all duration-300">
            {{ __('Registrer') }}
        </button>
    </form>
</div>
