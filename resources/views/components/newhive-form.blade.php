<div class="flex justify-center mt-10 ">
    <div class="bg-white p-8 w-full max-w-md rounded-lg shadow-2xl"> <!-- Increased shadow -->
        <h3 class="text-3xl font-extrabold text-orange-600 text-center mb-4">Registrer en ny bikube</h3>
        <form method="post" action="{{ url('registerHive') }}" class="max-w-sm mx-auto space-y-4">
            @csrf
            <div class="text-sm font-bold">Velg hvilken bigård denne kuben tilhører:</div>
            <select required name="apiary_id" id="hive"
                    class="block w-full bg-white border border-gray-300 text-black py-2 px-3 rounded-lg focus:outline-none focus:border-gray-500">
                <option selected disabled>Velg bigård</option>

                @foreach ($apiaries as $apiary)
                    <x-apiary-select :apiary="$apiary"/>
                @endforeach
            </select>

            <div>
                <x-label for="super" value="{{ __('Hvor mange skattekasser?') }}"/>
                <x-input id="super" class="block mt-1 w-full" type="number" name="super" :value="old('super')"
                         required autofocus autocomplete="super"/>
            </div>


        @if ($queens && $queens->count() > 0)
                <x-label for="queen" value="{{ __('Har bikuben en dronning?') }}"/>
                <select required name="queen" id="queen"
                        class="block w-full bg-white border border-gray-300 text-black py-2 px-3 rounded-lg focus:outline-none focus:border-gray-500">>
                    @foreach($queens as $queen)
                        <x-queen-select :queen="$queen"/>
                    @endforeach
                </select>
            @else
                <div class="text-center mb-6">
                    <h3 class="text-xl font-bold text-gray-700 mb-2">Før du fortsetter, registrer gjerne en dronning:</h3>
                    <p class="text-sm text-gray-500">Dette gjør at du kan velge den dronningen når du fortsetter med skjemaet.</p>
                </div>
            @endif

            <div>
                <x-label for="hiveStrength" value="{{ __('Hvor sterk mener du bikuben er (Mellom 1-10)? ') }}"/>
                <x-input id="hiveStrength" class="block mt-1 w-full" type="number" name="hiveStrength" max="10" min="1"
                         :value="old('hiveStrength')" required autofocus autocomplete="hiveStrength"/>
            </div>
            <div>
                <x-label for="hiveDescription" value="{{ __('Skriv en kort beskrivelse av bikuben') }}"/>
                <x-input id="hiveDescription" class="block mt-1 w-full" type="text" name="hiveDescription"
                         :value="old('hiveDescription')" required autofocus autocomplete="hiveDescription"/>
            </div>

            <div class="flex justify-between items-center">
                <x-button class="bg-orange-500 hover:bg-green-500 text-white">
                    {{ __('Registrer') }}
                </x-button>
                <button class="bg-red-500 border border-gray-300 hover:bg-red-700 text-white py-2 px-4 rounded-lg"
                        type="button">Gå tilbake
                </button>
            </div>
        </form>
    </div>
</div>
