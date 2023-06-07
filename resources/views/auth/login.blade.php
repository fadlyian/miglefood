<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="my-2">
                {{ __('Log in') }}
            </x-primary-button>

        </div>
        <p class="text-center text-[14px] my-3">By clicking Log In, you agree to our <a href="" class="text-[#BC8B09] underline">Terms of Service</a> and <a href="" class="text-[#BC8B09] underline">Privacy Policy</a>.</p>
        <label for="marketing_promotion" class="">
            <input id="marketing_promotion" type="checkbox" class="rounded border-gray-300 text-[#FFC529] shadow-sm focus:ring-[#FFC529]" name="marketing">
            <span class="ml-1 text-[14px] text-gray-600">{{ __('Do not wish to receive any marketing or promotional materials') }}</span>
        </label>
    </form>
</x-guest-layout>
