<x-pages-layout>
@if(true)
    {{-- Main cart --}}
    @for($i = 0; $i < count($cartItems); $i++)
    <div class="flex flex-column mb-4 text-[14px]">
        <div class="w-full flex justify-between items-center">
            <strong>{{ $cartItems[$i]->product->name }}</strong>
            <div class="flex items-center">
                <x-box-button>
                    <i class="fa-solid fa-plus"></i>
                </x-box-button>
                <strong class="px-4">{{ $cartItems[$i]->quantity }}</strong>
                <p>{{ $cartItems[$i]->id }}</p>
                <form action="{{ route('removeToCart', $cartItems[$i]->id ) }}" method="post">
                    @csrf
                    @method('delete')
                    <x-box-button>
                        <i class="fa-solid fa-minus"></i>
                    </x-box-button>
                </form>
            </div>
            <strong>IDR {{ number_format($cartItems[$i]->product->price,2,',','.') }}</strong>
            {{-- {{ $totPrice = $cartItems[$i]->product->price + $totPrice }} --}}
        </div>
    </div>
    @endfor
</div>
<div class="mt-[180px]"></div>

{{-- Fixed Button Bar --}}
<div class="fixed bottom-0 w-full m-auto text-[14px]">
    {{-- Price Information --}}
    <div class="w-[95%] p-4 shadow-[0px_0px_20px_-10px_rgba(0,0,0,0.2)] rounded-lg my-4 m-auto sm:max-w-md bg-white text-[14px] hover:shadow-md transition ease-in-out duration-150">
        <x-format-text>
            <p>Sub Total</p>
            <strong>IDR {{ number_format($totPrice,2,',','.') }}</strong>
        </x-format-text>
        <x-format-text>
            <p>PPN (10%)</p>
            <strong>IDR {{ number_format($totPrice * 0.1,2,',','.') }}</strong>
        </x-format-text>
        <x-format-text>
            <p>Grand Total</p>
            <strong>IDR {{ number_format($grandTotal,2,',','.') }}</strong>
        </x-format-text>
    </div>
    {{-- Button Confirm Order --}}
    <x-primary-button class="block shadow-[0px_0px_20px_-10px_rgba(0,0,0,0.2)] w-[95%] m-auto sm:max-w-md mb-20"> {{ __("Confirm Order") }}</x-primary-button>
    </div>
@else
<div class="text-center shadow p-6 rounded-md text-[14px] hover:shadow-md transition ease-in-out duration-150 flex flex-col">
    <strong>You don't have any products in your cart yet!</strong>
    <a class="mt-4 text-center py-1 bg-[#FFC529] border border-transparent rounded-full font-semibold text-xs text-black capitalize tracking-widest hover:bg-[#FFD669] focus:bg-[#FFD669] active:[#FFC529] focus:outline-none focus:ring-2 focus:ring-[#FFC529] focus:ring-offset-2 transition ease-in-out duration-150" href="/home">Search for Products!</a>
</div>
@endif
</x-pages-layout>
