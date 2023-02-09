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
                        <x-table.body-section>{{ $order->clients->name }}</x-table.body-section>
                        <x-table.body-section>{{ $order->type_of_order }}</x-table.body-section>
                        <x-table.body-section>{{ $order->quantity }}</x-table.body-section>
                        <x-table.body-section>{{ $order->price }}</x-table.body-section>
                        <x-table.body-section>{{ $order->date_of_purchase }}</x-table.body-section>
                        <x-table.body-section>{{ $order->is_completed }}</x-table.body-section>
                    </tbody>
                @endforeach
        </x-table.layout>
    </section>
</x-nav.layout>

