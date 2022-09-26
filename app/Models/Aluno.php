<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Aluno extends Model
{
    protected $fillable = [
        'cpf',
        'curso',
        'semestre_entrada',
    ];

    public function user()
    {
        return $this->morphOne(User::class, "typage");
    }

    public function vinculos()
    {
        return $this->hasMany(Vinculo::class);
    }

    public static $rules = [
        'cpf' => 'bail|required|formato_cpf|cpf|unique:servidors|unique:alunos',
        'curso' => 'bail|required|max:50',
        'semestre_entrada' => 'bail|required|min:6|max:6',
    ];

    public static $messages = [
        'cpf.required' => 'CPF é obrigatório',
        'cpf.formato_cpf' => 'Padrão deve ser 999.999.999-99',
        'cpf.cpf' => 'CPF inválido',
        'cpf.unique' => 'CPF já cadastrado',
        'curso.required' => 'Curso é obrigatório',
        'curso.max' => 'Curso deve possuir no máximo 50 caracteres',
        'semestre_entrada.required' => 'Semestre de entrada é obrigatório',
        'semestre_entrada.max' => 'Semestre de entrada deve possuir 6 caracteres',
    ];
}
