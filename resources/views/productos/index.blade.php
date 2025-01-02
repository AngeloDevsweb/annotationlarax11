<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Productos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                        <p class="font-bold">¡Éxito!</p>
                        <p>{{ session('success') }}</p>
                    </div>
                @endif
                <div class="pt-6">
                    <a href="{{ route('productos.create') }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded mx-4">Agregar Nuevo</a>
                    <table class="table-auto w-full mt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Nombre</th>
                                <th class="px-4 py-2">Descripcion</th>
                                <th class="px-4 py-2">Precio</th>
                                <th class="px-4 py-2">Cantidad</th>
                                <th class="px-4 py-2">Ver</th>
                                <th class="px-4 py-2">Actualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($productos as $product)
                                <tr>
                                    <td class="border px-4 py-2">{{ $product->nombre }}</td>
                                    <td class="border px-4 py-2">{{ $product->descripcion }}</td>
                                    <td class="border px-4 py-2">{{ $product->precio }}</td>
                                    <td class="border px-4 py-2">{{ $product->cantidad }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('productos.show', $product->id) }}"><ion-icon name="desktop"></ion-icon></a>
                                    </td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('productos.edit', $product->id) }}"><ion-icon name="create"></ion-icon></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center py-4" colspan="4">No tienes productos guardados</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- Paginación -->
                    <div class="mt-4 p-5">
                        {{ $productos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
