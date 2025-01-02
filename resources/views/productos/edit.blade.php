<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Producto
        </h2>

        <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md mt-10">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Actualizar Producto</h2>
            <form action="{{ route('productos.update', $producto->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <!-- Nombre del Producto -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Producto</label>
                    <input type="text" id="name" name="nombre" 
                        value="{{ old('nombre') ?? $producto->nombre }}"
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                        placeholder="Ejemplo: Laptop Dell" required>
                    @error('nombre')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Descripción -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                    <textarea id="description" name="descripcion" rows="4"
                        class="mt-1 block w-full rounded-md border-gray-300  shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        placeholder="Ejemplo: Descripción detallada del producto..." required>{{ old('descripcion') ?? $producto->descripcion }}</textarea>
                    @error('descripcion')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Precio -->
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Precio</label>
                    <input type="number" id="price" name="precio" step="0.01"
                        value="{{ old('precio') ?? $producto->precio }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        placeholder="Ejemplo: 199.99" required>
                    @error('precio')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Cantidad -->
                <div class="mb-4">
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Cantidad</label>
                    <input type="number" id="quantity" name="cantidad" step="1" min="1"
                        value="{{ old('cantidad') ?? $producto->cantidad }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        placeholder="Ejemplo: 10" required
                        oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                    @error('cantidad')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Botón de Enviar -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Actualizar Producto
                    </button>
                </div>
            </form>
        </div>
        
    </x-slot>
</x-app-layout>
