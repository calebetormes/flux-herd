@props(['align' => 'left', 'class' => ''])

<td {{ $attributes->merge([
    'class' => "px-6 py-4 whitespace-nowrap text-{$align} $class"
]) }}>
    {{ $slot }}
</td>
