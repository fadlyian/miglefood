<x-app-layout>
    <div class="flex-auto px-[15%] mt-[6%]">
        <div class="pb-[20px]">
            <h2 class="bg-red-500 max-w-max m-auto px-2 py-1 rounded-md mb-4 text-[24px] text-center font-bold text-white">Order Not Completed</h2>
            @for ($i = 0; $i < count($orders); $i++)
            <div class="bg-white text-[16px] p-6 shadow-sm hover:shadow-md rounded-lg w-full mb-6 transition ease-out  duration-150">
                <div>
                    <x-format-text>
                        <p>Customer Phone</p>
                        <strong>{{ $orders[$i]->consumer->phoneNumber }}</strong>
                    </x-format-text>
                    <x-format-text>
                        <p>Table Number</p>
                        <strong>{{ $orders[$i]->tableNumber }}</strong>
                    </x-format-text>
                    <x-format-text>
                        <p>Order to</p>
                        <strong>{{ $orders[$i]->id }}</strong>
                    </x-format-text>
                    <table class="w-full mt-6">
                        <tr>
                            <th class="text-left">Qty</th>
                            <th class="text-left">Item</th>
                            <th class="text-right">Price</th>
                        </tr>
                        @foreach ($orderItems[$i] as $orderItem)
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
                        <strong>IDR {{ number_format($orders[$i]->subTotal,2,',','.') }}</strong>
                    </x-format-text>
                    <x-format-text>
                        <p>PPN (10%)</p>
                        <strong>IDR {{ number_format($orders[$i]->ppn,2,',','.') }}</strong>
                    </x-format-text>
                    <x-format-text>
                        <p>Grand Total</p>
                        <strong>IDR {{ number_format($orders[$i]->grandTotal,2,',','.') }}</strong>
                    </x-format-text>
                </div>
                <form action="{{ route('doneOrder',$orders[$i]->id) }}" method="get">
                    @csrf
                    <div class="mt-6 w-full text-end">
                        <x-primary-button class="w-[300px]">order confirmation completed</x-primary-button>
                    </div>
                </form>
            </div>
            @endfor

            <h2 class="bg-green-500 max-w-max m-auto mt-10 px-2 py-1 rounded-md mb-4 text-[24px] text-center font-bold text-white">Order Completed</h2>
            @for($i = 0; $i < count($ordersDone); $i++)
            <div class="bg-white text-[16px] p-6 shadow-sm hover:shadow-md rounded-lg w-full mb-6 transition ease-out">
                <div>
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
                        @foreach ($orderItems[$i] as $orderItem)
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
                        <strong>IDR {{ number_format($orders[$i]->subTotal,2,',','.') }}</strong>
                    </x-format-text>
                    <x-format-text>
                        <p>PPN (10%)</p>
                        <strong>IDR {{ number_format($orders[$i]->ppn,2,',','.') }}</strong>
                    </x-format-text>
                    <x-format-text>
                        <p>Grand Total</p>
                        <strong>IDR {{ number_format($orders[$i]->grandTotal,2,',','.') }}</strong>
                    </x-format-text>
                </div>
            </div>
            @endfor
        </div>
    </div>
</x-app-layout>
