@props(['class' => ''])

<div {{ $attributes->merge(['class' => "rounded-xl border border-zinc-700 overflow-x-auto shadow-sm $class"]) }}>
    <table class="min-w-full bg-zinc-900 text-sm text-zinc-200">
        {{ $slot }}
    </table>
</div>
