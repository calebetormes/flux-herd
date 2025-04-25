<div>
<form wire:submit.prevent="salvar" class="space-y-4 max-w-lg mx-auto p-4 bg-zinc-900 border border-zinc-700 rounded-xl">

    <x-input
        label="Nome"
        placeholder="Nome completo"
        wire:model="name"
    />

    <x-input
        label="Email"
        type="email"
        placeholder="email@exemplo.com"
        wire:model="email"
    />

    <x-input
        label="Senha"
        type="password"
        placeholder="Senha de acesso"
        wire:model="password"
    />

    <x-select
        label="Nível de Acesso"
        placeholder="Selecione..."
        wire:model="role_id"
        :options="\App\Models\Role::pluck('name', 'id')" 
    />

    <x-button type="submit" class="w-full justify-center">
        Salvar
    </x-button>

    @if (session()->has('success'))
        <div class="text-green-500 text-sm mt-2">
            {{ session('success') }}
        </div>
    @endif

</form>


</div>
