<div>
<div class="max-w-6xl mx-auto p-6 space-y-6">

    {{-- Botão Novo Usuário --}}
    <div class="flex justify-end">
        <a href="{{ route('users.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-semibold">
            Novo Usuário
        </a>
    </div>

    {{-- Tabela de Usuários --}}
    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse bg-zinc-900 text-white rounded-md overflow-hidden">
            <thead class="bg-zinc-800">
                <tr>
                    <th class="px-4 py-2 text-left">Nome</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Perfil</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-t border-zinc-700 hover:bg-zinc-800">
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">{{ ucfirst(optional($user->role)->name ?? '-') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

</div>
