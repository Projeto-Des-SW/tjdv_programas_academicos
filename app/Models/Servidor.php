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

    public function retornar_usuario($id_user){
        $user = User::where('id', '=', $id_user)->firstOrFail();
        return $user;
    }
}
