@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center p-[20px] border-indigo-400 text-[20px] rounded-[12px] leading-5 text-[#FFC529] bg-[#FFF9E8] transition duration-150 ease-in-out'
            : 'inline-flex items-center p-[20px] border-transparent text-[20px] leading-5 text-gray-500 hover:text-[#FFC529] hover:bg-[#FFF9E8] transition duration-150 ease-in-out';
@endphp
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
