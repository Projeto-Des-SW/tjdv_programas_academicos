<?php

use App\Http\Controllers\ProfessorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Rotas de autenticacao
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Routes Aluno
//Criar e Armazenar
Route::get('/alunos/new', 'App\Http\Controllers\AlunoController@create');
Route::post('/alunos/new', 'App\Http\Controllers\AlunoController@store')->name('cadastrar_aluno');
//Visualizar
Route::get('/alunos/show/{id}', 'App\Http\Controllers\AlunoController@show');
//Editar e atualizar
Route::get('/alunos/edit/{id}', 'App\Http\Controllers\AlunoController@edit');
Route::post('/alunos/edit/{id}', 'App\Http\Controllers\AlunoController@update')->name('editar_aluno');
//Remover
Route::get('/alunos/delete/{id}', 'App\Http\Controllers\AlunoController@delete');
Route::post('/alunos/delete/{id}', 'App\Http\Controllers\AlunoController@destroy')->name('excluir_aluno');

// Rotas de servidor
// Criar e armazenar
Route::get('/servidores/new', 'App\Http\Controllers\ServidorController@create');
Route::post('/servidores/new', 'App\Http\Controllers\ServidorController@store')->name('cadastrar_servidor');


Route::resource('/professores', ProfessorController::class)->only([
    "create", "index", "store"
]);
Route::post('/professores/ajaxEditar', [ProfessorController::class, 'ajaxEditar'])->name('professores_ajaxEditar');
Route::post('/professor/update', [ProfessorController::class, 'update'])->name("professor.update");
Route::delete('/professores/destroy', [ProfessorController::class, 'destroy'])->name("professores.destroy");

// Route::get("/professors", [ProfessorController::class, "index"])->name("professors.index");
