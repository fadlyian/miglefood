@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block flex flex-col text-center text-[20px] text-[#FFC529] hover:text-gray-900 transition duration-150 ease-in-out'
            : 'block flex flex-col text-center text-[20px] text-gray-900 hover:text-[#FFC529] transition duration-150 ease-in-out';
@endphp
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
