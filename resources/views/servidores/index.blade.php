@extends("templates.app")

@section("body")
  <div class="container">
    <h1><strong>Servidores</strong></h1>
  
    @if (sizeof($servidores) == 0)
      <div class="empty">
        <p>
          Não há servidores cadastrados
        </p>
      </div>
    @else
      <div id="list">
        @foreach ($servidores as $servidor)
          <p>
            Nome: {{$servidor->nome}}
          </p>
          <p>
            E-mail: {{$servidor->retornar_usuario($servidor->id_user)->email}}
          </p>
          <p>
            ID: {{$servidor->id}}
          </p>
          <br>
        @endforeach
      </div>
    @endif
  </div>

  @endsection
