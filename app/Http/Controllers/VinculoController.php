<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class VinculoController extends Controller
{

    public function index()
    {
        $professors = Professor::all();
        return view("vinculos.index", compact('professors'));
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
        dd($request);
    }
}
