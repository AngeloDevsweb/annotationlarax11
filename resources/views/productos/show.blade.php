<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalles de Producto
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-8">
                    <h4 class="font-semibold text-2xl">Nombre de producto: {{$producto->nombre}}</h4>
                    <p class="font-light text-lg">{{$producto->descripcion}}</p>
                    <p class="text-lg">Precio: {{$producto->precio}} $.</p>
                    <p class="text-lg">Cantidad: {{$producto->cantidad}} U.</p>
                    <!-- Botón de Enviar -->
                    <div class="flex justify-end">
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" id="delete-form">
                            @csrf
                            @method('DELETE')
                            <button id="delete-button" type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Eliminar Producto
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Script para la ventana de confirmación -->
    <script>
        document.getElementById('delete-button').addEventListener('click', function (event) {
            event.preventDefault(); // Evita que el formulario se envíe automáticamente
            const confirmation = confirm('¿Estás seguro de que deseas eliminar este producto?');
            if (confirmation) {
                document.getElementById('delete-form').submit(); // Envía el formulario si el usuario confirma
            }
        });
    </script>
</x-app-layout>
