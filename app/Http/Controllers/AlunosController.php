<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunosController extends Controller
{
    public function create() {
        return view('alunos.create');
    }

    public function store(Request $request){
        Aluno::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'senha' => $request->senha,
            'curso' => $request->curso,
            'semestre_entrada' => $request->semestre_entrada,
        ]);
        return "Aluno criado com Sucesso!";
    }
}
