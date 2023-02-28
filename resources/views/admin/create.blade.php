<x-nav.layout>
    <form method="POST" action="/admin/create">
        @csrf
        <div class="flex">
            <x-admin.create-view name="netto_price">Cena Netto</x-admin.create-view>
            <x-admin.create-view name="brutto_price">Cena Brutto</x-admin.create-view>
        </div>
        <div class="flex">
            <x-admin.create-view name="bag_price">Cena Za Worek</x-admin.create-view>
            <x-admin.create-view name="bag_packing_cost_price">Cena Pakowania Worka</x-admin.create-view>
        </div>
        <div class="flex">
            <x-admin.create-view name="bigbag_price">Cena Za Big-Baga</x-admin.create-view>
            <x-admin.create-view name="bigbag_packing_cost_price">Cena Pakowania Big-Baga</x-admin.create-view>
        </div>
        <div class="flex">
            <x-admin.create-view name="loose_price">Cena Luzu</x-admin.create-view>
            <x-admin.create-view name="loose_packing_cost_price">Cena Pakowania Luzu</x-admin.create-view>
        </div>
        <div class="flex justify-center">
            <button class="text-lg text-white bg-blue-500 hover:bg-blue-600 mt-2 px-8 py-1 rounded-xl">Zapisz</button>
        </div>
    </form>
</x-nav.layout>
