<div class="w-96 mt-10 p-4 bg-white rounded-md mx-auto">
    <h1 class="text-3xl text-center mb-8">Opprett dronning</h1>

    <form action="{{ route('NewQueenController.store') }}" method="post">
        @csrf
        <x-label for="queenBreed" value="{{ __('Dronningens rase') }}"/>
        <x-input id="queenBreed" class="mt-1 mb-2 w-full" type="text" name="queenBreed" :value="old('queenBreed')"
                 required autofocus autocomplete="queenBreed" maxlength="255"/>

        <x-label for="queenDate" value="{{ __('Dronningens fødseldato') }}"/>
        <x-input id="queenDate" class="mt-1 mb-2 w-full" type="date" name="queenDate" :value="old('queenDate')" required
                 autofocus autocomplete="queenDate"/>

        <x-label for="queenDescription" value="{{ __('Dronningens beskrivelse') }}"/>
        <x-input id="queenDescription" class="mt-1 mb-4 w-full" type="text" name="queenDescription"
                 :value="old('queenDescription')" required autofocus autocomplete="queenDescription" maxlength="255"/>

        <x-label for="hive" value="{{ __('Hvilken kube skal dronningen tilhøre?') }}"/>
        <select name="hive_id" id="hive"
                class="w-full px-3 py-2 mt-1 mb-4 text-black bg-white border border-gray-300 rounded-lg focus:outline-none focus:border-gray-500">
            @if(count($hives) === 0)
                <option value="" disabled selected>Ingen kuber tilgjengelige</option>
            @else
                <x-hives-option :hives="$hives"/>
            @endif
        </select>
        <x-label for="queenMother" value="{{ __('Hvem er dronningens mor?') }}"/>
        <select name="queenMother" id="queenMother"
                class="w-full px-3 py-2 mt-1 mb-4 text-black bg-white border border-gray-300 rounded-lg focus:outline-none focus:border-gray-500">
            @if(count($queens) === 0)
                <option value="" disabled selected>Ingen dronninger tilgjengelige</option>
            @else
                <x-queen-option :queens="$queens"/>
            @endif
        </select>

        <button type="submit"
                class="mt-4 mb-10 bg-orange-500 hover:bg-green-500 text-white py-2 px-4 rounded-md transition-all duration-300 w-full block mx-auto">
            {{ __('Registrer') }}
        </button>
    </form>
</div>
