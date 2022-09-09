<?php

namespace App\Http\Controllers;

use App\Models\Servidor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ServidorController extends Controller
{

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

    public function show($id)
    {
        $servidor = Servidor::findOrFail($id);
        return view('servidores.show', ['servidor' => $servidor]);
    }

    public function edit($id)
    {
        $servidor = Servidor::findOrFail($id);
        return view('servidores.edit', ['servidor' => $servidor]);
    }

    public function update(Request $request, $id)
    {
        $servidor = Servidor::findOrFail($id);

        $servidor->update([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            // Alterar e-mail e senha de user
        ]);
        return "Servidor atualizado com sucesso!";
    }

    public function destroy(Servidor $servidor)
    {
        //
    }
}
