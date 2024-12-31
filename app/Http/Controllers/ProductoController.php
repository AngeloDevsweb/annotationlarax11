<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    //
    public function index()
    {
        $productos = Producto::where('user_id', Auth::id())->get();
        return view('productos.index', compact('productos'));;
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        // Lógica para guardar un producto
    }

    public function show($id)
    {
        // Mostrar un producto específico
    }

    public function edit($id)
    {
        return view('productos.edit');
    }

    public function update(Request $request, $id)
    {
        // Lógica para actualizar
    }

    public function destroy($id)
    {
        // Lógica para eliminar
    }
}
