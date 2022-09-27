<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AlunosSeeder::class,
            ProfessoresSeeder::class,
            VinculosSeeder::class,
            PermissionsSeeder::class

        ]);
    }
}
