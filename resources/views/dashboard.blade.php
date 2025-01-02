<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-bold mb-4">Resumen de tus productos</h1>

                <!-- Canvas para el gráfico -->
                <canvas id="productosChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>

    <!-- Script para renderizar el gráfico -->
    <script>
        // Obtener datos desde Blade
        const nombres = @json($nombres);
        const cantidades = @json($cantidades);

        // Configuración del gráfico
        const ctx = document.getElementById('productosChart').getContext('2d');
        const productosChart = new Chart(ctx, {
            type: 'bar', // Tipo de gráfico: barras
            data: {
                labels: nombres, // Etiquetas (nombres de productos)
                datasets: [{
                    label: 'Cantidad de productos',
                    data: cantidades, // Datos (cantidades de productos)
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-app-layout>
