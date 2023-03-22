@php
/**
* @var \App\Models\Transport $transport
*/
@endphp
<x-nav.layout>
    <x-table.layout>
        <thead>
            <tr>
                <x-table.paragraph-head-section>Nazwa Firmy</x-table.paragraph-head-section>
                <x-table.paragraph-head-section>Typ Produktu</x-table.paragraph-head-section>
                <x-table.paragraph-head-section>Ilość</x-table.paragraph-head-section>
                <x-table.paragraph-head-section>Cena</x-table.paragraph-head-section>
                <x-table.paragraph-head-section>Data Dostarczenia</x-table.paragraph-head-section>
                <x-table.paragraph-head-section>Status</x-table.paragraph-head-section>
                <x-table.ahref-head-section :href="route('transports.create')">Dodaj Transport</x-table.ahref-head-section>
            </tr>
        </thead>
        <tbody>
        @foreach($transports as $transport)
            <x-table.paragraph-body-section>{{ $transport->name_of_company }}</x-table.paragraph-body-section>
            <x-table.paragraph-body-section>{{ $transport->type_of_product }}</x-table.paragraph-body-section>
            <x-table.paragraph-body-section>{{ $transport->product_amount }}</x-table.paragraph-body-section>
            <x-table.paragraph-body-section>{{ $transport->product_price }}</x-table.paragraph-body-section>
            <x-table.paragraph-body-section>{{ $transport->delivered_at }}</x-table.paragraph-body-section>
            <x-table.paragraph-body-section>{{ $transport->completed_at }}</x-table.paragraph-body-section>

            <x-table.edit-button :href="route('transports.edit', $transport->id)">Edycja</x-table.edit-button>
            <x-table.delete-button :action="route('transports.destroy', $transport->id)">Usuń</x-table.delete-button>
        @endforeach
        </tbody>
    </x-table.layout>
</x-nav.layout>

