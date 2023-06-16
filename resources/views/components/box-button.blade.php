<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-[#FFC529] py-1 px-2 rounded-md text-white hover:bg-[#FFD669] focus:bg-[#FFD669] active:[#FFC529] focus:outline-none focus:ring-2 focus:ring-[#FFC529] focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
