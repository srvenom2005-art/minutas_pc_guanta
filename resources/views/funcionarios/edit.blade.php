<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Funcionario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('funcionarios.update', $funcionario) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Cédula -->
                        <div>
                            <x-input-label for="cedula" :value="__('Cédula')" />
                            <x-text-input id="cedula" class="block mt-1 w-full" type="text" name="cedula" :value="old('cedula', $funcionario->cedula)" required autofocus />
                            <x-input-error :messages="$errors->get('cedula')" class="mt-2" />
                        </div>

                        <!-- Nombre -->
                        <div>
                            <x-input-label for="nombre" :value="__('Nombre')" />
                            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre', $funcionario->nombre)" required />
                            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                        </div>

                        <!-- Apellido -->
                        <div>
                            <x-input-label for="apellido" :value="__('Apellido')" />
                            <x-text-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" :value="old('apellido', $funcionario->apellido)" required />
                            <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
                        </div>

                        <!-- Cargo -->
                        <div>
                            <x-input-label for="cargo" :value="__('Cargo')" />
                            <x-text-input id="cargo" class="block mt-1 w-full" type="text" name="cargo" :value="old('cargo', $funcionario->cargo)" required />
                            <x-input-error :messages="$errors->get('cargo')" class="mt-2" />
                        </div>

                        <!-- Teléfono -->
                        <div>
                            <x-input-label for="telefono" :value="__('Teléfono')" />
                            <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono', $funcionario->telefono)" />
                            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                        </div>

                        <!-- Estatus -->
                        <div>
                            <x-input-label for="estatus" :value="__('Estatus')" />
                            <select id="estatus" name="estatus" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="Activo" {{ old('estatus', $funcionario->estatus) == 'Activo' ? 'selected' : '' }}>Activo</option>
                                <option value="Inactivo" {{ old('estatus', $funcionario->estatus) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                            <x-input-error :messages="$errors->get('estatus')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-6 space-x-3">
                        <a href="{{ route('funcionarios.index') }}" class="text-gray-600 hover:underline text-sm">Cancelar</a>
                        <x-primary-button>
                            {{ __('Actualizar Funcionario') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>