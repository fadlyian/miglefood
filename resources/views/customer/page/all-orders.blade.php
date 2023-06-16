<x-pages-layout>
    @for($i = 0; $i < 10; $i++)
        <div class="shadow p-6 rounded-md my-2 text-[14px] hover:shadow-md transition ease-in-out duration-150">
            <x-format-text>
                <p>Customer Name</p>
                <p>Arif Saputra</p>
            </x-format-text>
            <x-format-text>
                <p>Table Number</p>
                <p>11</p>
            </x-format-text>
            <x-format-text>
                <p>Order to</p>
                <p>2</p>
            </x-format-text>
        </div>
    @endfor
</x-pages-layout>
