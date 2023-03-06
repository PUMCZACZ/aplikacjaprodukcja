<x-nav.layout>
    <section class="py-8 max-w-4xl mx-auto">
        <h1 class="text-lg font-bold mb-8 pb-2 border-b">
            Edycja Zamówienia
        </h1>
        <div class="flex">
            <main class="flex-1">
                <div class="border border-gray-300 p-6 rounded-xl">
                    <form method="POST" action="/order/edit/{{ $order->id }}">
                        @csrf
                        @method('PATCH')
                        <x-form.field>
                            <x-form.label>Klient</x-form.label>
                            <select name="client_id" id="client_id" required>
                                    <option value="{{ $order->client_id }}"
                                            {{ $order->client_id == $order->clients->id ? 'selected' : '' }}
                                    >
                                        {{ $order->clients->name . ' '. $order->clients->lastname}}
                                    </option>
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
                        <x-form.input name="quantity" :value="old('quantity', $order->quantity)" required>Ilość</x-form.input>
{{--                        <x-form.input name="price" type="numeric" :value="old('price', $order->priceToDolars(), )" required>Cena</x-form.input>--}}
                        <x-form.date-time name="deadline" placeholder="{{ $order->deadline }}" required>Termin Realizacji Zamówienia</x-form.date-time>

                        <x-form.button>Dodaj</x-form.button>
                    </form>
                </div>
            </main>
        </div>
    </section>
</x-nav.layout>
