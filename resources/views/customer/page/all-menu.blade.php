<x-pages-layout>
    <div>
        <x-horizontal-scroll>
            @for($i = 0; $i < 10; $i++)
            <x-category-link href="#">Cake</x-category-link>
            @endfor
        </x-horizontal-scroll>
        <div class="grid grid-cols-2 gap-2">
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
        </div>
    </div>
</x-pages-layout>
