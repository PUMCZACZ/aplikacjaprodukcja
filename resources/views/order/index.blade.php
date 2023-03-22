@php
    /**
    * @var \App\Models\Order $order
    */
@endphp
<x-nav.layout>
    <section class="py-2 px-4 mx-auto">
        <x-table.layout>
                <thead>
                    <tr>
                        <x-table.paragraph-head-section>Imię i Nazwisko</x-table.paragraph-head-section>
                        <x-table.paragraph-head-section>Typ Zamówienia</x-table.paragraph-head-section>
                        <x-table.paragraph-head-section>Ilość</x-table.paragraph-head-section>
                        <x-table.paragraph-head-section>Cena</x-table.paragraph-head-section>
                        <x-table.paragraph-head-section>Data Realiacji Zamówienia</x-table.paragraph-head-section>
                        <x-table.paragraph-head-section>Zrealizowane</x-table.paragraph-head-section>
                        <x-table.ahref-head-section :href="route('orders.create')">Dodaj Zamównienie</x-table.ahref-head-section>
                    </tr>
                </thead>
                @foreach($orders as $order)
                    <tbody>
                        <x-table.paragraph-body-section>{{ $order->clients->name . ' ' . $order->clients->lastname }}</x-table.paragraph-body-section>
                        <x-table.paragraph-body-section>{{ $order->order_type->translate() }}</x-table.paragraph-body-section>
                        <x-table.paragraph-body-section>{{ $order->quantity}} szt</x-table.paragraph-body-section>
                        <x-table.paragraph-body-section>{{ $order->priceToDolars() }} zł</x-table.paragraph-body-section>
                        <x-table.paragraph-body-section>{{ Carbon\Carbon::parse($order->deadline)->locale('pl')->calendar() }}</x-table.paragraph-body-section>
                        <x-table.paragraph-body-section>
                            @if($order->is_completed == 0)
                                Niezrealizowane
                            @else
                                Zrealizowane
                            @endif›
                        </x-table.paragraph-body-section>

                        <x-table.edit-button :href="route('orders.edit', $order->id)">Edycja</x-table.edit-button>
                        <x-table.delete-button :action="route('orders.destroy', $order->id)">Usuń</x-table.delete-button>
                    </tbody>
                @endforeach
        </x-table.layout>
        <div class="mt-6">
            {{ $orders->links() }}
        </div>
    </section>
</x-nav.layout>

