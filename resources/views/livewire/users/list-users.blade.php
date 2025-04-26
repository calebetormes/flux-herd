<x-table>
    <thead class="bg-zinc-800 text-xs uppercase text-zinc-400 font-semibold tracking-wider">
        <x-table.row hover="false">
            <x-table.cell>Nome</x-table.cell>
            <x-table.cell>Email</x-table.cell>
            <x-table.cell>Perfil</x-table.cell>
        </x-table.row>
    </thead>

    <tbody class="divide-y divide-zinc-700">
        @forelse ($users as $user)
            <x-table.row>
                <x-table.cell>{{ $user->name }}</x-table.cell>
                <x-table.cell>{{ $user->email }}</x-table.cell>
                <x-table.cell>{{ ucfirst(optional($user->role)->name ?? '-') }}</x-table.cell>
            </x-table.row>
        @empty
            <x-table.row>
                <x-table.cell colspan="3" class="text-center text-zinc-400">
                    Nenhum usuário encontrado.
                </x-table.cell>
            </x-table.row>
        @endforelse
        
    </tbody>

</x-table>
