<?php

namespace App\Http\Controllers;

use App\Models\Servidor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ServidorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servidores = Servidor::all();
        return view("servidores.index", compact('servidores'));
    }

    public function create() {
        return view('servidores.create');
    }

    public function store(Request $request){

        $usuario = new User();
        $usuario->name = $request->input('nome');
        $usuario->email = $request->input('email');
        $usuario->password = Hash::make($request->input('senha'));
        $usuario->tipo_usuario = 'servidor';
        $usuario->status = 'ativo';
        $usuario->save();

        $servidor = new Servidor();
        $servidor->nome = $request->input('nome');
        $servidor->cpf = $request->input('cpf');
        $servidor->id_user = $usuario->id;
        $servidor->save();

        return "Servidor cadastrado com sucesso!";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servidor  $servidor
     * @return \Illuminate\Http\Response
     */
    public function show(Servidor $servidor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servidor  $servidor
     * @return \Illuminate\Http\Response
     */
    public function edit(Servidor $servidor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servidor  $servidor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servidor $servidor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servidor  $servidor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servidor $servidor)
    {
        //
    }
}
