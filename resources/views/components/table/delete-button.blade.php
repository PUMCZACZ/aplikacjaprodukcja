<td class="pr-4 text-right text-sm font-medium">
    <form method="POST" {{ $attributes }}>
        @csrf
        @method('DELETE')
        <button class="text-white bg-red-400 px-2 py-1 rounded-xl">{{ $slot }}</button>
    </form>
</td>
