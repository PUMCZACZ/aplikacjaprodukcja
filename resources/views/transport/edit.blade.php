@php
    /**
     * @var \App\Models\Transport $transport
     */
@endphp
<x-nav.layout>
    <section class="py-8 max-w-4xl mx-auto">
        <h1 class="text-lg font-bold mb-8 pb-2 border-b">
            Szczegóły Zamówienia:
        </h1>
        <div class="flex">
            <main class="flex-1">
                <div class="border border-gray-300 p-6 rounded-xl">
                    <form method="POST" action="{{ route('transports.update', $transport->id) }}">
                        @csrf

                        <x-form.input name="name_of_company"
                                      :value="old('name_of_company', $transport->name_of_company)">Nazwa Firmy
                        </x-form.input>
                        <x-form.input name="type_of_product"
                                      :value="old('type_of_product', $transport->type_of_product)">Typ Produktu
                        </x-form.input>
                        <x-form.input name="product_amount" :value="old('product_amount', $transport->product_amount)">
                            Ilość
                        </x-form.input>
                        <x-form.input name="product_price" type="number" step="1" min="1" required
                                      :value="old('product_price', $transport->product_price)">Cena
                        </x-form.input>
                        <x-form.input name="delivered_at" type="datetime-local" value="{{ now() }}" required
                                      :value="old('delivered_at', $transport->delivered_at)">Data Dostarczenia
                        </x-form.input>
                        <x-form.button>Dodaj</x-form.button>
                    </form>
                </div>
            </main>
        </div>
    </section>
</x-nav.layout>
