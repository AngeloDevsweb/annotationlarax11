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
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:1',
            'cantidad' =>'required|integer|min:1'
        ],[
            'cantidad.required' => 'La cantidad es obligatoria.',
            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'cantidad.min' => 'La cantidad no puede ser menor que 1.',
        ]
        );
        //crear producto asociado al usuario
        Producto::create([
            'user_id'=>Auth::id(),
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'cantidad' => $request->cantidad,
        ]);

        //redireccionamos
        return redirect()->route('productos.index')->with('success', 'Producto creado con exito');
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
