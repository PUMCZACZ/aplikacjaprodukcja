<x-nav.layout>
    <section class="py-8 max-w-4xl mx-auto">
        <h1 class="text-lg font-bold mb-8 pb-2 border-b">
            Sekcja Zarządzania
        </h1>
        <div class="flex">
            <main class="flex-1">
                <div class="border border-gray-300 p-6 rounded-xl">
                    <form method="POST" action="">
                        @csrf
                        <x-form.field>
                            <x-form.label>Klient</x-form.label>
                                <select name="client_id" id="client_id" required>
                                    @foreach($clients as $client)
                                        <option
                                            value="{{ $client->id }}"
                                            {{ old('client_id') == $client->id ? 'selected' : '' }}
                                        >{{ ucwords($client->name)}}</option>
                                    @endforeach
                                </select>
                        </x-form.field>

                        <x-form.field>
                            <x-form.label>Typ Zamówienia</x-form.label>
                                <select name="type_of_order_id" id="type_of_order_id" required>
                                    @foreach($typeOfOrders as $typeOfOrder)
                                        <option
                                            value="{{ $typeOfOrder->id }}"
                                            {{ old('type_of_order_id') == $typeOfOrder->id ? 'selected' : '' }}
                                        >{{ucwords($typeOfOrder->order_type)}}</option>
                                    @endforeach
                                </select>
                        </x-form.field>

                        <x-form.input name="quantity" required>Ilość</x-form.input>
                        <x-form.input name="price" required>Cena</x-form.input>
                        <x-form.input name="date" type="date">Data Zamówienia</x-form.input>
{{--                        <x-form.input name="is_completed">Is completed</x-form.input>--}}

                        <x-form.button>Dodaj</x-form.button>

                        <x-form.error name="orders"/>
                    </form>
                </div>
            </main>
        </div>
    </section>

</x-nav.layout>
