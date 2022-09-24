<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Servidor extends Model
{
    protected $fillable = [
        'cpf',
        'setor'
    ];

    public function user(){
        return $this->morphOne(User::class, "typage");
    }

    public static $rules = [
        'cpf' => 'bail|required|formato_cpf|cpf|unique:servidors|unique:alunos',
        'setor' => 'bail|required|max:100',
    ];

    public static $messages = [
        'cpf.required' => 'CPF é obrigatório',
        'cpf.formato_cpf' => 'Padrão deve ser 999.999.999-99',
        'cpf.cpf' => 'CPF inválido',
        'cpf.unique' => 'CPF já cadastrado',
        'setor.required' => 'Setor é obrigatório',
        'setor.max' => 'Setor deve possuir no máximo 100 caracteres',
    ];

}
