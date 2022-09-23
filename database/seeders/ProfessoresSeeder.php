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
            'cpf' => '12345678978',
            'siape' => '1234567'
        ]);

        Professor::create([
            'nome' => 'Marcius',
            'cpf' => '12345678977',
            'siape' => '1234566'
        ]);

        Professor::create([
            'nome' => 'Thais Buirity',
            'cpf' => '12345678976',
            'siape' => '1234565'
        ]);

        Professor::create([
            'nome' => 'Icaro Lins',
            'cpf' => '12345678975',
            'siape' => '1234564'
        ]);

        Professor::create([
            'nome' => 'Jean Carlos',
            'cpf' => '12345678974',
            'siape' => '1234563'
        ]);
    }
}
