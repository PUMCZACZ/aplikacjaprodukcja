@props(['name'])

<div class="px-4 bg-gray-50 w-1/2 border-0 border-l-2 border-b-2 border-r-2">
    <label class="text-lg">{{ $slot }}</label>

    <input class="flex border-2 border-black rounded mt-2"
           name="{{ $name }}"
           id="{{ $name }}}"
        {{ $attributes(['value' => old($name)]) }}
    >

    <x-form.error name="{{ $name }}"/>
</div>
