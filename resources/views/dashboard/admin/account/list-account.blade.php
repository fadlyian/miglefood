<x-app-layout>
    @include('layouts.sidebar-admin')
    <div class="ml-[45%] mt-10 py-12 flex-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($users as $user)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-3 max-w-[500px]">
                <div class="p-6 text-gray-900 flex justify-between">
                    <div class="w-[85%]">
                        <p class="text-[24px] font-bold">{{ $user->name }}</p>
                        <p class="capitalize">{{ $user->role }}</p>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div class="w-[15%] items-center flex justify-between">
                        <form method="get" action="{{ route('edit-account', $user->id) }}">
                            @csrf
                            <button type="submit" class="text-[26px] p-2 bg-green-600 border border-transparent rounded-lg font-semibold text-xs text-white capitalize tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150" x-data="$user->id"><i class="fa-solid fa-arrows-rotate"></i></button>
                        </form>
                        <form method="post" action="{{ route('delete-account', $user->id) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-[26px] p-2 bg-red-600 border border-transparent rounded-lg font-semibold text-xs text-white capitalize tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                <form method="post" action="{{ route('profile.destroy', $user->id) }}" class="p-6">
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
            </x-modal> --}}

        </div>
    </div>
</x-app-layout>
