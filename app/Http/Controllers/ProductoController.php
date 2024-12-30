<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    //
    public function index()
    {
        return view('productos.index');
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
