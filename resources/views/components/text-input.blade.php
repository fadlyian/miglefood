@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-[#FFC529] focus:ring-[#FFC529] rounded-md shadow-sm']) !!}>
