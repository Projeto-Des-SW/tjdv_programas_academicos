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
            'cpf' => "12345678978",
            'curso' => "BCC",
            'semestre_entrada' => "2018.2"
        ]);

        $aluno1->user()->create([
            'name' => "Victor Francisco",
            'email' => "victor@gmail.com",
            'password' => Hash::make('123456')
        ]);

        $aluno2 = Aluno::create([
            'cpf' => "12345678977",
            'curso' => "BCC",
            'semestre_entrada' => "2019.1"
        ]);

        $aluno2->user()->create([
            'name' => "Luiz Davi",
            'email' => "davi@gmail.com",
            'password' => Hash::make('123456')
        ]);

        $aluno3 = Aluno::create([
            'cpf' => "12345678976",
            'curso' => "BCC",
            'semestre_entrada' => "2019.1"
        ]);

        $aluno3->user()->create([
            'name' => "Thiago Silva",
            'email' => "thiago@gmail.com",
            'password' => Hash::make('123456')
        ]);

        $aluno4 = Aluno::create([
            'cpf' => "12345678975",
            'curso' => "BCC",
            'semestre_entrada' => "2018.1"
        ]);

        $aluno4->user()->create([
            'name' => "Jackson Lima",
            'email' => "jack@gmail.com",
            'password' => Hash::make('123456')
        ]);
    }
}
