<?php
namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
{
    // Obtener los productos del usuario autenticado
    $productos = Producto::where('user_id', Auth::id())->get();

    // Preparar los datos para el gráfico
    $nombres = $productos->pluck('nombre'); // Nombres de los productos
    $cantidades = $productos->pluck('cantidad'); // Cantidades de cada producto

    // Pasar datos a la vista
    return view('dashboard', [
        'nombres' => $nombres,
        'cantidades' => $cantidades,
    ]);
}

}

?>