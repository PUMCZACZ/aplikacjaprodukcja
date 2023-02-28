<x-nav.layout>
    <div class="flex">
        <x-admin.index-view value="{{ $setting->netto_price }}">Cena Netto</x-admin.index-view>
        <x-admin.index-view name="brutto_price">Cena Brutto</x-admin.index-view>
    </div>
    <div class="flex">
        <x-admin.index-view name="bag_price">Cena Za Worek</x-admin.index-view>
        <x-admin.index-view value="{{ $setting->bag_packing_cost_price }}">Cena Pakowania Worka</x-admin.index-view>
    </div>
    <div class="flex">
        <x-admin.index-view name="bigbag_price">Cena Za Big-Baga</x-admin.index-view>
        <x-admin.index-view value="{{ $setting->bigbag_packing_cost_price }}">Cena Pakowania Big-Baga</x-admin.index-view>
    </div>
    <div class="flex">
        <x-admin.index-view name="loose_price">Cena Luzu</x-admin.index-view>
        <x-admin.index-view value="{{ $setting->loose_packing_cost_price }}">Cena Pakowania Luzu</x-admin.index-view>
    </div>
    <div class="flex justify-center">
        <a class="text-lg text-white bg-blue-500 hover:bg-blue-600 mt-2 px-8 py-1 rounded-xl"
                href="/admin/create"
        >Edytuj</a>
    </div>
</x-nav.layout>
