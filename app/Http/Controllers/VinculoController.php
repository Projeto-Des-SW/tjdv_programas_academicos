<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\Aluno;
use App\Models\Vinculo;
use Illuminate\Http\Request;

class VinculoController extends Controller
{

    public function index()
    {
        $professors = Professor::all();
        $alunos = Aluno::all();
        for ($i = 0; $i < count($alunos); $i++){
            $vinculosDoAluno = $alunos[$i]->vinculos;
            foreach ($vinculosDoAluno as $vinculo){
                if ($vinculo->status == "VIGOR" and $vinculo->bolsa == "REMUNERADA"){
                    unset($alunos[$i]);
                    break;
                }
            }
        }
        $vinculos = Vinculo::all();
        return view("vinculos.index", compact('vinculos', 'professors', 'alunos'));
    }

    public function store(Request $request)
    {
        $validacao = $request->validate(
            [
                'alunos' => ['required'],
                'professores' => ['required'],
                'programa' => ['required'],
                'semestre' => ['required'],
                'bolsa' => ['required'],
                'valor-bolsa' => ['required_if:bolsa,==,REMUNERADA'],
                'curso' => ['required_if:programa,==,MONITORIA', 'required_if:programa,==,TUTORIA'],
                'disciplina' => ['required_if:programa,==,MONITORIA', 'required_if:programa,==,TUTORIA'],
                'data-inicio' => ['required'],
                'data-fim' => ['required']
            ],
            [
                'required' => 'O campo :attribute é obrigatório.',
                'valor-bolsa.required_if' => 'O campo valor da bolsa é obrigatório.',
                'curso.required_if' => 'O campo curso é obrigatório.'
            ]
        );
        
        $vinculo = Vinculo::Create([
            'bolsa' => $request->input('bolsa'),
            'programa' =>  $request->input('programa'),
            'valor_bolsa' => $request->input('valor-bolsa'),
            'disciplina' => $request->input('disciplina'),
            'curso' => $request->input('curso'),
            'semestre' => $request->input('semestre'),
            'data_inicio' => $request->input('data-inicio'),
            'data_fim' => $request->input('data-fim'),
            'aluno_id' => $request->input('alunos'),
            'professor_id' => $request->input('professores')
        ]);

        if ($vinculo){
            return redirect(route("vinculos.index"));
        }

    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request)
    {
        $id = $request->only(['id_delete']);

        if (Vinculo::destroy($id)) {
            return redirect(route("vinculos.index"));
        }
    }
}
