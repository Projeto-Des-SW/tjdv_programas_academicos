<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVinculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vinculos', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['VIGOR', 'FINALIZADA'])->default('VIGOR')->nullable(false);
            $table->enum('bolsa', ['REMUNERADA', 'VOLUNTARIA'])->nullable(false);
            $table->float('valor_bolsa')->nullable();
            $table->enum('programa', ['PAV', 'BIA', 'MONITORIA', 'TUTORIA'])->nullable(false);
            $table->string("disciplina")->nullable();
            $table->string("relatorio")->nullable();
            $table->string("curso")->nullable();
            $table->string("semestre")->nullable(false);
            $table->date("data_inicio")->nullable(false);
            $table->date("data_fim")->nullable(false);
            $table->timestamps();
        });

        Schema::table('vinculos', function ($table) {
            $table->foreignId('aluno_id')->constrained('alunos');
            $table->foreignId('professor_id')->constrained('professors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vinculos');
    }
}
