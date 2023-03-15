<x-nav.layout>
    <section class="py-8 max-w-4xl mx-auto">
        <h1 class="text-lg font-bold mb-8 pb-2 border-b">
            Edycja Klienta: {{  $client->name }}
        </h1>
        <div class="flex">
            <main class="flex-1">
                <div class="border border-gray-300 p-6 rounded-xl">
                    <form method="POST" action="/client/edit/{{ $client->id }}">
                        @csrf
                        @method('PATCH')
                        <div x-data="{show_client_type: ''}">
                            <x-form.field>
                                <x-form.label>Typ Klienta</x-form.label>
                                <select x-model="show_client_type" name="type_of_client">
                                    @foreach(\App\ClientTypeEnum::cases() as $type)
                                        <option value="{{ $type->value }}">{{ $type->translate() }}</option>
                                    @endforeach
                                </select>
                            </x-form.field>

                            <div x-show="show_client_type === 'wholesale client'">
                                <x-form.input name="name_of_company" type="text" min="1">Nazwa Firmy</x-form.input>
                            </div>
                        </div>
                        <x-form.input name="name" :value="old('name', $client->name)" required>Imię</x-form.input>
                        <x-form.input name="lastname" :value="old('lastname', $client->lastname)" required>Nazwisko</x-form.input>
                        <x-form.input name="city" :value="old('city', $client->city)" required>Miejscowość</x-form.input>
                        <x-form.input name="phone_number" type="tel" :value="old('phone_number', $client->phone_number)" placeholder="xxx-xxx-xxx" >Numer Telefonu</x-form.input>
                        <x-form.input name="status" :value="old('status', $client->status)">Status</x-form.input>

                        <x-form.button>Zatwierdź</x-form.button>
                    </form>
                </div>
            </main>
        </div>
    </section>
</x-nav.layout>
