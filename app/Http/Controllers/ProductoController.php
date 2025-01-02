<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Pest\Laravel\delete;

class ProductoController extends Controller
{
    //
    public function index()
    {
        //version sin paginacion consulta
        //$productos = Producto::where('user_id', Auth::id())->get();

        //con paginacion
        //$productos = Producto::paginate(5);
        $productos = Producto::where('user_id', Auth::id())->paginate(5); // 5 productos por página
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
        $producto = Producto::where('id', $id)->first();
        return view('productos.show', compact('producto'));

        //otra opcion de show        
        // $producto = Producto::findOrFail($id);
        // return view('productos.show', compact('producto'));
    }

    public function edit($id)
    {
        $producto = Producto::findORFail($id);
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        // Lógica para actualizar
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
        $producto = Producto::findOrFail($id);

        $producto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'cantidad' => $request->cantidad
        ]);

        return redirect()->route('productos.index');
    }

    public function destroy($id)
    {
        // Lógica para eliminar
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('productos.index');
    }
}
