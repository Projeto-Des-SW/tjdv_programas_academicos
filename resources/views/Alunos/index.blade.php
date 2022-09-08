@extends("templates.app")

@section("body")
  <div class="container">
    <h1><strong>Alunos</strong></h1>
  
    @if (sizeof($aluno) == 0)
      <div class="empty">
        <p>
          Não há alunos cadastrados
        </p>
      </div>
    @else
      <div id="list">
        @foreach ($aluno as $aluno)
          <p>
            Nome: {{$aluno->nome}}
          </p>
         
          <p>
            CPF: {{$aluno->cpf}}
          </p>
          
          <p>
            Curso: {{$aluno->curso}}
          </p>
          
          <p>
            Semestre de entrada: {{$aluno->semestre_entrada}}
          </p>
          <br>
        @endforeach
      </div>
    @endif
  </div>

  @endsection
