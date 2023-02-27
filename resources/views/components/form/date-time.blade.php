@props(['name'])

<div
    x-data
    x-init="flatpickr($refs.datetimewidget, {wrap: true, enableTime: true, dateFormat: 'M j, Y h:i K'});"
    x-ref="datetimewidget"
    class="flatpickr container mx-auto col-span-6 sm:col-span-6 mt-5"
>
    <label for="{{ $name }}" class="flex-grow  block font-medium text-sm text-gray-700 mb-1">{{ $slot }}</label>
    <div class="flex align-middle align-content-center">
        <input
            x-ref="datetime"
            type="text"
            id="{{ $name }}"
            name="{{ $name }}"
            data-input
            placeholder="Wybierz.."
            class="block w-full px-2 border border-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        >
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/themes/airbnb.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
