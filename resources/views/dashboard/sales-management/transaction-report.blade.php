<x-app-layout>
    @if(Auth::user()->role == 'admin')
    @include('layouts.sidebar-admin')
    @else
    @include('layouts.sidebar-cashier')
    @endif
    <div class="flex-auto ml-[32%] mt-[6%] max-w-[65%]">
        <a href="{{ route('transaction.pdf') }}" class="btn btn-primary">Generate PDF</a>
        @for($i = 0; $i < 5; $i++)
        <div class="bg-white text-[16px] p-6 shadow-sm hover:shadow-md rounded-lg w-full mb-6 transition ease-out">
            <div>
                <x-format-text>
                    <p>Customer Name</p>
                    <strong>Arif Saputra</strong>
                </x-format-text>
                <div class="h-[2px] w-full bg-slate-100 my-3"></div>
                <x-format-text>
                    <p>Grand Total</p>
                    <strong>IDR 356,400.00</strong>
                </x-format-text>
            </div>
        </div>
        @endfor
    </div>
</x-app-layout>
