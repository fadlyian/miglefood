<x-app-layout>
    @include('layouts.sidebar')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ml-[50%] mt-10">
        <x-form-dashboard>
            <h1 class="text-center text-[24px] font-bold mb-6">Add Menu</h1>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('add-menu') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Category -->
                <div class="mt-4">
                    <x-input-label for="category" :value="__('Category')" />
                    <select name="category" id="category" class="w-full block mt-1 border-gray-300 focus:border-[#FFC529] focus:ring-[#FFC529] rounded-md shadow-sm" required>
                        <option disabled selected>Choose One</option>
                        <option value="1">Cake</option>
                        <option value="2">Rice</option>
                        <option value="3">Meat</option>
                        <option value="4">Fish</option>
                        <option value="5">Milk</option>
                        <option value="6">Drink</option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>

                <!-- Stock -->
                <div class="mt-4">
                    <x-input-label for="stock" :value="__('Stock')" />
                    <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock" :value="old('stock')" required/>
                    <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                </div>

                <!-- Price -->
                <div class="mt-4">
                    <x-input-label for="price" :value="__('Price')" />
                    <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required/>
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                <!-- Choose Image File -->
                <div class="mt-4">
                    <x-input-label for="image" :value="__('Choose Image')" class="mb-2" />
                    <input type="file" id="image" name="image" :value="old('image')" hidden/>
                    <label class="mt-1 px-4 py-2 bg-white border border-gray-300 rounded-full font-semibold text-xs capitalize" for="image">Choose File</label>
                    <span class="text-[14px]" id="file-chosen">No file chosen</span>
                    <script>
                        const actualBtn = document.getElementById('image');
                        const fileChosen = document.getElementById('file-chosen');
                        actualBtn.addEventListener('change', function(){
                        fileChosen.textContent = this.files[0].name
                        })
                    </script>
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="my-2">
                        {{ __("Add Menu") }}
                    </x-primary-button>
                </div>
            </form>
        </x-form-dashboard>
    </div>
</x-app-layout>
<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    }

    /* Firefox */
    input[type=number] {
    -moz-appearance: textfield;
    }
</style>
