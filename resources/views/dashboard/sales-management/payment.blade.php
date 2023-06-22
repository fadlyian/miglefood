<x-app-layout>
    @if(Auth::user()->role == 'admin')
    @include('layouts.sidebar-admin')
    @else
    @include('layouts.sidebar-cashier')
    @endif
    <div class="flex-auto ml-[32%] mt-[6%] max-w-[65%]">
        <h2 class="bg-red-500 max-w-max m-auto px-2 py-1 rounded-md mb-4 text-[24px] text-center font-bold text-white">Unpaid Order</h2>
        @for ($i = 0; $i < count($ordersNotPayed); $i++)
            <div class="bg-white text-[16px] p-6 shadow-sm hover:shadow-md rounded-lg w-full mb-6 transition ease-out">
                <x-format-text>
                    <p>Customer Phone</p>
                    <strong>{{ $ordersNotPayed[$i]->consumer->phoneNumber }}</strong>
                </x-format-text>
                <x-format-text>
                    <p>Table Number</p>
                    <strong>{{ $ordersNotPayed[$i]->tableNumber }}</strong>
                </x-format-text>
                <x-format-text>
                    <p>Order to</p>
                    <strong>{{ $ordersNotPayed[$i]->id }}</strong>
                </x-format-text>
                <table class="w-full mt-6">
                    <tr>
                        <th class="text-left">Qty</th>
                        <th class="text-left">Item</th>
                        <th class="text-right">Price</th>
                    </tr>
                    @foreach ($orderItemsNotPayed[$i] as $orderItem)
                        <tr>
                            <td>{{ $orderItem->quantity }}</td>
                            <td>{{ $orderItem->product->name }}</td>
                            <td class="text-right">IDR {{ number_format($orderItem->product->price,2,',','.')  }}</td>
                        </tr>
                    @endforeach
                </table>
                <div class="h-[2px] w-full bg-slate-100 my-3"></div>
                <x-format-text>
                    <p>Sub Total</p>
                    <strong>IDR {{ number_format($ordersNotPayed[$i]->subTotal,2,',','.') }}</strong>
                </x-format-text>
                <x-format-text>
                    <p>PPN (10%)</p>
                    <strong>IDR {{ number_format($ordersNotPayed[$i]->ppn,2,',','.') }}</strong>
                </x-format-text>
                <x-format-text>
                    <p>Grand Total</p>
                    <strong>IDR {{ number_format($ordersNotPayed[$i]->grandTotal,2,',','.') }}</strong>
                </x-format-text>
                <form action="{{ route('donePayment',$ordersNotPayed[$i]->id) }}" method="get">
                    @csrf
                    <div class="mt-6 w-full text-end">
                        <x-primary-button class="w-[300px]">order confirmation has been paid</x-primary-button>
                    </div>
                </form>
            </div>
        @endfor

        <h2 class="bg-green-500 max-w-max m-auto mt-10 px-2 py-1 rounded-md mb-4 text-[24px] text-center font-bold text-white">The Order Has Been Paid</h2>
        @for ($i = 0; $i < count($ordersPayed); $i++)
            <div class="bg-white text-[16px] p-6 shadow-sm hover:shadow-md rounded-lg w-full mb-6 transition ease-out">
                <x-format-text>
                    <p>Customer Phone</p>
                    <strong>{{ $ordersPayed[$i]->consumer->phoneNumber }}</strong>
                </x-format-text>
                <x-format-text>
                    <p>Table Number</p>
                    <strong>{{ $ordersPayed[$i]->tableNumber }}</strong>
                </x-format-text>
                <x-format-text>
                    <p>Order to</p>
                    <strong>{{ $ordersPayed[$i]->id }}</strong>
                </x-format-text>
                <table class="w-full mt-6">
                    <tr>
                        <th class="text-left">Qty</th>
                        <th class="text-left">Item</th>
                        <th class="text-right">Price</th>
                    </tr>
                    @foreach ($orderItemsPayed[$i] as $orderItem)
                        <tr>
                            <td>{{ $orderItem->quantity }}</td>
                            <td>{{ $orderItem->product->name }}</td>
                            <td class="text-right">IDR {{ number_format($orderItem->product->price,2,',','.')  }}</td>
                        </tr>
                    @endforeach
                </table>
                <div class="h-[2px] w-full bg-slate-100 my-3"></div>
                <x-format-text>
                    <p>Sub Total</p>
                    <strong>IDR {{ number_format($ordersPayed[$i]->subTotal,2,',','.') }}</strong>
                </x-format-text>
                <x-format-text>
                    <p>PPN (10%)</p>
                    <strong>IDR {{ number_format($ordersPayed[$i]->ppn,2,',','.') }}</strong>
                </x-format-text>
                <x-format-text>
                    <p>Grand Total</p>
                    <strong>IDR {{ number_format($ordersPayed[$i]->grandTotal,2,',','.') }}</strong>
                </x-format-text>
            </div>
        @endfor
    </div>
</x-app-layout>
