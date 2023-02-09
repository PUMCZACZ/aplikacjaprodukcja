<x-nav.layout>
    <section class="py-8 max-w-7xl mx-auto">
        <x-table.layout>
            <thead>
                <tr>
                    <x-table.paragraph-head-section>Imie</x-table.paragraph-head-section>
                    <x-table.paragraph-head-section>Nazwisko</x-table.paragraph-head-section>
                    <x-table.paragraph-head-section>Typ Klienta</x-table.paragraph-head-section>
                    <x-table.paragraph-head-section>Data Ostatniego Zakuup</x-table.paragraph-head-section>
                    <x-table.paragraph-head-section>Status</x-table.paragraph-head-section>
                    <x-table.ahref-head-section :href="route('client/create')">Dodaj Klienta</x-table.ahref-head-section>
                </tr>
            </thead>

            @foreach($clients as $client)
                <tbody>

                    <x-table.body-section>{{ $client->name}}</x-table.body-section>
                    <x-table.body-section>{{ $client->lastname }}</x-table.body-section>
                    <x-table.body-section>{{ $client->type_of_client }}</x-table.body-section>
                    <x-table.body-section>{{ $client->name }}</x-table.body-section>
                    <x-table.body-section>{{ $client->comments}}</x-table.body-section>


                    <x-table.add-buton>Dodaj</x-table.add-buton>
                    <x-table.edit-button>Edycja</x-table.edit-button>
                    <x-table.delete-button>Usuń</x-table.delete-button>
                </tbody>
            @endforeach

        </x-table.layout>
    </section>
</x-nav.layout>

