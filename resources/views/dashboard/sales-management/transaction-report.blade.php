<x-app-layout>
    @if(Auth::user()->role == 'admin')
    @include('layouts.sidebar-admin')
    @else
    @include('layouts.sidebar-cashier')
    @endif
    <div class="flex-auto ml-[32%] mt-[6%] max-w-[65%]">
        {{ Route::currentRouteName() }}
    </div>
</x-app-layout>
