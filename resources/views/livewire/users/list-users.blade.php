<x-table.table>
    <x-table.thead>
        <x-table.tr>
            <x-table.th>Nome</x-table.th>
            <x-table.th>E-mail</x-table.th>
            <x-table.th>Nível</x-table.th>
        </x-table.tr>
    </x-table.thead>

    <x-table.tbody>
        @forelse ($users as $user)
            <x-table.tr>
                <x-table.td>{{ $user->name }}</x-table.td>
                <x-table.td>{{ $user->email }}</x-table.td>
                <x-table.td>{{ ucfirst(optional($user->role)->name ?? '-') }}</x-table.td>

                <x-table.td class="flex gap-2">
                <x-button variant="primary" size="md" :icon="'heroicon-o-pencil'">
                    Editar
                </x-button>
                <x-button variant="danger" size="md">
                    Excluir
                </x-button>
            </x-table.td>


            </x-table.tr>
        @empty
            <x-table.tr>
                <x-table.td colspan="3" class="text-center text-gray-400">
                    Nenhum usuário encontrado.
                </x-table.td>
            </x-table.tr>
        @endforelse
    </x-table.tbody>
</x-table.table>
