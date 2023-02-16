<x-nav.layout>
    <section class="py-8 max-w-7xl mx-auto">
        <x-table.layout>
                <thead>
                    <tr>
                        <x-table.paragraph-head-section>Imię Klienta</x-table.paragraph-head-section>
                        <x-table.paragraph-head-section>Typ Zamówienia</x-table.paragraph-head-section>
                        <x-table.paragraph-head-section>Ilość</x-table.paragraph-head-section>
                        <x-table.paragraph-head-section>Cena</x-table.paragraph-head-section>
                        <x-table.paragraph-head-section>Data Zakupu</x-table.paragraph-head-section>
                        <x-table.paragraph-head-section>Zrealizowane</x-table.paragraph-head-section>
                        <x-table.ahref-head-section :href="route('order/create')">Dodaj Zamównienie</x-table.ahref-head-section>
                    </tr>
                </thead>
                @foreach($orders as $order)

                    <tbody>
                        <x-table.paragraph-body-section>{{ $order->clients->name }}</x-table.paragraph-body-section>
                        <x-table.paragraph-body-section>{{ $order->typeOfOrders->order_type }}</x-table.paragraph-body-section>
                        <x-table.paragraph-body-section>{{ $order->quantity . " szt"}}</x-table.paragraph-body-section>
                        <x-table.paragraph-body-section>{{ $order->price . " zł"}}</x-table.paragraph-body-section>
                        <x-table.paragraph-body-section>{{ $order->created_at }}</x-table.paragraph-body-section>
                        <x-table.paragraph-body-section>{{ $order->is_completed }}</x-table.paragraph-body-section>
                        <x-table.edit-button href="/order/{{ $order->id }}/edit">Edycja</x-table.edit-button>
                    </tbody>
                @endforeach
        </x-table.layout>
    </section>
</x-nav.layout>

