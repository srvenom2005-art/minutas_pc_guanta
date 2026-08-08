<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Tipo de Incidente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('tipos-incidentes.update', $tipo) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Nombre del Incidente</label>
                        <input type="text" name="nombre" value="{{ old('nombre', $tipo->nombre) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        @error('nombre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Descripción</label>
                        <textarea name="descripcion" class="w-full border-gray-300 rounded-md shadow-sm" rows="3">{{ old('descripcion', $tipo->descripcion) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Nivel de Riesgo</label>
                        <select name="nivel_riesgo" class="w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="Bajo" {{ $tipo->nivel_riesgo == 'Bajo' ? 'selected' : '' }}>Bajo</option>
                            <option value="Medio" {{ $tipo->nivel_riesgo == 'Medio' ? 'selected' : '' }}>Medio</option>
                            <option value="Alto" {{ $tipo->nivel_riesgo == 'Alto' ? 'selected' : '' }}>Alto</option>
                            <option value="Crítico" {{ $tipo->nivel_riesgo == 'Crítico' ? 'selected' : '' }}>Crítico</option>
                        </select>
                    </div>

                    <div class="flex justify-end gap-2">
                        <a href="{{ route('tipos-incidentes.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Cancelar</a>
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>