@props(['harvests'])
    <x-table>
        <x-thead >
        <tr>
            <x-th>
                ID
            </x-th>
            <x-th>
                Beskrivelse
            </x-th>
            <x-th>
                Totalt kilo innhøstet honning
            </x-th>
            <x-th>
                Antall skattekasser innhøstet
            </x-th>
            <x-th>
                Dato for innhøsting
            </x-th>
        </tr>
        </x-thead>
        <x-tbody>
            @foreach($harvests as $harvest)
                <tr>
                    <x-td>
                        {{ $harvest->id }}
                    </x-td>
                    <x-td>
                        {{ $harvest->description }}
                    </x-td>
                    <x-td>
                        {{ $harvest->harvestWeight . "kg"}}
                    </x-td>
                    <x-td>
                        {{ $harvest->supersHarvested }}
                    </x-td>
                    <x-td>
                        {{ $harvest->dateHarvested }}
                    </x-td>
                </tr>
            @endforeach
        </x-tbody>
    </x-table>

