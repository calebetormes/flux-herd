@props([
    'type' => 'button',
    'variant' => 'primary', // primary, danger
    'size' => 'sm', // sm, md, lg
    'disabled' => false,
])

@php
$variants = [
    'primary' => 'bg-[var(--color-accent)] text-[var(--color-accent-foreground)] hover:bg-[var(--color-accent-content)]',
    'danger' => 'bg-[var(--color-accent)] text-[var(--color-accent-foreground)] hover:bg-red-600',
];

$sizes = [
    'sm' => 'px-3 py-1 text-xs',
    'md' => 'px-4 py-2 text-sm',
    'lg' => 'px-5 py-3 text-base',
];
@endphp

<button
    {{ $attributes->merge([
        'type' => $type,
        'class' => "{$variants[$variant]} {$sizes[$size]} rounded-md font-semibold shadow-sm transition disabled:opacity-50 flex items-center gap-2",
        'disabled' => $disabled,
    ]) }}
>
    {{ $slot }}
</button>
