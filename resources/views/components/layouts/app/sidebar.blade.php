<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Platform')" class="grid">
                    
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </flux:navlist.item>

                    <flux:navlist.item icon="clipboard-document" :href="route('welcome')" :current="request()->routeIs('welcome')" wire:navigate>
                        {{ __('Início') }}    
                    </flux:navlist.item>

                    <flux:navlist.item icon="circle-help" :href="route('instrucoes')" :current="request()->routeIs('instrucoes')" wire:navigate>
                        {{ __('Instruções') }}
                    </flux:navlist.item>


                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            <flux:navlist variant="outline">
                <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                {{ __('Repository') }}
                </flux:navlist.item>

                <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits" target="_blank">
                {{ __('Documentation') }}
                </flux:navlist.item>
            </flux:navlist>

            <!-- Desktop User Menu -->
            <flux:dropdown position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <!-- Exibe as informações do usuário logado, como iniciais, nome e e-mail -->
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <!-- Avatar do usuário com as iniciais -->
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }} <!-- Iniciais do usuário -->
                                    </span>
                                </span>

                                <!-- Informações do usuário: nome e e-mail -->
                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span> <!-- Nome do usuário -->
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span> <!-- E-mail do usuário -->
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />
                    <!-- Separador visual entre os grupos de menus -->

                    <flux:menu.radio.group>
                        <!-- Link para a página de configurações do perfil -->
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>
                            {{ __('Settings') }} <!-- Texto do menu: Configurações -->
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />
                    <!-- Outro separador visual -->

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf <!-- Token CSRF para segurança no logout -->
                        <!-- Botão para logout -->
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }} <!-- Texto do botão: Sair -->
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <!-- Exibe as informações do usuário logado, como iniciais, nome e e-mail -->
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <!-- Avatar do usuário com as iniciais -->
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }} <!-- Iniciais do usuário -->
                                    </span>
                                </span>

                                <!-- Informações do usuário: nome e e-mail -->
                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span> <!-- Nome do usuário -->
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span> <!-- E-mail do usuário -->
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />
                    <!-- Separador visual entre os grupos de menus -->

                    <flux:menu.radio.group>
                        <!-- Link para a página de configurações do perfil -->
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>
                            {{ __('Settings') }} <!-- Texto do menu: Configurações -->
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />
                    <!-- Outro separador visual -->

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf <!-- Token CSRF para segurança no logout -->
                        <!-- Botão para logout -->
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }} <!-- Texto do botão: Sair -->
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
