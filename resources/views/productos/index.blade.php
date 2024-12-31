<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Productos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>BIENVENIDO, AQUI VERAS TODOS TUS PRODUCTOS</h3>
                </div>
                <div>
                    <table class="table-auto w-full mt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Nombre</th>
                                <th class="px-4 py-2">Descripcion</th>
                                <th class="px-4 py-2">Precio</th>
                                <th class="px-4 py-2">Cantidad</th>
                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($productos as $product)
                                <tr>
                                    <td class="border px-4 py-2">{{$product->nombre}}</td>
                                    <td class="border px-4 py-2">{{$product->descripcion}}</td>
                                    <td class="border px-4 py-2">{{$product->precio}}</td>
                                    <td class="border px-4 py-2">{{$product->cantidad}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center py-4" colspan="4">No tienes productos guardados</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
