<?php

use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ServidorController;
use App\Http\Controllers\VinculoController;
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
Route::resource('/servidores', ServidorController::class)->only([
    "create", "index", "store"
]);
Route::post('/servidor/update', [ServidorController::class, 'update'])->name("servidor.update");
Route::delete('/servidores/destroy', [ServidorController::class, 'destroy'])->name("servidores.destroy");

Route::resource('/professores', ProfessorController::class)->only([
    "index", "store"
]);
Route::post('/professor/update', [ProfessorController::class, 'update'])->name("professor.update");
Route::delete('/professores/destroy', [ProfessorController::class, 'destroy'])->name("professores.destroy");

Route::resource('/vinculos', VinculoController::class)->only([
    "index", "store"
]);
Route::delete('/vinculos/destroy', [VinculoController::class, 'destroy'])->name("vinculos.destroy");
Route::post('/vinculos/update', [VinculoController::class, 'update'])->name("vinculos.update");

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get("/professors", [ProfessorController::class, "index"])->name("professors.index");
