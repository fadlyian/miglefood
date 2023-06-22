<x-pages-layout>
    @if(count($orders) != NULL)
    @foreach ($orders as $order)
    <div class="shadow p-6 rounded-md my-2 text-[14px] hover:shadow-md transition ease-in-out duration-150">
        <x-format-text>
            <p>Customer Phone</p>
            <p>{{ $order->consumer->phoneNumber }}</p>
        </x-format-text>
        <x-format-text>
            <p>Table Number</p>
            <p>{{ $order->tableNumber }}</p>
        </x-format-text>
        <x-format-text>
            <p>Order to</p>
            <p>{{ $order->id }}</p>
        </x-format-text>
    </div>
    @endforeach
    @else
        <div class="text-center shadow p-6 rounded-md text-[14px] hover:shadow-md transition ease-in-out duration-150 flex flex-col">
            <strong>Now no one has ordered!</strong>
        </div>
    @endif
</x-pages-layout>
