<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $fillable = ['id_sistema', 'id_cat', 'nome','descricao','status'];
    
    protected $table = 'tarefa';
}
