@props(['inspections'])
    <x-table>
        <thead class="text-xs uppercase">
        <tr>
            <x-th>
                Bikube ID
            </x-th>
            <x-th>
                Inspeksjonsdato
            </x-th>
            <x-th>
                Beskrivelse
            </x-th>
        </tr>
        </thead>
        <x-tbody>
        @foreach($inspections as $inspection)
            <tr>
                <x-td>
                    {{ $inspection['hive_id']}}
                </x-td>
                <x-td>
                    {{ $inspection['inspectionDate'] }}
                </x-td>
                <x-td>
                    {{ $inspection['description'] }}
                </x-td>
            </tr>
        @endforeach
        </x-tbody>
    </x-table>
</div>
