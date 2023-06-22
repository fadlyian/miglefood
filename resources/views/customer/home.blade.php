<x-pages-layout>
    <div id="input-table" class="bg-third border border-primary text-gray-900 px-4 py-3 rounded-lg relative mb-4" role="alert">
        <strong class="font-bold">Enter Table Number:</strong>
        <span class="block sm:inline">Please enter your table number below:</span>
        <form action="{{ route('inputTable') }}" method="POST" class="mt-3 sm:flex">
            {{-- {{ route('submit-table-number') }} --}}
            @csrf
            <x-text-input id="table" class="block h-[30px] mr-4 w-[100%]" type="number" name="table" min="1" max="20" value="{{ session('table') }}" required />
            <x-input-error :messages="$errors->get('table')" class="mt-2" />
            {{-- <x-text-input type="text" name="table_number" class="w-full sm:w-auto px-2 py-1 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Nomor Meja" required> --}}
            <x-primary-button-two type="submit">Submit</x-primary-button-two>
        </form>
    </div>
    <h2 class="text-[18px] font-bold">Recommended for you</h2>
            <x-horizontal-scroll>
                @foreach ($products->sortByDesc('stock')->take(4) as $product)
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
                    <form action="{{ route('addToCart') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <x-primary-button-two>{{ __('Add to Cart') }}</x-primary-button-two>
                    </form>
                </x-product-layout>
                @endforeach
            </x-horizontal-scroll>

            <div>
                <div class="flex justify-between">
                    <h2 class="text-[18px] font-bold">Order</h2>
                    <a href="{{route('all-menu')}}" class="text-[#BC8B09]">View all</a>
                </div>
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
                        <form action="{{ route('addToCart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <x-primary-button-two>{{ __('Add to Cart') }}</x-primary-button-two>
                        </form>
                    </x-product-layout>
                    @endforeach
                </div>
            </div>
        </div>
</x-pages-layout>
