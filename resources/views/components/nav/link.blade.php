@props(['active'])

<a
    @class([
        'hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium',
        'bg-gray-900 text-white' => $active,
        'text-gray-300' => !$active
]) {{$attributes}}> {{$slot}}</a>
