<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Servidor extends Model
{
    protected $fillable = [
        'nome',
        'cpf'
    ];

    public function user(){
        return $this->morphOne(User::class, "typage");
    }

    public static $rules = [
        'nome' => 'bail|required|min:10|max:100|regex:/^[a-zA-Z\']+(?:\s[a-zA-Z\']+)+$/',
        'cpf' => 'bail|required|formato_cpf|cpf|unique:servidors|unique:alunos'
    ];

    public static $messages = [
        'nome.required' => 'Nome é obrigatório',
        'nome.min' => 'Nome deve possuir pelo menos 10 caracteres',
        'nome.max' => 'Nome deve possuir no máximo 100 caracteres',
        'nome.regex' => 'Nome deve conter apenas letras',
        'cpf.required' => 'CPF é obrigatório',
        'cpf.formato_cpf' => 'Padrão deve ser 999.999.999-99',
        'cpf.cpf' => 'CPF inválido',
        'cpf.unique' => 'CPF já cadastrado',
    ];

}
