<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = array('nome', 'cpf', 'siape');

    public static $rules = [
        'nome' => 'bail|required|min:10|max:100|regex:/^[a-zA-Z\']+(?:\s[a-zA-Z\']+)+$/',
        'cpf' => 'bail|required|formato_cpf|cpf|unique:servidors|unique:alunos|unique:professors',
        'siape' => 'bail|required|min:7|max:7|unique:professors',
    ];

    public static $messages = [
        'nome.required' => 'Nome é obrigatório',
        'nome.min' => 'Nome deve possuir no mínimo 10 caracteres',
        'nome.max' => 'Nome deve possuir no máximo 100 caracteres',
        'nome.regex' => 'Nome deve conter apenas letras',
        'cpf.required' => 'CPF é obrigatório',
        'cpf.formato_cpf' => 'Padrão deve ser 999.999.999-99',
        'cpf.cpf' => 'CPF inválido',
        'cpf.unique' => 'CPF já cadastrado',
        'siape.required' => 'Siape é obrigatório',
        'siape.unique' => 'SIAPE já cadastrado',
        'siape.min' => 'Siape deve possuir 7 caracteres',
        'siape.max' => 'Siape deve possuir 7 caracteres'
    ];
}
