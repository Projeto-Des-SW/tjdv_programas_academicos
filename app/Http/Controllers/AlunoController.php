<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Aluno;
use App\Models\User;

class AlunoController extends Controller
{
    public function store(Request $request){

        $aluno = Aluno::create([
            'nome' => $request->input('nome'),
            'cpf' => $request->input('cpf'),
            'curso' => $request->input('curso'),
            'semestre_entrada' => $request->input('semestre_entrada')
        ]);

        $aluno->user()->create([
            'name' => $aluno->nome,
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ])->givePermissionTo('aluno');

        return redirect(route("alunos.index"));
    }

    public function update(Request $request) {
        $aluno = Aluno::find($request->id_edit);

        $aluno->nome = $request->nome_edit;
        $aluno->cpf = $request->cpf_edit;
        $aluno->curso = $request->curso_edit;
        $aluno->semestre_entrada = $request->semestre_entrada_edit;

        
        $aluno->user->name = $aluno->nome;
        $aluno->user->email = $request->email_edit;
        $aluno->user->password = Hash::make($request->senha_edit);

        if ($aluno->save() && $aluno->user->save()){
            return redirect(route("alunos.index"));
        }
    }

    public function delete($id) {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.delete', ['aluno' => $aluno]);
    }

    public function destroy(Request $request) {
        $id = $request->only(['id_delete']);
        $aluno = Aluno::findOrFail($id)->first();

        if ($aluno->user->delete() && $aluno->delete()) {
            return redirect(route("alunos.index"));
        }
    }

    public function index() {
        $aluno = Aluno::all();
        return view("alunos.index", ['aluno' => $aluno]);
    }

}
