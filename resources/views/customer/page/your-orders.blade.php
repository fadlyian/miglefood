<x-pages-layout>
    @if (count($orders) > 0)
        @for ($i = 0; $i < count($orders); $i++)
            <div class="shadow p-6 rounded-md text-[14px] hover:shadow-md transition ease-in-out duration-150 mb-4">
                <x-format-text>
                    <p>Customer Phone</p>
                    <strong>{{ $consumer->phoneNumber }}</strong>
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
                            <td class="text-right">IDR {{ number_format($orderItem->product->price, 2, ',', '.') }}</td>
                            {{-- <td class="text-right">IDR {{ number_format() }}</td> --}}
                        </tr>
                    @endforeach
                </table>
                <div class="h-[2px] w-full bg-slate-100 my-3"></div>
                <x-format-text>
                    <p>Sub Total</p>
                    <strong>IDR {{ number_format($orders[$i]->subTotal, 2, ',', '.') }}</strong>
                </x-format-text>
                <x-format-text>
                    <p>PPN (10%)</p>
                    <strong>IDR {{ number_format($orders[$i]->ppn, 2, ',', '.') }}</strong>
                </x-format-text>
                <x-format-text>
                    <p>Grand Total</p>
                    <strong>IDR {{ number_format($orders[$i]->grandTotal, 2, ',', '.') }}</strong>
                </x-format-text>
                <div class="flex justify-between mt-4 text-white">
                    {{-- if order is completed --}}
                    @if ($orders[$i]->status === 'done')
                        <strong class="bg-green-500 px-2 py-1 rounded-md">Done</strong>
                    @elseif($orders[$i]->status === 'process')
                        <strong class="bg-yellow-500 px-2 py-1 rounded-md">Process</strong>
                    @else
                        <strong class="bg-red-500 px-2 py-1 rounded-md">Not Process</strong>
                    @endif

                    {{-- if order is payed --}}
                    @if ($orders[$i]->paymentStatus === 'payed')
                        <strong class="bg-green-500 px-2 py-1 rounded-md">Paid</strong>
                    @else
                        <strong class="bg-red-500 px-2 py-1 rounded-md">Unpaid</strong>
                    @endif
                </div>
            </div>
        @endfor
    @else
        <div
            class="text-center shadow p-6 rounded-md text-[14px] hover:shadow-md transition ease-in-out duration-150 flex flex-col">
            <strong>You haven't ordered yet!</strong>
            <a class="mt-4 text-center py-1 bg-[#FFC529] border border-transparent rounded-full font-semibold text-xs text-black capitalize tracking-widest hover:bg-[#FFD669] focus:bg-[#FFD669] active:[#FFC529] focus:outline-none focus:ring-2 focus:ring-[#FFC529] focus:ring-offset-2 transition ease-in-out duration-150"
                href="/home">Order Now!</a>
        </div>
    @endif
    </div>
    </x-pages-layouts>
