<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = array('nome', 'cpf', 'siape');

    public function vinculos()
    {
        return $this->hasMany(Vinculo::class);
    }
}
