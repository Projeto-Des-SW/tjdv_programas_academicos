@extends("templates.app")

@section("body")
  <div class="container">
    <h1><strong>Servidores</strong></h1>
    <a type="button" data-bs-toggle="modal" data-bs-target="#modalCreate">
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
          <div class="listing-card">
            <div class="container">
              <div class="row justify-content-md-center">
                <div class="col informacoes">
                  <a type="button" class="ver" style="text-decoration: none; color: black;" onclick="exibirModalVer({{$servidor}}, {{$servidor->user}})">
                    <label class="labelIndex">{{$servidor->user->name}}</label>
                    <hr class="labelIndex">
                    <label class="labelIndex">Setor: {{$servidor->setor}} </label>
                  </a>
                  @include("servidores.components.modal_show")
                </div>
                <div class="col opcoes">
                  <a type="button" class="edit" onclick="exibirModalEditar({{$servidor}})">
                    <img src="{{asset("images/editar.png")}}" class="option-button" alt="Editar servidor">
                  </a>
                  <a type="button" class="delete" onclick="exibirModalDelete({{$servidor}})">
                    <img src="{{asset("images/excluir.png")}}" class="option-button" alt="Excluir servidor">
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        @foreach ($servidores as $servidor)
          @include("servidores.components.modal_edit", ['servidor' => $servidor])
        @endforeach

        @include("servidores.components.modal_show")
        @include("servidores.components.modal_delete")
        @include("servidores.components.modal_edit")
      </div>
    @endif
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
  <script type="text/javascript">

    function exibirModalEditar(servidor){
      $('#modal_edit_' + servidor.id).modal('show');
    }

    let id_delete = $('#id_delete');
    function exibirModalDelete(servidor){
      id_delete.val(servidor.id)
      $('#modalDelete').modal('show');
    }

    let nome_ver = $('#nome_ver');
    let cpf_ver = $('#cpf_ver');
    let setor_ver = $('#setor_ver');
    let email_ver = $('#email_ver');

    function exibirModalVer(servidor, user){
      nome_ver.text(user.name);
      cpf_ver.text(servidor.cpf);
      setor_ver.text(servidor.setor);
      email_ver.text(user.email);
      $('#modalShow').modal('show');
    }
  </script>

 @if(count($errors->create) > 0)
  <script type="text/javascript">
    $(function () {
      $("#modalCreate").modal('show');
    });
  </script>
  @endif

  @if(count($errors->update) > 0)
  <script type="text/javascript">
    $(function () {
      $("#modal_edit_{{old( 'id' )}}").modal({backdrop:"static", keyboard:false});
      $("#modal_edit_{{old( 'id' )}}").modal('show');
    });
  </script>
  @endif
  
 @endsection
 