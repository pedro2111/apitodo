<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarefa;
use Illuminate\Contracts\Validation\Validators;
use DB;

date_default_timezone_set('America/Sao_Paulo');

class TarefaController extends Controller {

    public function index() {
        return Tarefa::orderBy('id', 'desc')->get();
    }

    public function store(Request $request) {
        $request->validate([
            'id_sistema' => 'required',
            'id_cat' => 'required',
            'nome' => 'required | max:255',
            'descricao' => 'required',
            'status' => 'required'
        ]);

        $tarefas = Tarefa::create([
                    'id_sistema' => $request->input('id_sistema'),
                    'id_cat' => $request->input('id_cat'),
                    'nome' => $request->input('nome'),
                    'descricao' => $request->input('descricao'),
                    'status' => $request->input('status'),
        ]);
        return $tarefas;
    }

    public function getById($tarefaId) {
        $tarefa = Tarefa::find($tarefaId);
        return $tarefa;
    }

    public function update(Request $request, $id) {
        $tarefa = Tarefa::find($id);
        $tarefa->id_sistema = $request->input('id_sistema');
        $tarefa->id_cat = $request->input('id_cat');
        $tarefa->nome = $request->input('nome');
        $tarefa->descricao = $request->input('descricao');
        $tarefa->status = $request->input('status');
        $tarefa->save();

        return $tarefa;
    }

    public function delete($id) {
        $tarefa = Tarefa::find($id);
        $tarefa->delete();

        return $tarefa;
    }

    public function done($id) {
        $tarefa = Tarefa::find($id);
        $tarefa->status = 1;
        $tarefa->save();

        return $tarefa;
    }

    public function getDone() {
        $tarefa = Tarefa::where('status', 1)
                ->orderBy('id', 'desc')
                ->get();

        return $tarefa;
    }

    public function getSearch($descricao) {
        if ($descricao) {
            $tarefa = DB::table('tarefa')
                    ->select(DB::raw("*"))
                    ->where('descricao', 'like', '%' . $descricao . '%')
                    ->orderBy('id', 'desc')
                    ->get();
        } else {
            $tarefa = null;
        }

        return $tarefa;
    }
    public function getTarefaSistema(){
        $TarefaSistema = DB::table('tarefa')
                ->join('sistema', 'tarefa.id_sistema', '=', 'sistema.id')
                ->select('sistema.nome as sistema','tarefa.nome','tarefa.descricao','tarefa.status','tarefa.created_at')
                ->orderBy('tarefa.created_at','desc')
                ->get();
        
        return $TarefaSistema;
    }
   

}
