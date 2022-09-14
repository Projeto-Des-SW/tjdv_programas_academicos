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

        $servidor = Servidor::Create([
            'nome' => $request->input('nome'),
            'cpf' => $request->input('cpf')
        ]);

        $servidor->user()->create([
            'name' => $servidor->nome,
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        return redirect(route("servidores.index"));
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
            'cpf' => $request->cpf
        ]);

        $user = $servidor->retornar_usuario($servidor->id_user);
        $user->update([
            'name' => $request->nome,
            'email' => $request->email,
            'password' => $request->senha,
        ]);

        return "Servidor atualizado com sucesso!";
    }

    public function destroy(Request $request)
    {
        $id = $request->only(['id_delete']);
        $servidor = Servidor::find($id)->first();

        if ($servidor->user->delete() && $servidor->delete()) {
            return redirect(route("servidores.index"));
        }
        
    }
}