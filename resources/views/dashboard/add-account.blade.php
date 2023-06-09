<x-app-layout>
    @include('layouts.sidebar')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ml-[50%] mt-10">
        <x-form-dashboard>
            <h1 class="text-center text-[24px] font-bold mb-6">Add Account</h1>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('add-account') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Role -->
                <div class="mt-4">
                    <x-input-label for="role" :value="__('Role')" />
                    <select name="role" id="role" class="w-full block mt-1 border-gray-300 focus:border-[#FFC529] focus:ring-[#FFC529] rounded-md shadow-sm" required autofocus>
                        <option disabled selected>Choose One</option>
                        <option value="admin">Admin</option>
                        <option value="cashier">Cashier</option>
                        <option value="chef">Chef</option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
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
                        {{ __("Add Account") }}
                    </x-primary-button>
                </div>
            </form>
        </x-form-dashboard>
    </div>
</x-app-layout>
