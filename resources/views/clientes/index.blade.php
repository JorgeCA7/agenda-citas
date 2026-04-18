<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                ✂️ Clientes
            </h2>
            <a href="{{ route('clientes.create') }}"
               class="bg-gray-800 text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-700">
                + Nuevo Cliente
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow rounded-xl overflow-hidden">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-3">Nombre</th>
                            <th class="px-6 py-3">Teléfono</th>
                            <th class="px-6 py-3">Email</th>
                            <th class="px-6 py-3">Tipo Cabello</th>
                            <th class="px-6 py-3">Citas</th>
                            <th class="px-6 py-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($clientes as $cliente)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ $cliente->nombre }} {{ $cliente->apellido }}
                            </td>
                            <td class="px-6 py-4 text-gray-600">{{ $cliente->telefono }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $cliente->email ?? '—' }}</td>
                            <td class="px-6 py-4 text-gray-600 capitalize">{{ $cliente->tipo_cabello ?? '—' }}</td>
                            <td class="px-6 py-4">
                                <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-full text-xs">
                                    {{ $cliente->citas_count }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('clientes.edit', $cliente) }}"
                                   class="text-blue-600 hover:underline mr-3">Editar</a>
                                <form action="{{ route('clientes.destroy', $cliente) }}"
                                      method="POST" class="inline"
                                      onsubmit="return confirm('¿Eliminar cliente?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-400">
                                No hay clientes registrados aún.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>