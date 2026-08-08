<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Lista de Unidades') }}
            </h2>
            <a href="{{ route('unidades.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm transition">
                + Nueva Unidad
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código / Placa</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo de Unidad</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Marca / Modelo</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estatus</th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($unidades as $unidad)
                            <tr>
                                <td class="px-4 py-3 whitespace-nowrap">{{ $unidad->codigo }}</td>
                                <td class="px-4 py-3 whitespace-nowrap">{{ $unidad->tipo }}</td>
                                <td class="px-4 py-3 whitespace-nowrap">{{ $unidad->modelo }}</td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $unidad->estatus }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-center text-sm font-medium space-x-2">
                                    <!-- Enlace para Editar -->
<a href="{{ route('unidades.edit', $unidad) }}" class="text-blue-600 hover:underline mr-2">Editar</a>

<!-- Formulario para Eliminar -->
<form action="{{ route('unidades.destroy', $unidad) }}" method="POST" class="inline" onsubmit="return confirm('¿Deseas eliminar esta unidad?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-red-600 hover:underline border-none bg-transparent cursor-pointer">
        Eliminar
    </button>
</form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                                    No hay unidades registradas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>