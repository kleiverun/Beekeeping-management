
<div>
    @php
        $bigarder = App\Models\Bigård::all()->where('users_id', '=', Auth::user()->id);
    @endphp
@foreach ($bigarder as $bigard)
    <option value="{{ $bigard->id }}">{{ $bigard->navn }}</option>
@endforeach

</div>
