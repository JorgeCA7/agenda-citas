<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                📅 Citas
            </h2>
            <div class="flex gap-3">
                <a href="{{ route('clientes.index') }}"
                   class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm hover:bg-gray-50">
                    👤 Clientes
                </a>
                <a href="{{ route('citas.create') }}"
                   class="bg-gray-800 text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-700">
                    + Nueva Cita
                </a>
            </div>
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
                            <th class="px-6 py-3">Cliente</th>
                            <th class="px-6 py-3">Fecha</th>
                            <th class="px-6 py-3">Hora</th>
                            <th class="px-6 py-3">Servicio</th>
                            <th class="px-6 py-3">Estado</th>
                            <th class="px-6 py-3">Precio</th>
                            <th class="px-6 py-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($citas as $cita)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ $cita->cliente->nombre }} {{ $cita->cliente->apellido }}
                            </td>
                            <td class="px-6 py-4 text-gray-600">
                                {{ \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y') }}
                            </td>
                            <td class="px-6 py-4 text-gray-600">
                                {{ \Carbon\Carbon::parse($cita->hora)->format('h:i A') }}
                            </td>
                            <td class="px-6 py-4 text-gray-600">{{ $cita->servicio }}</td>
                            <td class="px-6 py-4">
                                @if($cita->estado == 'confirmada')
                                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs">Confirmada</span>
                                @elseif($cita->estado == 'cancelada')
                                    <span class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs">Cancelada</span>
                                @else
                                    <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs">Pendiente</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-gray-600">
                                {{ $cita->precio ? '$' . number_format($cita->precio, 2) : '—' }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('citas.edit', $cita) }}"
                                   class="text-blue-600 hover:underline mr-3">Editar</a>
                                <form action="{{ route('citas.destroy', $cita) }}"
                                      method="POST" class="inline"
                                      onsubmit="return confirm('¿Eliminar cita?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-gray-400">
                                No hay citas agendadas aún.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>