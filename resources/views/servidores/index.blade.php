@extends("templates.app")

@section("body")
  <div class="container">
    <h1><strong>Servidores</strong></h1>
    <a type="button" data-bs-toggle="modal" data-bs-target="#modal_create">
      <img src="{{asset("images/add-icon.png")}}" class="add-button" alt="Adicionar servidor">
    </a>
  
    @include("servidores.components.modal_create")
  
    @if (sizeof($servidores) == 0)
      <div class="empty">
        <p>
          Não há servidores cadastrados
        </p>
      </div>
    @else
      <div id="list">
        @foreach ($servidores as $servidor)
          <div class="row justify-content-md-center listing-card">
            <div class="col-md-6 col-lg-6 informacoes">
              <a type="button" class="ver" style="text-decoration: none; color: black;" onclick="exibirModalVisualizar({{$servidor->id}})">
                <label class="labelIndex">{{$servidor->user->name}}</label>
                <hr class="labelIndex">
                <label class="labelIndex">Setor: {{$servidor->setor}}</label>
              </a>
            </div>
            <div class="col-md-4 col-lg-4 opcoes">
              <a type="button" class="edit" onclick="exibirModalEditar({{$servidor->id}})">
                <img src="{{asset("images/editar.png")}}" class="option-button" alt="Editar servidor">
              </a>
              <a type="button" class="delete" onclick="exibirModalDeletar({{$servidor->id}})">
                <img src="{{asset("images/excluir.png")}}" class="option-button" alt="Excluir servidor">
              </a>
            </div>
          </div>
        @endforeach
        @foreach ($servidores as $servidor)
          @include("servidores.components.modal_edit", ['servidor' => $servidor])
          @include("servidores.components.modal_show")
          @include("servidores.components.modal_delete")
        @endforeach
      </div>
    @endif
  </div>
  
  <script type="text/javascript">

    function exibirModalEditar(id){
      $('#modal_edit_' + id).modal('show');
    }

    function exibirModalDeletar(id){
      $('#modal_delete_' + id).modal('show');
    }

    function exibirModalVisualizar(id){
      $('#modal_show_' + id).modal('show');
    }
  </script>

 <!-- Exibindo erros de validacao ao criar -->
 @if(count($errors->create) > 0)
  <script type="text/javascript">
    $(function () {
      // Bloqueando o usuario na tela de modal apos falha na validacao.
      // Forcando ele a clicar no botao de fechar, para limpar os erros
      $("#modal_create").modal({backdrop:"static", keyboard:false});
      $("#modal_create").modal('show');
    });
  </script>
  @endif

  <!-- Exibindo erros de validacao ao editar -->
  @if(count($errors->update) > 0)
  <script type="text/javascript">
    $(function () {
      // Bloqueando o usuario na tela de modal apos falha na validacao.
      // Forcando ele a clicar no botao de fechar, para limpar os erros
      $("#modal_edit_{{old( 'id' )}}").modal({backdrop:"static", keyboard:false});
      $("#modal_edit_{{old( 'id' )}}").modal('show');
    });
  </script>
  @endif
  
 @endsection
 