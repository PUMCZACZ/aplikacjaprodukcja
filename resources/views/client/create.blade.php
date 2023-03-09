<x-nav.layout>
    <section class="py-8 max-w-4xl mx-auto">
        <h1 class="text-lg font-bold mb-8 pb-2 border-b">
            Sekcja Zarządzania
        </h1>
        <div class="flex">
            <main class="flex-1">
                <div class="border border-gray-300 p-6 rounded-xl">
                    <form method="POST" action="/client/create">
                        @csrf
                        <x-form.field>
                            <x-form.label>Typ Klienta</x-form.label>
                            <select name="type_of_client">
                                @foreach(\App\ClientTypeEnum::cases() as $type)
                                    <option value="{{ $type->value }}">{{ $type->translate() }}</option>
                                @endforeach
                            </select>
                        </x-form.field>

                        <x-form.input name="name" required>Imię</x-form.input>
                        <x-form.input name="lastname" required>Nazwisko</x-form.input>
                        <x-form.input name="city" required>Miejscowość</x-form.input>
                        <x-form.input name="phone_number" type="tel" placeholder="xxx-xxx-xxx">Numer Telefonu</x-form.input>
                        <x-form.input name="status" required>Status</x-form.input>


                        <x-form.button>Dodaj</x-form.button>
                    </form>
                </div>
            </main>
        </div>
    </section>

</x-nav.layout>

