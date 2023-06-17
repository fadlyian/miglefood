@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex bg-[#FFE6A1] text-[#BC8B09] px-4 mr-2 py-1 rounded-full hover:bg-[#FFF9E8] hover:text-gray-900 transition duration-150 ease-in-out'
            : 'inline-flex bg-[#FFF9E8] px-4 mr-2 py-1 rounded-full hover:bg-[#FFE6A1] hover:text-[#BC8B09] transition duration-150 ease-in-out';
@endphp
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
