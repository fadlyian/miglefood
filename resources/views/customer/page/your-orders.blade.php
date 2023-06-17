<x-pages-layout>
    @if(false)
    <div class="shadow p-6 rounded-md text-[14px] hover:shadow-md transition ease-in-out duration-150">
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
    @else
    <div class="text-center shadow p-6 rounded-md text-[14px] hover:shadow-md transition ease-in-out duration-150 flex flex-col">
        <strong>You haven't ordered yet!</strong>
        <a class="mt-4 text-center py-1 bg-[#FFC529] border border-transparent rounded-full font-semibold text-xs text-black capitalize tracking-widest hover:bg-[#FFD669] focus:bg-[#FFD669] active:[#FFC529] focus:outline-none focus:ring-2 focus:ring-[#FFC529] focus:ring-offset-2 transition ease-in-out duration-150" href="/home">Order Now!</a>
    </div>
    @endif
</div>
</x-pages-layouts>
