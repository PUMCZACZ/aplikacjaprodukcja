<x-nav.layout>
    <section class="py-8 max-w-7xl mx-auto">
        <x-table.layout>
                <thead>
                    <tr>
                        <x-table.paragraph-head-section>Imię Klienta</x-table.paragraph-head-section>
                        <x-table.paragraph-head-section>Typ Zamówienia</x-table.paragraph-head-section>
                        <x-table.paragraph-head-section>Ilość</x-table.paragraph-head-section>
                        <x-table.paragraph-head-section>Cena</x-table.paragraph-head-section>
                        <x-table.paragraph-head-section>Data Złożenia Zamówienia</x-table.paragraph-head-section>
                        <x-table.paragraph-head-section>Data Realiacji Zamówienia</x-table.paragraph-head-section>
                        <x-table.paragraph-head-section>Zrealizowane</x-table.paragraph-head-section>
                        <x-table.ahref-head-section :href="route('order/create')">Dodaj Zamównienie</x-table.ahref-head-section>
                    </tr>
                </thead>
                @foreach($orders as $order)
                    <tbody>
                        <x-table.paragraph-body-section>{{ $order->clients->name . ' ' . $order->clients->lastname }}</x-table.paragraph-body-section>
                        <x-table.paragraph-body-section>{{ $order->order_type->translate() }}</x-table.paragraph-body-section>
                        <x-table.paragraph-body-section>{{ $order->quantity . " szt"}}</x-table.paragraph-body-section>
                        <x-table.paragraph-body-section>{{  $order->price / 100 . " zł" }}</x-table.paragraph-body-section>
                        <x-table.paragraph-body-section>{{ $order->created_at }}</x-table.paragraph-body-section>
                        <x-table.paragraph-body-section>{{ $order->deadline }}</x-table.paragraph-body-section>
                        <x-table.paragraph-body-section>
                            @if($order->is_completed == 0)
                                Niezrealizowane
                            @else
                                Zrealizowane
                            @endif›
                        </x-table.paragraph-body-section>

                        <x-table.edit-button href="/order/{{ $order->id }}/edit">Edycja</x-table.edit-button>
                        <x-table.delete-button action="/order/delete/{{ $order->id }}">Usuń</x-table.delete-button>
                    </tbody>
                @endforeach
        </x-table.layout>
    </section>
</x-nav.layout>

