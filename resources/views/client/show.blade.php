<x-nav.layout>
    <sectoion class="py-8 max-w-7xl mx-auto">
        <div class="flex pt-4">
            <div class="border border-gray-300 p-6 rounded-xl py-6 max-w-4xl mx-auto">
                <table>
                       <thead>
                            <th class="pb-2 text-sm">Imię</th>
                            <th class="pb-2 text-sm">Nazwisko</th>
                            <th class="pb-2 text-sm">Miejscowość</th>
                            <th class="pb-2 text-sm">Status</th>
                       </thead>
                       <tbody>
                           <td class="px-6">{{ $client->name }}</td>
                           <td class="px-6">{{ $client->lastname }}</td>
                           <td class="px-6">{{ $client->city }}</td>
                           <td class="px-6">{{ $client->status }}</td>
                       </tbody>
                   </table>
            </div>
        </div>
    </sectoion>
    <div class="flex pt-4">
        <div class="border border-gray-300 p-6 rounded-xl py-6 max-w-8xl mx-auto">
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
                        <x-table.paragraph-body-section>{{ $order->typeOfOrders->order_type }}</x-table.paragraph-body-section>
                        <x-table.paragraph-body-section>{{ $order->quantity . "szt" }}</x-table.paragraph-body-section>
                        <x-table.paragraph-body-section>{{ $order->price   . " zł" }}</x-table.paragraph-body-section>
                        <x-table.paragraph-body-section>{{ $order->created_at }}</x-table.paragraph-body-section>
                        <x-table.paragraph-body-section>{{ $order->is_completed }}</x-table.paragraph-body-section>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</x-nav.layout>
