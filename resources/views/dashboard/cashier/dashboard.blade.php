@php
    $totalAll=0
@endphp
<x-app-layout>
    @include('layouts.sidebar-cashier')
    <div class="flex-auto ml-[32%] mt-[6%] max-w-[65%]">
        <div class="pb-[20px]">
            <div class="flex justify-between min-h-[150px]">
                <div class="min-w-[49%] bg-white rounded-lg flex flex-col justify-between p-5">
                    <p class="text-[20px] font-bold">Total Customers</p>
                    <strong class="text-[30px] text-[#D55634]">{{$customers->count()}} People</strong>
                </div>
                <div class="min-w-[49%] bg-white rounded-lg flex flex-col justify-between p-5">
                    <p class="text-[20px] font-bold">Total Sales</p>
                    @foreach ($orders as $order)
                    @php
                    if ($order->status == 'done' && $order->paymentStatus == 'payed') {
                        $totalAll += $order->grandTotal;
                    }
                    @endphp
                    @endforeach
                    <strong class="text-[30px] text-[#BC8B09]">IDR {{ number_format($totalAll,2,',','.') }}</strong>
                </div>
            </div>
            <div class="mt-[2%] w-[100%] min-h-[100px] bg-white rounded-lg p-5">
                <p class="text-[20px] font-bold">Best Selling Food</p>
                @foreach ($products->sortBy('stock')->take(4) as $product)
                <div class="w-[100%] bg-[#F6F7F8] mt-[20px] p-4 flex rounded-lg items-center">
                    <img src="{{asset('/leker.png')}}" alt="" class="max-w-[100px] max-h-[100px]">
                    <strong class="text-[30px] ml-10">{{ $product->name }}</strong>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
