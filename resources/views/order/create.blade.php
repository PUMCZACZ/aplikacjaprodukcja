<x-nav.layout>
    <section class="py-8 max-w-4xl mx-auto">
        <h1 class="text-lg font-bold mb-8 pb-2 border-b">
            Sekcja Zarządzania
        </h1>
        <div class="flex">
            <main class="flex-1">
                <div class="border border-gray-300 p-6 rounded-xl">
                    <form method="POST" action="/order/create">
                        @csrf
                        <x-form.field>
                            <x-form.label>Klient</x-form.label>
                                <select name="client_id" id="client_id" required>
                                    @foreach($clients as $client)
                                        <option
                                            value="{{ $client->id }}"
                                            {{ old('client_id') == $client->id ? 'selected' : '' }}
                                        >{{ ucwords($client->name . ' ' . $client->lastname)}}</option>
                                    @endforeach
                                </select>
                        </x-form.field>

                        <x-form.field>
                            <x-form.label>Typ Zamówienia</x-form.label>
                            <select name="order_type">
                                @foreach(\App\OrderTypeEnum::cases() as $type)
                                    <option value="{{ $type->value }}">{{ $type->translate() }}</option>
                                @endforeach
                            </select>
                        </x-form.field>

                        <x-form.input name="quantity" type="number" step="1" min="1" required>Ilość</x-form.input>
                        <x-form.input name="price" type="number" step="0.01" min="0.01" required>Cena</x-form.input>
                        <x-form.input name="deadline" type="datetime-local" value="{{ now() }}" min="{{ now()->format('d-m-Y') }}" required>Termin Realizacji Zamówienia</x-form.input>

                        <x-form.button>Dodaj</x-form.button>

                        <x-form.error name="orders"/>
                    </form>
                </div>
            </main>
        </div>
    </section>
</x-nav.layout>
