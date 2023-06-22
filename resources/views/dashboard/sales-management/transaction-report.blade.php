<x-app-layout>
    @if(Auth::user()->role == 'admin')
    @include('layouts.sidebar-admin')
    @else
    @include('layouts.sidebar-cashier')
    @endif
    <div class="flex-auto ml-[32%] mt-[6%] max-w-[65%]">
        <div id="input-table" class="text-center bg-third border border-primary text-gray-900 px-4 py-4 rounded-lg relative mb-4" role="alert">
            <strong class="font-bold">To print a transaction report</strong>
            <span class="block sm:inline">, press the button below:</span>
            <a class="block max-w-[200px] px-6 py-3 m-auto mt-2 bg-[#FFC529] border border-transparent rounded-full font-semibold text-xs text-black capitalize tracking-widest hover:bg-[#FFD669] focus:bg-[#FFD669] active:[#FFC529] focus:outline-none focus:ring-2 focus:ring-[#FFC529] focus:ring-offset-2 transition ease-in-out duration-150" href="{{ route('transaction.pdf') }}" class="btn btn-primary">Generate PDF</a>
        </div>
        <div class="bg-white text-[16px] p-6 shadow-sm hover:shadow-md rounded-lg w-full mb-6 transition ease-out">
            <table class="min-w-full bg-white">
                <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-left">No</th>
                    <th class="py-2 px-4 border-b text-left">Product Name</th>
                    <th class="py-2 px-4 border-b text-c">Amount Sold</th>
                    <th class="py-2 px-4 border-b text-left">Total</th>
                </tr>
                </thead>
                <tbody>
                @for($i = 0; $i < 10; $i++)
                <tr>
                    <td class="py-2 px-4 border-b text-left">1</td>
                    <td class="py-2 px-4 border-b text-left">Nama Produk</td>
                    <td class="py-2 px-4 border-b text-center">10</td>
                    <td class="py-2 px-4 border-b text-left">IDR 29,000,00</td>
                </tr>
                @endfor
                </tbody>
            </table>
            <div class="mt-6 text-right">
                <p>Total Sales: </p>
                <strong class="text-[20px]">IDR 29,100,00</strong>
            </div>
        </div>
    </div>
</x-app-layout>
