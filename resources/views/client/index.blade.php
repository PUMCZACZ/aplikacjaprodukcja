<x-nav.layout>
    <section class="py-8 max-w-7xl mx-auto">
        <x-table.layout>
            <thead>
                <tr>
                    <x-table.paragraph-head-section>Imie</x-table.paragraph-head-section>
                    <x-table.paragraph-head-section>Nazwisko</x-table.paragraph-head-section>
                    <x-table.paragraph-head-section>Miejscowość</x-table.paragraph-head-section>
                    <x-table.paragraph-head-section>Status</x-table.paragraph-head-section>
                    <x-table.ahref-head-section :href="route('client/create')">Dodaj Klienta</x-table.ahref-head-section>
                </tr>
            </thead>

            @foreach($clients as $client)
                <tbody>
                <tr class="clickable-row" data-href="/client/show/{{ $client->id }}">
                    <x-table.ahref-body-section href="/client/show/{{ $client->id }}">{{ $client->name}}</x-table.ahref-body-section>
                    <x-table.paragraph-body-section>{{ $client->lastname }}</x-table.paragraph-body-section>
                    <x-table.paragraph-body-section>{{ $client->city }}</x-table.paragraph-body-section>
                    <x-table.paragraph-body-section>{{ $client->status }}</x-table.paragraph-body-section>
                    <x-table.edit-button href="/client/{{ $client->id }}/edit">Edycja</x-table.edit-button>
                    <x-table.delete-button action="/client/delete/{{ $client->id }}">Usuń</x-table.delete-button>
                </tr>
                </tbody>
            @endforeach
        </x-table.layout>
    </section>
</x-nav.layout>

<script>
jQuery(document).ready(function($) {
$(".clickable-row").click(function() {
window.location = $(this).data("href");
});
});
</script>

