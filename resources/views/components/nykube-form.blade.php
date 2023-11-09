<div class="flex justify-center h-screen">
    <div class="bg-white p-4 w-3/4 rounded-lg" style="box-shadow: 0 0 10px rgba(192, 0, 0, 0.2);">
        <form method="post" action="{{ url('registrerBikube') }}" class="max-w-sm mx-auto space-y-4">
            @csrf
            <div class="text-yellow-600 text-sm font-bold">Velg hvilke bigård denne kuben tilhører:</div>
            <select required name="bigård_idBigård" id="hive"
                class="block w-full bg-white border border-gray-300 text-gray-700 py-2 px-3 rounded-lg focus:outline-none focus:border-gray-500">
                <option selected disabled>Velg bigård</option>
                @foreach ($bigarder as $bigard)
                    <option name="bigård_idBigård" value="{{ $bigard->id }}">{{ $bigard->navn }}</option>
                @endforeach
            </select>
            <div>
                <x-label for="antallSkattekasser" value="{{ __('Antall Skattekasser') }}" />
                <x-input id="antallSkattekasser" class="block mt-1 w-full" type="number" name="antallSkattekasser"
                    :value="old('antallSkattekasser')" required autofocus autocomplete="antallSkattekasser" />
            </div>

            <div>
                <x-label for="estimertStyrke" value="{{ __('Hvor sterk mener du bikuben er (Mellom 1-10)? ') }}" />
                <x-input id="estimertStyrke" class="block mt-1 w-full" type="number" name="estimertStyrke"
                    :value="old('estimertStyrke')" required autofocus autocomplete="estimertStyrke" />
            </div>
            <div>
                <x-label for="identifikasjon" value="{{ __('Hvilken bikube er det?') }}" />
                <x-input id="identifikasjon" class="block mt-1 w-full" type="text" name="identifikasjon"
                    :value="old('identifikasjon')" required autofocus autocomplete="identifikasjon" />
            </div>

            <x-button class="ml-4">
                {{ __('Registrer') }}
            </x-button>
            <button
                class="bg-menu-orange border border-gray-300 hover:bg-red-700 text-sm text-white py-2 px-4 rounded-lg"
                type="button">Gå tilbake</button>
        </form>
    </div>
</div>
