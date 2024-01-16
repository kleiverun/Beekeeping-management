@props(['queens'])
<div>
    @foreach($queens as $queen)
        <option value="{{ $queen->id }}">{{ $queen->queenDescription }}</option>
    @endforeach
</div>
