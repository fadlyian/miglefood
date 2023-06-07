<x-app-layout>
    <div class="py-12 mx-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-[20px] sm:px-[80px] sm:py-[60px] bg-white shadow sm:rounded-[20px]">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-[20px] sm:px-[80px] sm:py-[60px] bg-white shadow sm:rounded-[20px]">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-[20px] sm:px-[80px] sm:py-[60px] bg-white shadow sm:rounded-[20px]">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
