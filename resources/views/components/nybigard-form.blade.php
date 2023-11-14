<div class="flex justify-center mt-10">
    <div class="bg-white p-8 w-full max-w-md rounded-lg shadow-2xl">
        <h1 class="text-3xl text-center mb-8">Opprett bigård</h1>
        <form method="POST" action="{{ route('ApiaryController.store') }}" class="p-6 mt-8">
            @csrf
            <div class="mb-4">
                <div>
                    <x-label for="navn" value="{{ __('Navn') }}" />
                    <x-input id="navn" class="block mt-1 w-full" type="text" name="navn" :value="old('navn')" required autofocus autocomplete="navn" />
                </div>
                <div>
                    <x-label for="adress" value="{{ __('Adresse') }}" />
                    <x-input id="adress" class="block mt-1 w-full" type="text" name="adress" :value="old('adress')" required autofocus autocomplete="adress" />
                </div>
            </div>

            <div class="flex justify-between">
                <x-button class="bg-orange-500 hover:bg-green-500 text-white">
                    {{ __('Registrer') }}
                </x-button>
            </div>
        </form>
    </div>
</div>
