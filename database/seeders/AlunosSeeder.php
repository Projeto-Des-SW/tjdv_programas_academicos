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
            'cpf' => "656.032.798-18",
            'curso' => "BCC",
            'semestre_entrada' => "2018.2"
        ]);

        $aluno1->user()->create([
            'name' => "Victor Francisco",
            'email' => "victor@gmail.com",
            'password' =>  Hash::make('12345678')
        ])->givePermissionTo('aluno');

        $aluno2 = Aluno::create([
            'cpf' => "954.960.878-64",
            'curso' => "BCC",
            'semestre_entrada' => "2019.1"
        ]);

        $aluno2->user()->create([
            'name' => "Luiz Davi",
            'email' => "davi@gmail.com",
            'password' =>  Hash::make('12345678')
        ])->givePermissionTo('aluno');

        $aluno3 = Aluno::create([
            'cpf' => "986.985.088-04",
            'curso' => "BCC",
            'semestre_entrada' => "2019.1"
        ]);

        $aluno3->user()->create([
            'name' => "Thiago Cavalcanti",
            'email' => "thiago@gmail.com",
            'password' =>  Hash::make('12345678')
        ])->givePermissionTo('aluno');

        $aluno4 = Aluno::create([
            'cpf' => "519.690.528-64",
            'curso' => "BCC",
            'semestre_entrada' => "2018.1"
        ]);

        $aluno4->user()->create([
            'name' => "Jackson Lima",
            'email' => "jack@gmail.com",
            'password' =>  Hash::make('12345678')
        ])->givePermissionTo('aluno');
    }
}
