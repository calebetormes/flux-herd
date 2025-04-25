<form wire:submit="salvar">
    <div class="space-y-4">

        <x-input
            label="Nome"
            wire:model="name"
            placeholder="Nome completo"
        />

        <x-input
            label="Email"
            type="email"
            wire:model="email"
            placeholder="email@exemplo.com"
        />

        <x-input
            label="Senha"
            type="password"
            wire:model="password"
            placeholder="••••••••"
        />

        <x-select
            label="Nível de acesso"
            wire:model="role_id"
            :options="\App\Models\Role::pluck('name', 'id')->toArray()"
        />

        <x-button type="submit">
            Salvar Usuário
        </x-button>

        @if (session()->has('success'))
            <div class="text-green-600 text-sm mt-2">
                {{ session('success') }}
            </div>
        @endif
    </div>
</form>

@code
use App\Models\User;
use Illuminate\Support\Facades\Hash;

public string $name = '';
public string $email = '';
public string $password = '';
public int $role_id = 3; // ID default para 'user', pode ajustar conforme seu banco

function salvar()
{
    User::create([
        'name' => $this->name,
        'email' => $this->email,
        'password' => Hash::make($this->password),
        'role_id' => $this->role_id,
    ]);

    $this->reset();
    session()->flash('success', 'Usuário cadastrado com sucesso!');
}
@endcode
