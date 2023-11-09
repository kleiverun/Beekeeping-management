<div>
@foreach ($bigarder as $bigard)
    <option name="bigård_idBigård" value="{{ $bigard->id }}">{{ $bigard->navn }}</option>
@endforeach

</div>
