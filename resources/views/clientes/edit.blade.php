<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ✂️ Editar Cliente
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

                <form method="POST" action="{{ route('clientes.update', $cliente) }}">
                    @csrf
                    @method('PATCH')
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm text-gray-600 mb-1">Nombre *</label>
                            <input type="text" name="nombre" value="{{ old('nombre', $cliente->nombre) }}"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 mb-1">Apellido *</label>
                            <input type="text" name="apellido" value="{{ old('apellido', $cliente->apellido) }}"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 mb-1">Teléfono *</label>
                            <input type="text" name="telefono" value="{{ old('telefono', $cliente->telefono) }}"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 mb-1">Email</label>
                            <input type="email" name="email" value="{{ old('email', $cliente->email) }}"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 mb-1">Tipo de cabello</label>
                            <select name="tipo_cabello"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
                                <option value="">— Seleccionar —</option>
                                <option value="liso" {{ $cliente->tipo_cabello == 'liso' ? 'selected' : '' }}>Liso</option>
                                <option value="ondulado" {{ $cliente->tipo_cabello == 'ondulado' ? 'selected' : '' }}>Ondulado</option>
                                <option value="rizado" {{ $cliente->tipo_cabello == 'rizado' ? 'selected' : '' }}>Rizado</option>
                                <option value="afro" {{ $cliente->tipo_cabello == 'afro' ? 'selected' : '' }}>Afro</option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label class="block text-sm text-gray-600 mb-1">Notas</label>
                            <textarea name="notas" rows="3"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400">{{ old('notas', $cliente->notas) }}</textarea>
                        </div>
                    </div>

                    <div class="flex justify-between mt-6">
                        <a href="{{ route('clientes.index') }}"
                           class="text-gray-500 hover:underline text-sm">← Cancelar</a>
                        <button type="submit"
                            class="bg-gray-800 text-white px-6 py-2 rounded-lg text-sm hover:bg-gray-700">
                            Actualizar Cliente
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>