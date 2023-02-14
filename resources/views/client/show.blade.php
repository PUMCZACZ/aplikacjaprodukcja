<x-nav.layout>
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
    <div class="flex pt-4">
        <div class="border border-gray-300 p-6 rounded-xl py-6 max-w-4xl mx-auto">
            <table>
                <thead>
                    <th class="pb-2 px-2 text-sm">lp.</th>
                    <th class="pb-2 px-2 text-sm">Typ Zamówienia</th>
                    <th class="pb-2 px-2 text-sm">Ilość</th>
                    <th class="pb-2 px-2 text-sm">Cena</th>
                    <th class="pb-2 px-2 text-sm">Data Złożenia Zamówienia</th>
                    <th class="pb-2 px-2 text-sm">Zrealizowane</th>
                </thead>
                @foreach($client->orders as $order)
                    <tbody>
                        <td class="px-6">{{ $loop->iteration }}</td>
                        <td class="px-6">{{ $order->typeOfOrders->order_type }}</td>
                        <td class="px-6">{{ $order->quantity . " szt" }}</td>
                        <td class="px-6">{{ $order->price . " zł"}}</td>
                        <td class="px-6">{{ $order->created_at }}</td>
                        <td class="px-6">{{ $order->is_completed }}</td>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</x-nav.layout>
