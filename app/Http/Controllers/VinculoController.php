<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\Aluno;
use App\Models\Vinculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VinculoController extends Controller
{

    public function index(Request $request)
    {
        if (auth()->user()->typage_type == "App\Models\Servidor") {
            $professors = Professor::all();
            $alunos = Aluno::all();
            for ($i = 0; $i < count($alunos); $i++) {
                $vinculosDoAluno = $alunos[$i]->vinculos;
                foreach ($vinculosDoAluno as $vinculo) {
                    if ($vinculo->status == "VIGOR" and $vinculo->bolsa == "REMUNERADA") {
                        $alunos[$i]['proibido'] = true; //variável que vai indicar que aluno está proibido de ter outro vinculo remunerado
                        break;
                    }
                }
            }

            $search = $request->search;
            $programa = $request->programa;

            $vinculos = Vinculo::join("alunos", "vinculos.aluno_id", "=", "alunos.id")->join("professors", "vinculos.professor_id", "=", "professors.id");
            $vinculos = $vinculos->where(function ($query) use ($search, $programa) {
                if ($search) {
                    $query->where("alunos.nome", "LIKE", "%{$search}%");
                    $query->orWhere("alunos.cpf", "LIKE", "%{$search}%");
                    $query->orWhere("professors.nome", "LIKE", "%{$search}%");
                    $query->orWhere("professors.cpf", "LIKE", "%{$search}%");
                    $query->orWhere("professors.siape", "LIKE", "%{$search}%");
                    $query->orWhere("professors.siape", "LIKE", "%{$search}%");
                    $query->orWhere("vinculos.bolsa", "LIKE", "%{$search}%");
                }

                if ($programa) {
                    $query->where("vinculos.programa", "=", "{$search}");
                }
            })->orderBy('vinculos.created_at', 'desc')->select("vinculos.*")->get();

            return view("vinculos.index", compact('vinculos', 'professors', 'alunos', 'search'));
        } else if (auth()->user()->typage_type == "App\Models\Aluno") {
            $vinculos = auth()->user()->typage->vinculos;
            $professors = [];
            $alunos = [];
            $search = $request->search;
            return view("vinculos.index", compact('vinculos', 'professors', 'alunos', 'search'));
        }
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

        if ($vinculo) {
            return redirect(route("vinculos.index"));
        }
    }

    public function update(Request $request)
    {
        $validacao = $request->validate(
            [
                'id' => ['required'],
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

        $vinculo = Vinculo::find($request->id);
        $vinculo->aluno_id = $request->alunos;
        $vinculo->professor_id = $request->professores;
        $vinculo->programa = $request->programa;
        $vinculo->semestre = $request->semestre;
        $vinculo->bolsa = $request->bolsa;
        $vinculo->valor_bolsa = $request->input('valor-bolsa');
        $vinculo->curso = $request->curso;
        $vinculo->disciplina = $request->disciplina;
        $vinculo->data_inicio = $request->input('data-inicio');
        $vinculo->data_fim = $request->input('data-fim');

        $vinculo->update();

        return redirect(route("vinculos.index"));
    }

    public function destroy(Request $request)
    {
        $id = $request->id;

        if (Vinculo::destroy($id)) {
            return redirect(route("vinculos.index"));
        }
    }
}
