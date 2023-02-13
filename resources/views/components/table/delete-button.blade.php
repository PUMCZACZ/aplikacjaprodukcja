<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
    <form method="POST" {{ $attributes }}>
        @csrf
        @method('DELETE')
        <button class="text-red-400 hover:text-red-600">{{ $slot }}</button>
    </form>
</td>
