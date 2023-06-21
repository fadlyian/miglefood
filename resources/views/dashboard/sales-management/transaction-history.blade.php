<x-app-layout>
    @if(Auth::user()->role == 'admin')
    @include('layouts.sidebar-admin')
    @else
    @include('layouts.sidebar-cashier')
    @endif
    <div class="flex-auto ml-[32%] mt-[6%] max-w-[65%]">
        @foreach ($orders as $order)
        <div class="bg-white text-[16px] p-6 shadow-sm hover:shadow-md rounded-lg w-full mb-6 transition ease-out">
            <div>
                <x-format-text>
                    <p>Customer Phone</p>
                    <strong>{{ $order->consumer->phoneNumber }}</strong>
                </x-format-text>
                <div class="h-[2px] w-full bg-slate-100 my-3"></div>
                <x-format-text>
                    <p>Grand Total</p>
                    <strong>IDR {{ number_format($order->grandTotal,2,',','.')  }}</strong>
                </x-format-text>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>
