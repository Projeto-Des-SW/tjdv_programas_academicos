@extends("templates.app")

@section("body")
  <div class="container">
    <h1><strong>Professores</strong></h1>
    <a type="button" data-bs-toggle="modal" data-bs-target="#criarModal">
      <img src="{{asset("images/add-icon.png")}}" class="add-button" alt="Adicionar Professor">
    </a>
  
    @include("professores.componentes.modal_criar")
  
    @if (sizeof($professors) == 0)
      <div class="empty">
        <p>
          Não há professores Cadastrados
        </p>
      </div>
    @else
      <div id="list">
        @foreach ($professors as $professor)
          <div class="row justify-content-md-center listing-card">
            <div class="col-md-6 col-lg-6 informacoes">
              <a type="button" class="ver" style="text-decoration: none; color: black;" onclick="exibirModalVer({{$professor}})">
                <label class="labelIndex">{{$professor->nome}} - {{$professor->siape}}</label>
                <hr class="labelIndex">
                <label class="labelIndex">CPF: {{$professor->cpf}} </label>
              </a>
            </div>
            <div class="col-md-4 col-lg-4 opcoes">
              <a type="button" class="edit" onclick="exibirModalEditar({{$professor}})">
                <img src="{{asset("images/editar.png")}}" class="option-button" alt="Editar Professor">
              </a>
              <a type="button" class="delete" onclick="exibirModalDelete({{$professor}})">
                <img src="{{asset("images/excluir.png")}}" class="option-button" alt="Excluir Professor">
              </a>
            </div>
          </div>
          <br>
        @endforeach
        @include("professores.componentes.modal_ver")
        @include("professores.componentes.modal_delete")
        @include("professores.componentes.modal_edit")
      </div>
    @endif
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
  <script type="text/javascript">
    //editar professor
    let nome_edit = $('#nome_edit');
    let cpf_edit = $('#cpf_edit');
    let siape_edit = $('#siape_edit');
    let id_edit = $('#id_edit');

    function exibirModalEditar(professor){
      nome_edit.val(professor.nome);
      cpf_edit.val(professor.cpf);
      siape_edit.val(professor.siape);
      id_edit.val(professor.id)
      $('#editModal').modal('show');
    }

    let id_delete = $('#id_delete');
    function exibirModalDelete(professor){
      id_delete.val(professor.id)
      $('#deleteModal').modal('show');
    }

    let nome_ver = $('#nome_ver');
    let cpf_ver = $('#cpf_ver');
    let siape_ver = $('#siape_ver');

    function exibirModalVer(professor){
      nome_ver.text(professor.nome);
      cpf_ver.text(professor.cpf);
      siape_ver.text(professor.siape);
      $('#verModal').modal('show');
    }
  </script>
 
 
 @endsection
 