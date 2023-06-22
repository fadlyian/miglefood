<x-pages-layout>
    <div>
        <x-horizontal-scroll>
            @foreach ($categories as $category)
            <x-category-link href="{{ route('productByCategory', $category->id) }}">{{ $category->name }}</x-category-link>
            @endforeach
        </x-horizontal-scroll>
        <div class="grid grid-cols-2">
            @foreach ($products as $product)
            <x-product-layout>
                <img src="{{ asset('/leker.png') }}" alt="" class="w-full">
                <div class="my-2">
                    <strong class="text-[14px]">{{ $product->name }}</strong>
                    <div class="flex justify-between text-[10px] my-1">
                        <p class="">{{ $product->stock }} left</p>
                        <i class="fa-solid fa-star text-[#FFC529]"> <span class="text-gray-900">4,8</span></i>
                    </div>
                    <strong class="text-[14px]">IDR {{ number_format($product->price,2,',','.') }}</strong>
                </div>
                <form action="{{ route('addToCart', $product->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <x-primary-button-two>{{ __('Add to Cart') }}</x-primary-button-two>
                </form>
            </x-product-layout>
            @endforeach
        </div>
    </div>
</x-pages-layout>
