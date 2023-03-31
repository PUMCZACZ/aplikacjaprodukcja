@php
    /**
    * @var \App\Models\Company $company
    */
@endphp
<x-nav.layout>
    <x-table.layout>
        <thead>
        <tr>
            <x-table.paragraph-head-section>Nazwa Firmy</x-table.paragraph-head-section>
            <x-table.paragraph-head-section>Tag</x-table.paragraph-head-section>
            <x-table.paragraph-head-section>Numer Telefonu</x-table.paragraph-head-section>
            <x-table.ahref-head-section :href="route('companies.create')">Dodaj Firme</x-table.ahref-head-section>
        </tr>
        </thead>
        @foreach($companies as $company)

            <tbody>
            <x-table.paragraph-body-section>{{ $company->name_of_company }}</x-table.paragraph-body-section>
            <x-table.paragraph-body-section>{{ $company->tag }}</x-table.paragraph-body-section>
            <x-table.paragraph-body-section>{{ $company->phone_number }}</x-table.paragraph-body-section>

            <x-table.edit-button :href="route('companies.edit', $company->id)">Edycja</x-table.edit-button>
            <x-table.delete-button :action="route('companies.destroy', $company->id)">Usuń</x-table.delete-button>
            </tbody>
        @endforeach
    </x-table.layout>
</x-nav.layout>
