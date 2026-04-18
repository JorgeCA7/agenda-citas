<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            📅 Editar Cita
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-xl p-6">

                @if($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg text-sm">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('citas.update', $cita) }}">
                    @csrf
                    @method('PATCH')
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <label class="block text-sm text-gray-600 mb-1">Cliente *</label>
                            <select name="cliente_id"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
                                <option value="">— Seleccionar cliente —</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}" {{ $cita->cliente_id == $cliente->id ? 'selected' : '' }}>
                                        {{ $cliente->nombre }} {{ $cliente->apellido }} — {{ $cliente->telefono }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 mb-1">Fecha *</label>
                            <input type="date" name="fecha" value="{{ old('fecha', $cita->fecha) }}"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 mb-1">Hora *</label>
                            <input type="time" name="hora" value="{{ old('hora', $cita->hora) }}"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 mb-1">Servicio *</label>
                            <select name="servicio"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
                                <option value="">— Seleccionar servicio —</option>
                                @foreach(['Corte de cabello','Corte y barba','Barba','Tinte','Corte infantil','Cejas'] as $s)
                                    <option value="{{ $s }}" {{ $cita->servicio == $s ? 'selected' : '' }}>{{ $s }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 mb-1">Estado</label>
                            <select name="estado"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
                                <option value="pendiente" {{ $cita->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="confirmada" {{ $cita->estado == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                                <option value="cancelada" {{ $cita->estado == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 mb-1">Precio</label>
                            <input type="number" name="precio" value="{{ old('precio', $cita->precio) }}" step="0.01"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
                        </div>
                        <div class="col-span-2">
                            <label class="block text-sm text-gray-600 mb-1">Observaciones</label>
                            <textarea name="observaciones" rows="3"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400">{{ old('observaciones', $cita->observaciones) }}</textarea>
                        </div>
                    </div>

                    <div class="flex justify-between mt-6">
                        <a href="{{ route('citas.index') }}"
                           class="text-gray-500 hover:underline text-sm">← Cancelar</a>
                        <button type="submit"
                            class="bg-gray-800 text-white px-6 py-2 rounded-lg text-sm hover:bg-gray-700">
                            Actualizar Cita
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>