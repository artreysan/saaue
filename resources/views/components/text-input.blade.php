@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-red-900 focus:ring focus:ring-red-900 focus:ring-opacity-50']) !!}>
