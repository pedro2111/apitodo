<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Illuminate\Contracts\Validation\Validators;

date_default_timezone_set('America/Sao_Paulo');

class CategoriaController extends Controller
{
    public function index()
    {
        return Categoria::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'=>'required',
        ]);

        $categorias = Categoria::create([
            'nome' => $request->input('nome')
        ]);
        return $categorias;
    }

    public function getById($categoriaId)
    {
        $categoria = Categoria::find($categoriaId);
        return $categoria;
    }
    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        $categoria->nome = $request->input('nome');
        $categoria->save();

        return $categoria;
    }
    public function delete($id){
        $categoria = Categoria::find($id);
        $categoria->delete();

        return $categoria;
    }
}
