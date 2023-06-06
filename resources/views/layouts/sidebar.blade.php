
<div id="sidebar" class="flex-auto min-h-screen max-w-[30%] h-100% bg-white h-full p-10 shadow-[4px_0px_20px_rgba(0, 0, 0, 0.05)]">
    <div class="hidden sm:-my-px sm:flex sm:flex-col">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            <i class="fa-solid fa-dice-four mr-4"></i>
            {{ __('Dashboard') }}
        </x-nav-link>
        <h4 class="text-base text-[#727678] pt-[20px] pb-[10px]">STAFF MANAGEMENT</h4>
        <x-nav-link :href="route('add-account')" :active="request()->routeIs('add-account')">
            <i class="fa-solid fa-user-plus mr-4"></i>
            {{ __('Add Account') }}
        </x-nav-link>
        <h4 class="text-base text-[#727678] pt-[20px] pb-[10px]">MENUS MANAGEMENT</h4>
        <x-nav-link :href="route('add-menu')" :active="request()->routeIs('add-menu')">
            <i class="fa-solid fa-square-plus mr-4"></i>
            {{ __('Add Menu') }}
        </x-nav-link>
        <x-nav-link :href="route('change-menu')" :active="request()->routeIs('change-menu')">
            <i class="fa-solid fa-recycle mr-4"></i>
            {{ __('Change Menu') }}
        </x-nav-link>
        <h4 class="text-base text-[#727678] pt-[20px] pb-[10px]">SETTINGS</h4>
        <x-nav-link :href="route('list-account')" :active="request()->routeIs('list-account')">
            <i class="fa-solid fa-user-group mr-4"></i>
            {{ __('List Account') }}
        </x-nav-link>
        <form method="POST" action="{{ route('logout') }}" class="inline-flex items-center">
            @csrf
            <x-nav-link href="route('logout')" onclick="event.preventDefault();
                        this.closest('form').submit();" class="w-full">
                <i class="fa-solid fa-right-from-bracket mr-4"></i>
                {{ __('Logout') }}
            </x-nav-link>
        </form>

    </div>
</div>
