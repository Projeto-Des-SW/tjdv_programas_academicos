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
Route::get('/alunos/new', 'App\Http\Controllers\AlunosController@create');
Route::post('/alunos/new', 'App\Http\Controllers\AlunosController@store')->name('cadastrar_aluno');
//Visualizar
Route::get('/alunos/show/{id}', 'App\Http\Controllers\AlunosController@show');
//Editar e atualizar
Route::get('/alunos/edit/{id}', 'App\Http\Controllers\AlunosController@edit');
Route::post('/alunos/edit/{id}', 'App\Http\Controllers\AlunosController@update')->name('editar_aluno');
//Remover
Route::get('/alunos/delete/{id}', 'App\Http\Controllers\AlunosController@delete');
Route::post('/alunos/delete/{id}', 'App\Http\Controllers\AlunosController@destroy')->name('excluir_aluno');


Route::resource('/professores', ProfessorController::class)->only([
    "create", "index", "store"
]);

// Route::get("/professors", [ProfessorController::class, "index"])->name("professors.index");
