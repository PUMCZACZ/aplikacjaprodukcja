<x-nav.layout>
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




    </x-table.layout>
</x-nav.layout>

