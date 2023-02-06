@props(['name'])

<x-form.field>
    <x-form.label>{{ $name }}</x-form.label>

    <input class="border border-gray-400 p-2 w-full rounded"
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $attributes(['value' => old($name)]) }}
    >

</x-form.field>
