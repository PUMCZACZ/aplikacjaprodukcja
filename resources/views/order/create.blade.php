<x-nav.layout>
    <section class="py-8 max-w-4xl mx-auto">
        <h1 class="text-lg font-bold mb-8 pb-2 border-b">
            Sekcja Zarządzania
        </h1>
        <div class="flex">
            <main class="flex-1">
                <div class="border border-gray-300 p-6 rounded-xl">
                    <form method="POST" action="{{ route('orders.store') }}">
                        @csrf
                        <x-form.field>
                            <x-form.label>Klient</x-form.label>
                                <select name="client_id"
                                        id="client_id"
                                        class="bg-gray-50 border border-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                    @foreach($clients as $client)
                                        <option
                                            value="{{ $client->id }}"
                                            {{ old('client_id') == $client->id ? 'selected' : '' }}
                                        >{{ ucwords($client->name . ' ' . $client->lastname)}}</option>
                                    @endforeach
                                </select>
                        </x-form.field>

                        <div x-data="{ show_weight: ''}" >
                            <x-form.field>
                                <x-form.label>Typ Zamówienia</x-form.label>
                                <select x-model="show_weight"
                                        name="order_type"
                                        class="bg-gray-50 border border-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                >
                                    @foreach(\App\OrderTypeEnum::cases() as $type)
                                        <option value="{{ $type->value }}">{{ $type->translate() }}</option>
                                    @endforeach
                                </select>
                            </x-form.field>

                            <div x-show="show_weight !== 'bag'">
                                <x-form.input name="weight" type="number" min="1">Waga [kg]</x-form.input>
                            </div>
                        </div>
                        <x-form.input name="quantity" type="number" step="1" min="1" required>Ilość</x-form.input>
                        <x-form.input name="deadline" type="datetime-local" value="{{ now() }}" required>Termin Realizacji Zamówienia</x-form.input>

                        <x-form.button>Dodaj</x-form.button>

                        <x-form.error name="orders"/>
                    </form>
                </div>
            </main>
        </div>
    </section>
</x-nav.layout>
