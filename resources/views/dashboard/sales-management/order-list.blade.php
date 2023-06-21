<x-app-layout>
    @if(Auth::user()->role == 'admin')
    @include('layouts.sidebar-admin')
    @else
    @include('layouts.sidebar-cashier')
    @endif
    <div class="flex-auto ml-[32%] mt-[6%] max-w-[65%]">
        <h2 class="mb-4 text-[24px] text-center font-bold">Pesanan Belum Selesai</h2>
        @for($i = 0; $i < 5; $i++)
        <div class="bg-white text-[16px] p-6 shadow-sm hover:shadow-md rounded-lg w-full mb-6 transition ease-out">
            <div>
                <x-format-text>
                    <p>Customer Name</p>
                    <strong>Arif Saputra</strong>
                </x-format-text>
                <x-format-text>
                    <p>Table Number</p>
                    <strong>11</strong>
                </x-format-text>
                <x-format-text>
                    <p>Order to</p>
                    <strong>2</strong>
                </x-format-text>
                <table class="w-full mt-6">
                    <tr>
                        <th class="text-left">Qty</th>
                        <th class="text-left">Item</th>
                        <th class="text-right">Price</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Jagung Bakar</td>
                        <td class="text-right">IDR 23,000.00</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Bakso Daging</td>
                        <td class="text-right">IDR 128,000.00</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Roti Amerika</td>
                        <td class="text-right">IDR 32,000.00</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Es Krim Jerman</td>
                        <td class="text-right">IDR 88,000.00</td>
                    </tr>
                </table>
                <div class="h-[2px] w-full bg-slate-100 my-3"></div>
                <x-format-text>
                    <p>Sub Total</p>
                    <strong>IDR 324,000.00</strong>
                </x-format-text>
                <x-format-text>
                    <p>PPN (10%)</p>
                    <strong>IDR 32,400.00</strong>
                </x-format-text>
                <x-format-text>
                    <p>Grand Total</p>
                    <strong>IDR 356,400.00</strong>
                </x-format-text>
            </div>
        </div>
        @endfor
        <h2 class="mt-[50px] mb-4 text-[24px] text-center font-bold">Pesanan Selesai</h2>
        @for($i = 0; $i < 5; $i++)
        <div class="bg-white text-[16px] p-6 shadow-sm hover:shadow-md rounded-lg w-full mb-6 transition ease-out">
            <div>
                <x-format-text>
                    <p>Customer Name</p>
                    <strong>Arif Saputra</strong>
                </x-format-text>
                <x-format-text>
                    <p>Table Number</p>
                    <strong>11</strong>
                </x-format-text>
                <x-format-text>
                    <p>Order to</p>
                    <strong>2</strong>
                </x-format-text>
                <table class="w-full mt-6">
                    <tr>
                        <th class="text-left">Qty</th>
                        <th class="text-left">Item</th>
                        <th class="text-right">Price</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Jagung Bakar</td>
                        <td class="text-right">IDR 23,000.00</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Bakso Daging</td>
                        <td class="text-right">IDR 128,000.00</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Roti Amerika</td>
                        <td class="text-right">IDR 32,000.00</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Es Krim Jerman</td>
                        <td class="text-right">IDR 88,000.00</td>
                    </tr>
                </table>
                <div class="h-[2px] w-full bg-slate-100 my-3"></div>
                <x-format-text>
                    <p>Sub Total</p>
                    <strong>IDR 324,000.00</strong>
                </x-format-text>
                <x-format-text>
                    <p>PPN (10%)</p>
                    <strong>IDR 32,400.00</strong>
                </x-format-text>
                <x-format-text>
                    <p>Grand Total</p>
                    <strong>IDR 356,400.00</strong>
                </x-format-text>
            </div>
        </div>
        @endfor
    </div>
</x-app-layout>
