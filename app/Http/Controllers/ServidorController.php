<?php

namespace App\Http\Controllers;

use App\Models\Servidor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServidorController extends Controller
{

    public function index()
    {
        $servidores = Servidor::all();
        return view("servidores.index", compact('servidores'));
    }

    public function store(Request $request){

        Validator::make($request->all(), Servidor::$rules, Servidor::$messages)->validate();
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

    public function update(Request $request)
    {
        $servidor = Servidor::find($request->id_edit);
        $servidor->nome = $request->nome_edit;
        $servidor->cpf = $request->cpf_edit;

        $servidor->user->name = $servidor->nome;
        $servidor->user->email = $request->email_edit;
        $servidor->user->password = Hash::make($request->password_edit);

        if ($servidor->save() && $servidor->user->save()) {
            return redirect(route("servidores.index"));
        }
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