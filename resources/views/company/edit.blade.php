@php
    /**
     * @var App\Models\Company $company
     */
@endphp

<x-nav.layout>
    <section class="py-8 max-w-4xl mx-auto">
        <h1 class="text-lg font-bold mb-8 pb-2 border-b">
            Szczegóły Firmy: {{ $company->name_of_company }}
        </h1>
        <div class="flex">
            <main class="flex-1">
                <div class="border border-gray-300 p-6 rounded-xl">
                    <form method="POST" action="{{ route('companies.update', $company->id)}}">
                        @csrf
                        <x-form.input name="name_of_company" :value="old('name_of_company', $company->name_of_company)">
                            Nazwa Firmy
                        </x-form.input>
                        <x-form.field>
                            <x-form.label>Tag</x-form.label>
                            <select name="tag"
                                    class="bg-gray-50 border border-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                                @foreach(\App\CompanyTagEnum::cases() as $tag)
                                    <option value="{{ $tag->value }}">{{ $tag->translate() }}</option>
                                @endforeach
                            </select>
                        </x-form.field>
                        <x-form.input name="phone_number" :value="old('phone_number', $company->phone_number)">Numer Telefonu</x-form.input>

                        <x-form.button>Zaktualizuj Dane</x-form.button>
                    </form>
                </div>
            </main>
        </div>
    </section>
</x-nav.layout>
