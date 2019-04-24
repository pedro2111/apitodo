<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sistema;
use Illuminate\Contracts\Validation\Validators;
use DB;
date_default_timezone_set('America/Sao_Paulo');

class SistemaController extends Controller
{
    public function index()
    {
        return Sistema::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'=>'required',
        ]);

        $sistemas = Sistema::create([
            'nome' => $request->input('nome')
        ]);
        return $sistemas;
    }

    public function getById($sistemaId)
    {
        $sistema = Sistema::find($sistemaId);
        return $sistema;
    }
    public function update(Request $request, $id)
    {
        $sistema = Sistema::find($id);
        $sistema->nome = $request->input('nome');
        $sistema->save();

        return $sistema;
    }
    public function delete($id){
        $sistema = Sistema::find($id);
        $sistema->delete();

        return $sistema;
    }
     public function getSearchSistema($nome) {
        if ($nome) {
            $sistema = DB::table('sistema')
                    ->select(DB::raw("*"))
                    ->where('nome', 'like', '%' . $nome . '%')
                    ->orderBy('id', 'desc')
                    ->get();
        } else {
            $sistema = null;
        }

        return $sistema;
    }
}
