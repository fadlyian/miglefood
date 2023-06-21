<x-pages-layout>
    @if ($cartItems->count() > 0)
        {{-- Main cart --}}
        @for ($i = 0; $i < count($cartItems); $i++)
        <table class="table-auto w-full mb-4">
            <tbody>
                <tr>
                <td class="w-[35%]">
                    <strong>{{ $cartItems[$i]->product->name }}</strong>
                </td>
                <td class="w-[7%]">
                    <x-box-button>
                        <i class="fa-solid fa-plus"></i>
                    </x-box-button>
                </td>
                <td class="w-[7%] text-center">
                    <strong class="px-2">{{ $cartItems[$i]->quantity }}</strong>
                </td>
                <td class="w-[7%]">
                    <x-box-button>
                        <i class="fa-solid fa-minus"></i>
                    </x-box-button>
                    {{-- <p>{{ $cartItems[$i]->id }}</p> --}}
                </td>
                <td class="w-[34%] text-right">
                    <strong>IDR {{ number_format($cartItems[$i]->product->price,2,',','.') }}</strong>
                </td>
                <td class="w-[8%] text-right">
                    <form action="{{ route('removeToCart', $cartItems[$i]->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <x-box-button class="bg-red-500 hover:bg-red-400 focus:bg-red-500 active:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500">
                            <i class="fa-solid fa-trash"></i>
                        </x-box-button>
                    </form>
                </td>
                </tr>
            </tbody>
            </table>
            {{--  --}}
        @endfor
        </div>
        <div class="mt-[180px]"></div>

        {{-- Fixed Button Bar --}}
        <form action="{{ route('confirmOrder') }}" method="post">
            @csrf
            <div class="fixed bottom-0 w-full m-auto text-[14px]">
                {{-- Price Information --}}
                <div
                    class="w-[95%] p-4 shadow-[0px_0px_20px_-10px_rgba(0,0,0,0.2)] rounded-lg my-4 m-auto sm:max-w-md bg-white text-[14px] hover:shadow-md transition ease-in-out duration-150">
                    <x-format-text>
                        <p>Sub Total</p>
                        <input type="hidden" name="subTotal" value="{{ $subTotal }}">
                        <strong>IDR {{ number_format($subTotal, 2, ',', '.') }}</strong>
                    </x-format-text>
                    <x-format-text>
                        <p>PPN (10%)</p>
                        <input type="hidden" name="ppn" value="{{ $subTotal * 0.1 }}">
                        <strong>IDR {{ number_format($subTotal * 0.1, 2, ',', '.') }}</strong>
                    </x-format-text>
                    <x-format-text>
                        <p>Grand Total</p>
                        <input type="hidden" name="grandTotal" value="{{ $grandTotal }}">
                        <strong>IDR {{ number_format($grandTotal, 2, ',', '.') }}</strong>
                    </x-format-text>
                </div>
                {{-- Button Confirm Order --}}

                <x-primary-button
                    class="block shadow-[0px_0px_20px_-10px_rgba(0,0,0,0.2)] w-[95%] m-auto sm:max-w-md mb-20">
                    {{ __('Confirm Order') }}</x-primary-button>
            </div>
        </form>
    @else
        <div
            class="text-center shadow p-6 rounded-md text-[14px] hover:shadow-md transition ease-in-out duration-150 flex flex-col">
            <strong>You don't have any products in your cart yet!</strong>
            <a class="mt-4 text-center py-1 bg-[#FFC529] border border-transparent rounded-full font-semibold text-xs text-black capitalize tracking-widest hover:bg-[#FFD669] focus:bg-[#FFD669] active:[#FFC529] focus:outline-none focus:ring-2 focus:ring-[#FFC529] focus:ring-offset-2 transition ease-in-out duration-150"
                href="/home">Search for Products!</a>
        </div>
    @endif
</x-pages-layout>
