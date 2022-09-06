<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Aluno;
use App\Models\User;

class AlunosController extends Controller
{
    public function create() {
        return view('alunos.create');
    }

    public function store(Request $request){

        $usuario = new User();
        $usuario->name = $request->input('nome');
        $usuario->email = $request->input('email');
        $usuario->password = Hash::make($request->input('senha'));
        $usuario->tipo_usuario = 'aluno';
        $usuario->status = 'ativo';
        $usuario->save();

        $aluno = new Aluno();
        $aluno->nome = $request->input('nome');
        $aluno->curso = $request->input('curso');
        $aluno->semestre_entrada = $request->input('semestre_entrada'); 
        $aluno->cpf = $request->input('cpf');
        $aluno->id_user = $usuario->id;
        $aluno->save();

        return "Aluno criado com Sucesso!";
    }

    public function show($id) {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.show', ['aluno' => $aluno]);
    }

    public function edit($id) {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.edit', ['aluno' => $aluno]);
    }

    public function update(Request $request, $id) {
        $aluno = Aluno::findOrFail($id);

        $aluno->update([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'senha' => $request->senha,
            'curso' => $request->curso,
            'semestre_entrada' => $request->semestre_entrada,
        ]);
        return "Aluno atualizado com Sucesso!";
    }

    public function delete($id) {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.delete', ['aluno' => $aluno]);
    }

    public function destroy($id) {
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();

        return "Aluno excluido com Sucesso";
    }

}
