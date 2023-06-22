<x-app-layout>
    @if (Auth::user()->role == 'admin')
        @include('layouts.sidebar-admin')
    @else
        @include('layouts.sidebar-cashier')
    @endif
    <div class="flex-auto ml-[32%] mt-[6%] max-w-[65%]">
        <h2 class="bg-red-500 max-w-max m-auto px-2 py-1 rounded-md mb-4 text-[24px] text-center font-bold text-white">
            Order Not Process</h2>
        @if (count($orderItemsNotProcess) > 0)
            @for ($i = 0; $i < count($ordersNotProcess); $i++)
                <div
                    class="bg-white text-[16px] p-6 shadow-sm hover:shadow-md rounded-lg w-full mb-6 transition ease-out">
                    <x-format-text>
                        <p>Customer Phone</p>
                        <strong>{{ $ordersNotProcess[$i]->consumer->phoneNumber }}</strong>
                    </x-format-text>
                    <x-format-text>
                        <p>Table Number</p>
                        <strong>{{ $ordersNotProcess[$i]->tableNumber }}</strong>
                    </x-format-text>
                    <x-format-text>
                        <p>Order to</p>
                        <strong>{{ $ordersNotProcess[$i]->id }}</strong>
                    </x-format-text>
                    <table class="w-full mt-6">
                        <tr>
                            <th class="text-left">Qty</th>
                            <th class="text-left">Item</th>
                            <th class="text-right">Price</th>
                        </tr>
                        @foreach ($orderItemsNotProcess[$i] as $orderItem)
                            <tr>
                                <td>{{ $orderItem->quantity }}</td>
                                <td>{{ $orderItem->product->name }}</td>
                                <td class="text-right">IDR {{ number_format($orderItem->product->price, 2, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="h-[2px] w-full bg-slate-100 my-3"></div>
                    <x-format-text>
                        <p>Sub Total</p>
                        <strong>IDR {{ number_format($ordersNotProcess[$i]->subTotal, 2, ',', '.') }}</strong>
                    </x-format-text>
                    <x-format-text>
                        <p>PPN (10%)</p>
                        <strong>IDR {{ number_format($ordersNotProcess[$i]->ppn, 2, ',', '.') }}</strong>
                    </x-format-text>
                    <x-format-text>
                        <p>Grand Total</p>
                        <strong>IDR {{ number_format($ordersNotProcess[$i]->grandTotal, 2, ',', '.') }}</strong>
                    </x-format-text>
                </div>
            @endfor
        @endif


        <h2
            class="bg-yellow-500 max-w-max m-auto px-2 py-1 rounded-md mb-4 text-[24px] text-center font-bold text-white">
            Order On Process</h2>
        @for ($i = 0; $i < count($ordersProcess); $i++)
            <div class="bg-white text-[16px] p-6 shadow-sm hover:shadow-md rounded-lg w-full mb-6 transition ease-out">
                <x-format-text>
                    <p>Customer Phone</p>
                    <strong>{{ $ordersProcess[$i]->consumer->phoneNumber }}</strong>
                </x-format-text>
                <x-format-text>
                    <p>Table Number</p>
                    <strong>{{ $ordersProcess[$i]->tableNumber }}</strong>
                </x-format-text>
                <x-format-text>
                    <p>Order to</p>
                    <strong>{{ $ordersProcess[$i]->id }}</strong>
                </x-format-text>
                <table class="w-full mt-6">
                    <tr>
                        <th class="text-left">Qty</th>
                        <th class="text-left">Item</th>
                        <th class="text-right">Price</th>
                    </tr>
                    @foreach ($orderItemsProcess[$i] as $orderItem)
                        <tr>
                            <td>{{ $orderItem->quantity }}</td>
                            <td>{{ $orderItem->product->name }}</td>
                            <td class="text-right">IDR {{ number_format($orderItem->product->price, 2, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="h-[2px] w-full bg-slate-100 my-3"></div>
                <x-format-text>
                    <p>Sub Total</p>
                    <strong>IDR {{ number_format($ordersProcess[$i]->subTotal, 2, ',', '.') }}</strong>
                </x-format-text>
                <x-format-text>
                    <p>PPN (10%)</p>
                    <strong>IDR {{ number_format($ordersProcess[$i]->ppn, 2, ',', '.') }}</strong>
                </x-format-text>
                <x-format-text>
                    <p>Grand Total</p>
                    <strong>IDR {{ number_format($ordersProcess[$i]->grandTotal, 2, ',', '.') }}</strong>
                </x-format-text>
            </div>
        @endfor

        <h2
            class="bg-green-500 max-w-max m-auto mt-10 px-2 py-1 rounded-md mb-4 text-[24px] text-center font-bold text-white">
            Order Completed</h2>
        @for ($i = 0; $i < count($ordersDone); $i++)
            <div class="bg-white text-[16px] p-6 shadow-sm hover:shadow-md rounded-lg w-full mb-6 transition ease-out">
                <x-format-text>
                    <p>Customer Phone</p>
                    <strong>{{ $ordersDone[$i]->consumer->phoneNumber }}</strong>
                </x-format-text>
                <x-format-text>
                    <p>Table Number</p>
                    <strong>{{ $ordersDone[$i]->tableNumber }}</strong>
                </x-format-text>
                <x-format-text>
                    <p>Order to</p>
                    <strong>{{ $ordersDone[$i]->id }}</strong>
                </x-format-text>
                <table class="w-full mt-6">
                    <tr>
                        <th class="text-left">Qty</th>
                        <th class="text-left">Item</th>
                        <th class="text-right">Price</th>
                    </tr>
                    @foreach ($orderItemsDone[$i] as $orderItem)
                        <tr>
                            <td>{{ $orderItem->quantity }}</td>
                            <td>{{ $orderItem->product->name }}</td>
                            <td class="text-right">IDR {{ number_format($orderItem->product->price, 2, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="h-[2px] w-full bg-slate-100 my-3"></div>
                <x-format-text>
                    <p>Sub Total</p>
                    <strong>IDR {{ number_format($ordersDone[$i]->subTotal, 2, ',', '.') }}</strong>
                </x-format-text>
                <x-format-text>
                    <p>PPN (10%)</p>
                    <strong>IDR {{ number_format($ordersDone[$i]->ppn, 2, ',', '.') }}</strong>
                </x-format-text>
                <x-format-text>
                    <p>Grand Total</p>
                    <strong>IDR {{ number_format($ordersDone[$i]->grandTotal, 2, ',', '.') }}</strong>
                </x-format-text>
            </div>
        @endfor
    </div>
</x-app-layout>
