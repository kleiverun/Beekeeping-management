@props(['hives'])
<div>
    <option selected >Velg bikube</option>
    <!-- Note to self next time, the object within view/components need to hold the data which is being passed -->
    @foreach ($hives as $hive)
        <!-- The whole future lies in uncertainty: live immediately. - Seneca -->
        <option name="hiveId" value="{{ $hive->id }}">{{ $hive->hiveDescription }}</option>
</div>
@endforeach
</select>
