<div class="flex justify-center items-center h-1/2 w-2/2 ">
    <div class="w-full max-w-xs">
        @csrf
      <form method="POST" action="{{Route('bigårder.store')}}"  class="shadow-md rounded-lg mt-20 bg-menu-orange p-6">
        @csrf
        <div class="mb-4">
            <div>
                <x-label for="navn" value="{{ __('Navn') }}" />
                <x-input id="navn" class="block mt-1 w-full" type="text" name="navn" :value="old('navn')" required autofocus autocomplete="navn" />
            </div>
            <div>
                <!-- Change this to get the id from the authenticated user /> -->
                <x-label for="users_id" value="{{ __('user_id') }}" />
                <x-input id="users_id" class="block mt-1 w-full" type="text" name="users_id" :value="old('users_id')" required autofocus autocomplete="users_id" />
            </div>
            <div>
                <x-label for="adress" value="{{ __('Adress') }}" />
                <x-input id="adress" class="block mt-1 w-full" type="text" name="adress" :value="old('adress')" required autofocus autocomplete="adress" />
            </div>
        <div class="flex items-center justify-between">
            <x-button class="ml-4">
                {{ __('Registrer') }}
            </x-button>

        </div>
      </form>

    </div>
  </div>
