<x-nav.layout>
    <section class="py-8 max-w-4xl mx-auto">
        <h1 class="text-lg font-bold mb-8 pb-2 border-b">
            Szczegóły Zamówienia: {{ $order->clients->name . ' '. $order->clients->lastname }}
        </h1>
        <div class="flex">
            <main class="flex-1">
                <div class="border border-gray-300 p-6 rounded-xl">
                    <form method="POST" action="{{ route('orders.update', $order->id)}}">
                        @csrf

                        <x-form.field>
                            <x-form.label>Klient</x-form.label>
                            <select name="client_id"
                                    id="client_id"
                                    class="bg-gray-50 border border-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                                <option value="{{ $order->client_id }}"
                                    {{ $order->client_id == $order->clients->id ? 'selected' : '' }}
                                >
                                    {{ $order->clients->name . ' '. $order->clients->lastname }}
                                </option>
                            </select>
                        </x-form.field>

                        <div x-data="{ show_weight: ''}">
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
                                <x-form.input name="weight"
                                              type="number"
                                              min="1"
                                              :value="old('weight', $order->weight)"
                                >Waga [kg]
                                </x-form.input>
                            </div>
                        </div>

                        <x-form.input name="quantity" :value="old('quantity', $order->quantity)" required>Ilość
                        </x-form.input>
                        <x-form.input name="price" type="numeric" :value="old('price', $order->priceToDolars())"
                                      required>Cena
                        </x-form.input>
                        <x-form.input name="deadline" type="datetime-local" :value="old('deadline', $order->deadline)"
                                      required>Termin Realizacji Zamówienia
                        </x-form.input>
                        <div class="grid justify-items-end mt-6">
                            <label class="text-sm">Ostatnia modyfikacja zamówienia</label>
                            <p class="text-sm">{{ \Carbon\Carbon::parse($order->updated_at)->locale('pl')->diffForHumans() }}</p>
                        </div>
                        <x-form.button>Dodaj</x-form.button>
                    </form>
                </div>
            </main>



        </div>
    </section>
</x-nav.layout>
