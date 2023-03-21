@php
    /**
    * @var \App\Models\Client $client
    */
@endphp
<x-nav.layout>
    <section>
        <div class="flex pt-4">
            <div class="border border-gray-300 rounded-xl mx-auto p-6">
                <table class="table-auto">
                       <thead>
                            <th class="pb-2 text-sm">Imię</th>
                            <th class="pb-2 text-sm">Nazwisko</th>
                            <th class="pb-2 text-sm">Miejscowość</th>
                            <th class="pb-2 text-sm">Status</th>
                            <th class="pb-2 text-sm">Numer Telefonu</th>
                            <th class="pb-2 text-sm">Typ Klienta</th>
                            <th class="pb-2 text-sm">Nazwa Firmy</th>
                       </thead>
                       <tbody>
                           <td class="px-10">{{ $client->name }}</td>
                           <td class="px-10">{{ $client->lastname }}</td>
                           <td class="px-10">{{ $client->city }}</td>
                           <td class="px-10">{{ $client->status }}</td>
                           <td class="px-10">{{ $client->formatPhoneNumber() }}</td>
                           <td class="px-10">{{ $client->type_of_client->translate() }}</td>
                           <td class="px-10">
                               @if($client->name_of_company === null) Brak Danych
                               @else {{ $client->name_of_company }}
                               @endif
                           </td>
                       </tbody>
                   </table>
            </div>
        </div>
    </section>
    <section class="flex mt-6 justify-center">
                <table>
                    <thead>
                        <x-table.paragraph-head-section>lp.</x-table.paragraph-head-section>
                        <x-table.paragraph-head-section>Typ Zamówienia</x-table.paragraph-head-section>
                        <x-table.paragraph-head-section>Ilość</x-table.paragraph-head-section>
                        <x-table.paragraph-head-section>Cena</x-table.paragraph-head-section>
                        <x-table.paragraph-head-section>Data Złożenia Zamówienia</x-table.paragraph-head-section>
                        <x-table.paragraph-head-section>Zrealizowane</x-table.paragraph-head-section>
                    </thead>
                    @foreach($client->orders as $order)
                        <tbody>
                            <x-table.paragraph-body-section>{{ $loop->iteration }}</x-table.paragraph-body-section>
                            <x-table.paragraph-body-section>{{ $order->order_type->translate()}}</x-table.paragraph-body-section>
                            <x-table.paragraph-body-section>{{ $order->quantity . " szt" }}</x-table.paragraph-body-section>
                            <x-table.paragraph-body-section>{{ $order->priceToDolars() . " zł" }}</x-table.paragraph-body-section>
                            <x-table.paragraph-body-section>{{ $order->created_at }}</x-table.paragraph-body-section>
                            <x-table.paragraph-body-section>
                                @if($order->is_completed == 0)
                                    Niezrealizowane
                                @else
                                    Zrealizowane
                                @endif
                            </x-table.paragraph-body-section>
                        </tbody>
                    @endforeach
                </table>
    </section>
    <section class="py-4 max-w-7xl mx-auto">
        <div class="flex pt-4">
            <div class="border border-gray-300 p-6 rounded-xl py-6 max-w-8xl mx-auto">
                    <p>Podsumowanie</p>
                    <p>Suma: {{ number_format($client->orders->sum('price', 2)) . "zł" }}</p>
            </div>
        </div>
    </section>
</x-nav.layout>
