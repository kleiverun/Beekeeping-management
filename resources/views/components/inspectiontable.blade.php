@props(['inspections'])
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs uppercase bg-orange-500">
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
        <tbody class="bg-white divide-y divide-gray-200">
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
        </tbody>
    </table>
</div>
