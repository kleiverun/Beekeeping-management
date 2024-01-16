@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-orange-500 focus:ring-indigo-500 rounded-md shadow-sm ']) !!}>
