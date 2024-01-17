@props(['inspections'])
<div class="overflow-x-auto mx-10 mt-5">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
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
