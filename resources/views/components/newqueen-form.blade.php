<div class="w-96 mt-10 p-4 bg-white rounded-md mx-auto">
    <h1 class="text-3xl text-center mb-8">Opprett dronning</h1>

    <form action="{{ route('NewQueenController.store') }}" method="post">
        @csrf
        <x-label for="queenBreed" value="{{ __('Dronningens rase') }}"/>
        <x-input id="queenBreed" class="mt-1 mb-2 w-full" type="text" name="queenBreed" :value="old('queenBreed')"
                 required autofocus autocomplete="queenBreed"/>

        <x-label for="queenDate" value="{{ __('Dronningens fødseldato') }}"/>
        <x-input id="queenDate" class="mt-1 mb-2 w-full" type="date" name="queenDate" :value="old('queenDate')" required
                 autofocus autocomplete="queenDate"/>

        <x-label for="queenDescription" value="{{ __('Dronningens beskrivelse') }}"/>
        <x-input id="queenDescription" class="mt-1 mb-4 w-full" type="text" name="queenDescription"
                 :value="old('queenDescription')" required autofocus autocomplete="queenDescription"/>

        <button type="submit"
                class="mt-4 mb-10 bg-orange-500 hover:bg-green-500 text-white py-2 px-4 rounded-md transition-all duration-300 w-full block mx-auto">
            {{ __('Registrer') }}
        </button>
    </form>
</div>
