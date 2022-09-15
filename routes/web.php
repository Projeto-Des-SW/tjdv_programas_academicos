<?php

use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\ServidorController;
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

// Rotas de aluno
// Criar e armazenar
Route::get('/alunos/new', 'App\Http\Controllers\AlunoController@create');
Route::post('/alunos/new', 'App\Http\Controllers\AlunoController@store')->name('cadastrar_aluno');
// Visualizar
Route::get('/alunos/show/{id}', 'App\Http\Controllers\AlunoController@show');
Route::get('/alunos/index', 'App\Http\Controllers\AlunoController@index');
// Editar e atualizar
Route::get('/alunos/edit/{id}', 'App\Http\Controllers\AlunoController@edit');
Route::post('/alunos/edit/{id}', 'App\Http\Controllers\AlunoController@update')->name('editar_aluno');
// Remover
Route::get('/alunos/delete/{id}', 'App\Http\Controllers\AlunoController@delete');
Route::post('/alunos/delete/{id}', 'App\Http\Controllers\AlunoController@destroy')->name('excluir_aluno');

// Rotas de servidor
Route::resource('/servidores', ServidorController::class)->only([
    "create", "index", "store"
]);
Route::post('/servidor/update', [ServidorController::class, 'update'])->name("servidor.update");
Route::delete('/servidores/destroy', [ServidorController::class, 'destroy'])->name("servidores.destroy");

Route::resource('/professores', ProfessorController::class)->only([
    "create", "index", "store"
]);
Route::post('/professores/ajaxEditar', [ProfessorController::class, 'ajaxEditar'])->name('professores_ajaxEditar');
Route::post('/professor/update', [ProfessorController::class, 'update'])->name("professor.update");
Route::delete('/professores/destroy', [ProfessorController::class, 'destroy'])->name("professores.destroy");

// Route::get("/professors", [ProfessorController::class, "index"])->name("professors.index");
