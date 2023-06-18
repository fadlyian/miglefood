<h1>{{ $session }}</h1>
<x-pages-layout>
    <h2 class="text-[18px] font-bold">Recommended for you</h2>
            <x-horizontal-scroll>
                @for($i = 0; $i < 10; $i++)
                <x-product-layout>
                    <img src="{{ asset('/leker.png') }}" alt="" class="w-full">
                    <div class="my-2">
                        <strong class="text-[14px]">Leker Gosong</strong>
                        <div class="flex justify-between text-[10px] my-1">
                            <p class="">101 left</p>
                            <i class="fa-solid fa-star text-[#FFC529]"> <span class="text-gray-900">4,8</span></i>
                        </div>
                        <strong class="text-[14px]">IDR 98,000.00</strong>
                    </div>
                </x-product-layout>
                @endfor
            </x-horizontal-scroll>

            <div>
                <div class="flex justify-between">
                    <h2 class="text-[18px] font-bold">Order</h2>
                    <a href="{{route('all-menu')}}" class="text-[#BC8B09]">View all</a>
                </div>
                <x-horizontal-scroll>
                    @foreach ($categories as $category)
                    <x-category-link href="#">{{ $category->name }}</x-category-link>
                    @endforeach
                </x-horizontal-scroll>
                <div class="grid grid-cols-2 gap-2">
                    @foreach ($products as $product)
                    <x-product-layout>
                        <img src="{{ asset('/leker.png') }}" alt="" class="w-full">
                        <div class="my-2">
                            <strong class="text-[14px]">{{ $product->name }}</strong>
                            <div class="flex justify-between text-[10px] my-1">
                                <p class="">{{ $product->stock }} left</p>
                                <i class="fa-solid fa-star text-[#FFC529]"> <span class="text-gray-900">4,8</span></i>
                            </div>
                            <strong class="text-[14px]">IDR {{ $product->price }}.00</strong>
                        </div>
                    </x-product-layout>
                    @endforeach
                    {{-- @for($i = 0; $i < 10; $i++)
                    <x-product-layout>
                        <img src="{{ asset('/leker.png') }}" alt="" class="w-full">
                        <div class="my-2">
                            <strong class="text-[14px]">Leker Gosong</strong>
                            <div class="flex justify-between text-[10px] my-1">
                                <p class="">101 left</p>
                                <i class="fa-solid fa-star text-[#FFC529]"> <span class="text-gray-900">4,8</span></i>
                            </div>
                            <strong class="text-[14px]">IDR 98,000.00</strong>
                        </div>
                    </x-product-layout>
                    @endfor --}}
                </div>
            </div>
        </div>
</x-pages-layout>
