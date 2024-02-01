@props(['harvests'])
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs uppercase bg-orange-200">
        <tr>
            <x-th>
                ID
            </x-th>
            <x-th>
                Beskrivelse
            </x-th>
            <x-th>
                Vekt på innhøstet honning (kg)
            </x-th>
            <x-th>
                Antall skattekasser innhøstet
            </x-th>
            <x-th>
                Dato for innhøsting
            </x-th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        @foreach($harvests as $harvest)
            <tr>
                <x-td>
                    <div class="text-sm text-gray-900">{{ $harvest->id }}</div>
                </x-td>
                <x-td>
                    <div class="text-sm text-orange-600 font-semibold">{{ $harvest->description }}</div>
                </x-td>
                <x-td>
                    <div class="text-sm text-gray-600">{{ $harvest->harvestWeight }} kg</div>
                </x-td>
                <x-td>
                    <div class="text-sm text-gray-600">{{ $harvest->supersHarvested }}</div>
                </x-td>
                <x-td>
                    <div class="text-sm text-gray-600">{{ $harvest->dateHarvested }}</div>
                </x-td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
