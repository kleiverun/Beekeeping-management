<div class="flex justify-center items-center h-1/2 w-2/2 ">
    <div class="w-full max-w-xs">
        @csrf
      <form method="POST" action="{{route('bigard.store')}}"  class="shadow-md rounded-lg mt-20 bg-menu-orange p-6">
        <div class="mb-4">
            <div>
                <x-label for="bigard" value="{{ __('Bigård') }}" />
                <x-input id="bigard" class="block mt-1 w-full" type="text" name="bigard" :value="old('bigard')" required autofocus autocomplete="bigard" />
            </div>
            <div class="mb-4">
                <div>
                    <x-label for="Adress" value="{{ __('Adress') }}" />
                    <x-input id="Adress" class="block mt-1 w-full" type="text" name="adress" :value="old('Adress')" required autofocus autocomplete="adress" />
                </div>

        <div class="flex items-center justify-between">
            <x-button class="ml-4">
                {{ __('Registrer') }}
            </x-button>

        </div>
      </form>

    </div>
  </div>
