<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- PhoneNumber -->
        <div>
            <x-input-label for="phoneNumber" :value="__('Phone Number')" />
            <x-text-input id="phoneNumber" class="block mt-1 w-full" type="number" name="phoneNumber" :value="old('phoneNumber')" required autofocus autocomplete="phone-number" />
            <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="my-2">
                {{ __("Let's Go") }}
                <i class="fa-solid fa-arrow-right"></i>
            </x-primary-button>
        </div>
        <p class="text-center text-[14px] my-3">By clicking Let’s Go, you agree to our <a href="" class="text-[#BC8B09] underline">Terms of Service</a> and <a href="" class="text-[#BC8B09] underline">Privacy Policy</a>.</p>
        <label for="marketing_promotion" class="">
            <input id="marketing_promotion" type="checkbox" class="rounded border-gray-300 text-[#FFC529] shadow-sm focus:ring-[#FFC529]" name="marketing">
            <span class="ml-1 text-[14px] text-gray-600">{{ __('Do not wish to receive any marketing or promotional materials') }}</span>
        </label>
    </form>
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
    <script src="https://kit.fontawesome.com/1d72cf6431.js" crossorigin="anonymous"></script>
</x-guest-layout>
