<?php

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

Route::get('/alunos/novo', 'App\Http\Controllers\AlunosController@create');
Route::post('/alunos/novo', 'App\Http\Controllers\AlunosController@store')->name('cadastrar_aluno');
