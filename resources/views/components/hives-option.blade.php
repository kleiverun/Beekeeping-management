@props(['hives'])

    <option disabled>Velg bikube</option>
    <!-- Note to self next time, the object within view/components need to hold the data which is being passed -->
    @foreach ($hives as $hive)

        <option value="{{ $hive->id }}">{{ $hive->hiveDescription }}</option>
    @endforeach
