<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full text-center px-6 py-3 bg-[#FFC529] border border-transparent rounded-full font-semibold text-xs text-black capitalize tracking-widest hover:bg-[#FFD669] focus:bg-[#FFD669] active:[#FFC529] focus:outline-none focus:ring-2 focus:ring-[#FFC529] focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
