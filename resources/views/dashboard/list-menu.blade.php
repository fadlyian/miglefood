<x-app-layout>
    @include('layouts.sidebar')
    <div class="ml-[40%] mt-10 py-12 flex-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($products as $product)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-3 max-w-[700px]">
                <div class="p-6 text-gray-900 flex justify-between">
                    <img src="{{URL::asset('/leker.png')}}" alt="Leker" class="h-[80px] flex-0 mr-6">
                    <div class="flex-1 mr-20">
                        <p class="text-[24px] font-bold">{{ $product->name }}</p>
                        <div class="flex justify-between">
                            <p>Remaining Stock</p>
                            <p class="capitalize">{{ $product->stock }}</p>
                        </div>
                        <div  class="flex justify-between">
                            <p>Price</p>
                            <p>{{ $product->price }}</p>
                        </div>
                    </div>
                    <div class="h-full mt-5">
                        <button type="submit" class="text-[26px] mr-2 p-2 bg-green-600 border border-transparent rounded-lg font-semibold text-xs text-white capitalize tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150" x-data="$user->id"><i class="fa-solid fa-arrows-rotate"></i></button>
                        <button type="submit" class="text-[26px] p-2 bg-red-600 border border-transparent rounded-lg font-semibold text-xs text-white capitalize tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150" x-data="$user->id" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </div>
            </div>
            @endforeach
            <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                <form method="post" action="" class="p-6">
                    @csrf
                    @method('delete')
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Are you sure you want to delete the account?') }}
                    </h2>
                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Cancel') }}
                        </x-secondary-button>

                        <x-danger-button class="ml-3">
                            {{ __('Delete Account') }}
                        </x-danger-button>
                    </div>
                </form>
            </x-modal>
        </div>
    </div>
</x-app-layout>
