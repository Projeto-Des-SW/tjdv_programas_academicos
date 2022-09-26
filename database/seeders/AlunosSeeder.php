<?php

namespace Database\Seeders;

use App\Models\Aluno;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AlunosSeeder extends Seeder
{

    public function run()
    {
        $aluno1 = Aluno::create([
            'nome' => "Victor Francisco",
            'cpf' => "12345678978",
            'curso' => "BCC",
            'semestre_entrada' => "2018.2"
        ]);

        $aluno1->user()->create([
            'name' => $aluno1->nome,
            'email' => "victor@gmail.com",
            'password' => Hash::make('123456')
        ]);

        $aluno2 = Aluno::create([
            'nome' => "Luiz Davi",
            'cpf' => "12345678977",
            'curso' => "BCC",
            'semestre_entrada' => "2019.1"
        ]);

        $aluno2->user()->create([
            'name' => $aluno2->nome,
            'email' => "davi@gmail.com",
            'password' => Hash::make('123456')
        ]);

        $aluno3 = Aluno::create([
            'nome' => "Thiago Silva",
            'cpf' => "12345678976",
            'curso' => "BCC",
            'semestre_entrada' => "2019.1"
        ]);

        $aluno3->user()->create([
            'name' => $aluno3->nome,
            'email' => "thiago@gmail.com",
            'password' => Hash::make('123456')
        ]);

        $aluno4 = Aluno::create([
            'nome' => "Jackson Lima",
            'cpf' => "12345678975",
            'curso' => "BCC",
            'semestre_entrada' => "2018.1"
        ]);

        $aluno4->user()->create([
            'name' => $aluno4->nome,
            'email' => "jack@gmail.com",
            'password' => Hash::make('123456')
        ]);
    }
}
