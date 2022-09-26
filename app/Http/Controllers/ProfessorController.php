<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professors = Professor::all();
        return view("professores.index", compact('professors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("professores.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), Professor::$rules, Professor::$messages)->validateWithBag('create');
        $params = $request->except(array('_token'));
        if (Professor::create($params)) {
            return redirect(route("professores.index"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function show(Professor $professor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function edit(Professor $professor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $professor = Professor::find($request->id);
        
        $rules = Professor::$rules;
        $rules['cpf'] = [
            'bail', 'required', 'formato_cpf', 'cpf',
            Rule::unique('professors')->ignore($professor->id)
        ];
        $rules['siape'] = [
            'bail', 'required', 'min:7', 'max:7',
            Rule::unique('professors')->ignore($professor->id)
        ];

        Validator::make($request->all(), $rules, Professor::$messages)->validateWithBag('update');
        
        $professor->nome = $request->nome;
        $professor->cpf = $request->cpf;
        $professor->siape = $request->siape;
        if ($professor->save()) {
            return redirect(route("professores.index"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->only(['id']);

        if (Professor::destroy($id)) {
            return redirect(route("professores.index"));
        }
    }
}
