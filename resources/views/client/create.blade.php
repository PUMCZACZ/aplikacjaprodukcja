<x-nav.layout>
    <section class="py-8 max-w-4xl mx-auto">
        <h1 class="text-lg font-bold mb-8 pb-2 border-b">
            Sekcja Zarządzania
        </h1>
        <div class="flex">
            <main class="flex-1">
                <div class="border border-gray-300 p-6 rounded-xl">
                    <form method="POST" action="/client/compose">
                        @csrf
                        <x-form.input name="name" required>Imię</x-form.input>
                        <x-form.input name="lastname" required>Nazwisko</x-form.input>
                        <x-form.input name="city" required>Miejscowość</x-form.input>
                        <x-form.input name="status" required>Status</x-form.input>
                        <x-form.button>Dodaj</x-form.button>
                    </form>
                </div>
            </main>
        </div>
    </section>
</x-nav.layout>
