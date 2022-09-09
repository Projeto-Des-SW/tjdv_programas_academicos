@extends("templates.app")

@section("body")
  @extends("templates.componentes.header")
  <h1><strong>Professores</strong></h1>
  <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" style="text-align: left">
    <img src="{{asset("images/add-icon.png")}}" class="add-button" alt="Adicionar Professor"/>
  </a>

  @include("professores.componentes.modal_create")

  @if (sizeof($users) == 0)
    <div class="empty">
      <p>
        Não há professores Cadastrados
      </p>
    </div>
  @else
    <div id="list">
      @foreach ($users as $user)
        <div class="listing-card">
          <div class="row">
            <div class="col-sm- 9 col-md-4 informacoes">
              <p>
                {{$user->nome}} - {{$user->siape}}
              </p>
              <p>
                {{$user->cpf}}
              </p>
            </div>
            <div class="col-sm- 3 col-md-2 opcoes">
              <img src="{{asset("images/editar.png")}}" class="add-button" alt="Adicionar Professor">
              <img src="{{asset("images/excluir.png")}}" class="add-button" alt="Adicionar Professor" >
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endif
  

@endsection
