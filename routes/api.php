<?php

use Illuminate\Http\Request;

Route::get("tarefa", "TarefaController@index");
Route::get("tarefa/{id}", "TarefaController@getById");
Route::patch("tarefa/{id}", "TarefaController@update");
Route::get("tarefa/done/{id}", "TarefaController@done");
Route::get("tarefadone", "TarefaController@getDone");
Route::post("tarefa", "TarefaController@store");
Route::delete("tarefa/{id}", "TarefaController@delete");


Route::get("sistema", "SistemaController@index");
Route::get("sistema/{id}", "SistemaController@getById");
Route::patch("sistema/{id}", "SistemaController@update");
Route::post("sistema", "SistemaController@store");
Route::delete("sistema/{id}", "SistemaController@delete");

Route::get("categoria", "CategoriaController@index");
Route::get("categoria/{id}", "CategoriaController@getById");
Route::patch("categoria/{id}", "CategoriaController@update");
Route::post("categoria", "CategoriaController@store");
Route::delete("categoria/{id}", "CategoriaController@delete");