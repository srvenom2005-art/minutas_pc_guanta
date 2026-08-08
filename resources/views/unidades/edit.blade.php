<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Editar Unidad') }}
            </h2>
            <a href="{{ route('unidades.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded text-sm transition">
                Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('unidades.update', $unidad) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Código / Placa -->
                        <div>
                            <x-input-label for="codigo" :value="__('Código / Placa')" />
                            <x-text-input id="codigo" class="block mt-1 w-full" type="text" name="codigo" :value="old('codigo', $unidad->codigo)" required autofocus />
                            <x-input-error :messages="$errors->get('codigo')" class="mt-2" />
                        </div>

                        <!-- Tipo de Unidad -->
                        <div>
                            <x-input-label for="tipo" :value="__('Tipo de Unidad')" />
                            <x-text-input id="tipo" class="block mt-1 w-full" type="text" name="tipo" :value="old('tipo', $unidad->tipo)" required />
                            <x-input-error :messages="$errors->get('tipo')" class="mt-2" />
                        </div>

                        <!-- Marca / Modelo -->
                        <div>
                            <x-input-label for="modelo" :value="__('Marca / Modelo')" />
                            <x-text-input id="modelo" class="block mt-1 w-full" type="text" name="modelo" :value="old('modelo', $unidad->modelo)" required />
                            <x-input-error :messages="$errors->get('modelo')" class="mt-2" />
                        </div>

                        <!-- Estatus -->
                        <div>
                            <x-input-label for="estatus" :value="__('Estatus')" />
                            <select id="estatus" name="estatus" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>
                                <option value="Operativa" {{ old('estatus', $unidad->estatus) == 'Operativa' ? 'selected' : '' }}>Operativa</option>
                                <option value="Inoperativa" {{ old('estatus', $unidad->estatus) == 'Inoperativa' ? 'selected' : '' }}>Inoperativa</option>
                                <option value="En Mantenimiento" {{ old('estatus', $unidad->estatus) == 'En Mantenimiento' ? 'selected' : '' }}>En Mantenimiento</option>
                            </select>
                            <x-input-error :messages="$errors->get('estatus')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <x-primary-button class="ms-4">
                            {{ __('Actualizar Unidad') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>