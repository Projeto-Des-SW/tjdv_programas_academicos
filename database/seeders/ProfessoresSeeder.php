<?php

namespace Database\Seeders;

use App\Models\Professor;
use Illuminate\Database\Seeder;

class ProfessoresSeeder extends Seeder
{
    public function run()
    {
        Professor::create([
            'nome' => 'Rodrigo Gusmão',
            'email' => "luizd4398@gmal.com",
            'cpf' => '996.889.168-11',
            'siape' => '1234567'
        ]);

        Professor::create([
            'nome' => 'Marcius',
            'email' => "aaaa@gmal.com",
            'cpf' => '017.197.098-58',
            'siape' => '1234566'
        ]);

        Professor::create([
            'nome' => 'Thais Burity',
            'email' => "bbbbb@gmal.com",
            'cpf' => '699.493.378-44',
            'siape' => '1234565'
        ]);

        Professor::create([
            'nome' => 'Ícaro Lins',
            'email' => "ccccc@gmal.com",
            'cpf' => '107.409.038-10',
            'siape' => '1234564'
        ]);

        Professor::create([
            'nome' => 'Jean Carlos',
            'email' => "asssss@gmal.com",
            'cpf' => '910.096.198-10',
            'siape' => '1234563'
        ]);
    }
}
