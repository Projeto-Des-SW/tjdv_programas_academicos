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
        $vinculos = Vinculo::all();
        return view("vinculos.index", compact('vinculos', 'professors', 'alunos'));
    }

    public function create (Request $request)
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
