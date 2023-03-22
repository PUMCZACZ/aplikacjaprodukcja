@php
    /**
    * @var \App\Models\Client $client
    */
@endphp

<x-nav.layout>
    <section class="py-2 px-4 mx-auto">
        <x-table.layout>
            <thead>
                <tr>
                    <x-table.paragraph-head-section>Imie</x-table.paragraph-head-section>
                    <x-table.paragraph-head-section>Nazwisko</x-table.paragraph-head-section>
                    <x-table.paragraph-head-section>Miejscowość</x-table.paragraph-head-section>
                    <x-table.paragraph-head-section>Status</x-table.paragraph-head-section>
                    <x-table.paragraph-head-section>Numer Telefonu</x-table.paragraph-head-section>
                    <x-table.paragraph-head-section>Typ Klienta</x-table.paragraph-head-section>
                    <x-table.paragraph-head-section>Nazwa Firmy</x-table.paragraph-head-section>
                    <x-table.ahref-head-section :href="route('clients.create')">Dodaj Klienta</x-table.ahref-head-section>
                </tr>
            </thead>

            @foreach($clients as $client)
                <tbody>
                    <tr>
                        <x-table.ahref-body-section :href="route('clients.show', $client->id)">{{ $client->name}}</x-table.ahref-body-section>
                        <x-table.paragraph-body-section>{{ $client->lastname }}</x-table.paragraph-body-section>
                        <x-table.paragraph-body-section>{{ $client->city }}</x-table.paragraph-body-section>
                        <x-table.paragraph-body-section>{{ $client->status }}</x-table.paragraph-body-section>
                        <x-table.paragraph-body-section>{{ $client->formatPhoneNumber() }}</x-table.paragraph-body-section>
                        <x-table.paragraph-body-section>{{ $client->type_of_client->translate() }}</x-table.paragraph-body-section>
                        <x-table.paragraph-body-section>
                            @if($client->name_of_company === null) Brak Danych
                            @else {{ $client->name_of_company }}
                            @endif
                        </x-table.paragraph-body-section>

                        <x-table.edit-button :href="route('clients.edit', $client->id)">Edycja</x-table.edit-button>
                        <x-table.delete-button :action="route('clients.destroy', $client->id)">Usuń</x-table.delete-button>
                    </tr>
                </tbody>
            @endforeach
        </x-table.layout>
        <div class="mt-6">
            {{ $clients->links() }}
        </div>
    </section>
</x-nav.layout>


