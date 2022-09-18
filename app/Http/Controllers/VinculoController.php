<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\Aluno;
use App\Models\Vinculo;
use Illuminate\Http\Request;

class VinculoController extends Controller
{

    public function index(Request $request)
    {
        $professors = Professor::all();
        $alunos = Aluno::all();

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
                $programa = strtoupper($programa);
                $query->where("vinculos.bolsa", "LIKE", "%{$search}%");
            }
        })->get();

        return view("vinculos.index", compact('vinculos', 'professors', 'alunos'));
    }

    public function create(Request $request)
    {
        dd("FALTA FAZER");
    }


    public function store(Request $request)
    {
        //
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
