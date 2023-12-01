<div>
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
    <form action="." method="post">
        <x-label for="queenName" value="{{ __('Dronningens navn') }}" />
        <x-input id="queenName" class="block mt-1 w-full" type="text" name="queenName"
            :value="old('queenName')" required autofocus autocomplete="queenName" />
        <x-label for="queenBreed" value="{{ __('Dronningens rase') }}" />
        <x-input id="queenBreed" class="block mt-1 w-full" type="text" name="queenBreed"
            :value="old('queenBreed')" required autofocus autocomplete="queenBreed" />
        <button type="submit" class="bg-orange-500 hover:bg-green-500 text-white">
            {{ __('Registrer') }}
        </button>
        </form>

</div>
