<div class="w-full m-auto sm:max-w-md shadow-[0px_0px_20px_0px_rgba(0,0,0,0.1)] h-[70px] bg-white flex justify-between px-6 items-center rounded-t-[40px]">
    <x-btm-link :href="route('home')" :active="request()->routeIs('home') || request()->routeIs('all-menu')">
        <i class="fa-solid fa-house"></i>
        <p class="text-[10px] mt-1">Home</p>
    </x-btm-link>
    <x-btm-link :href="route('all-orders')" :active="request()->routeIs('all-orders')">
        <i class="fa-solid fa-table-list"></i>
        <p class="text-[10px] mt-1">All Orders</p>
    </x-btm-link>
    <x-btm-link class="items-center" :href="route('cart')" :active="request()->routeIs('cart')">
        @if(true)
        <i class="fa-solid fa-cart-shopping"></i>
        <p class="absolute ml-4 rounded-full text-[8px] font-bold p-[2px] bg-white border-2 border-[#FFC529]">10</p>
        @else
        <i class="fa-solid fa-cart-shopping"></i>
        @endif
        <p class="text-[10px] mt-1">Cart</p>
    </x-btm-link>
    <x-btm-link :href="route('your-orders')" :active="request()->routeIs('your-orders')">
        <i class="fa-solid fa-user-plus"></i>
        <p class="text-[10px] mt-1">Your Orders</p>
    </x-btm-link>
</div>
