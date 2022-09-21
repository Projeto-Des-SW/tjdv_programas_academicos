<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'senha',
        'curso',
        'semestre_entrada',
    ];

    public function user(){
        return $this->morphOne(User::class, "typage");
    }
}
