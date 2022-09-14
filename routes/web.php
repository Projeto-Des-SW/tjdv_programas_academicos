<?php

use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\AlunoController;
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
Route::resource('/alunos', AlunoController::class)->only([
    "create", "index", "store"
]);
Route::post('/alunos/update', [AlunoController::class, 'update'])->name("alunos.update");
Route::delete('/alunos/destroy', [AlunoController::class, 'destroy'])->name("alunos.destroy");

// Rotas de servidor
// Criar e armazenar
Route::get('/servidores/new', 'App\Http\Controllers\ServidorController@create');
Route::post('/servidores/new', 'App\Http\Controllers\ServidorController@store')->name('cadastrar_servidor');
// Visualizar
Route::get('/servidores/index', 'App\Http\Controllers\ServidorController@index');
Route::get('/servidores/show/{id}', 'App\Http\Controllers\ServidorController@show');
// Editar e atualizar
Route::get('/servidores/edit/{id}', 'App\Http\Controllers\ServidorController@edit');
Route::post('/servidores/edit/{id}', 'App\Http\Controllers\ServidorController@update')->name('editar_servidor');

Route::resource('/professores', ProfessorController::class)->only([
    "create", "index", "store"
]);
Route::post('/professor/update', [ProfessorController::class, 'update'])->name("professor.update");
Route::delete('/professores/destroy', [ProfessorController::class, 'destroy'])->name("professores.destroy");

// Route::get("/professors", [ProfessorController::class, "index"])->name("professors.index");
