<div class="flex justify-center items-center h-1/2 w-2/2 ">
    <div class="w-full max-w-xs">
        @csrf
      <form method="POST" action=""  class="shadow-md rounded-lg mt-20 bg-menu-orange p-6">
        <div class="mb-4">
            <div>
                <x-label for="bigard" value="{{ __('Bigård') }}" />
                <x-input id="first name" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus autocomplete="firstname" />
            </div>
        <div class="flex items-center justify-between">
            <x-button class="ml-4">
                {{ __('Registrer') }}
            </x-button>

        </div>
      </form>

    </div>
  </div>
