@props(['hover' => true])

<tr {{ $attributes->merge([
    'class' => ($hover ? 'hover:bg-zinc-800 transition' : '') . ' border-t border-zinc-700'
]) }}>
    {{ $slot }}
</tr>
