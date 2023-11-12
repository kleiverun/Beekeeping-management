<div class="flex justify-center items-center h-1/2 w-2/3">
    <div class="w-full max-w-md">
        <form method="POST" action="{{ route('ApiaryController.store') }}" class="shadow-md rounded-lg bg-white p-6 mt-8">
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

            <div class="flex items-center justify-between">
                <x-button class="bg-orange-500 hover:bg-green-500 text-white">
                    {{ __('Registrer') }}
                </x-button>
            </div>
        </form>
    </div>
</div>
