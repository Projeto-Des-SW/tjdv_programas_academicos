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
        ]);

        return redirect(route("alunos.index"));
    }

    public function update(Request $request, $id) {
        $aluno = Aluno::findOrFail($id);

        $aluno->update([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'curso' => $request->curso,
            'semestre_entrada' => $request->semestre_entrada,
        ]);
        return "Aluno atualizado com sucesso!";
    }

    public function delete($id) {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.delete', ['aluno' => $aluno]);
    }

    public function destroy(Request $request) {
        $id = $request->only(['id_delete']);

        if (Aluno::destroy($id)) {
            return redirect(route("alunos.index"));
        }
    }

    public function index() {
        $aluno = Aluno::all();
        return view("alunos.index", ['aluno' => $aluno]);
    }

}
