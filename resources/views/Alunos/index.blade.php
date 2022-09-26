@extends("templates.app")

@section("body")
  <div class="container">
    <h1><strong>Alunos</strong></h1>
    <a type="button" data-bs-toggle="modal" data-bs-target="#modal_create">
      <img src="{{asset("images/add-icon.png")}}" class="add-button" alt="Adicionar aluno">
    </a>

    @include("alunos.components.modal_create")
  
    @if (sizeof($aluno) == 0)
      <div class="empty">
        <p>
          Não há alunos cadastrados
        </p>
      </div>
    @else
      <div id="list">
      @foreach ($aluno as $aluno)
          <div class="row justify-content-md-center listing-card">
            <div class="col-md-8 col-lg-8 informacoes">
              <a type="button" class="ver" style="text-decoration: none; color: black;" onclick="exibirModalVisualizar({{$aluno->id}})">
                <label class="labelIndex">{{$aluno->user->name}}</label>
                <hr class="labelIndex">
                <label class="labelIndex">Curso: {{$aluno->curso}}</label>
              </a>
            </div>
            <div class="col-md-3 col-lg-3 opcoes">
              <a type="button" class="edit" onclick="exibirModalEditar({{$aluno}}, {{$aluno->user}})">
                <img src="{{asset("images/editar.png")}}" class="option-button" alt="Editar aluno">
              </a>
              <a type="button" class="delete" onclick="exibirModalDelete({{$aluno}})">
                <img src="{{asset("images/excluir.png")}}" class="option-button" alt="Excluir aluno">
              </a>
            </div>
          </div>
          <br>
        @include("alunos.components.modal_show")
        @include("alunos.components.modal_delete")
        @include("alunos.components.modal_edit")
      @endforeach
      </div>
    @endif
  </div>

  <script type="text/javascript">
    //Editar aluno
    let nome_edit = $('#nome_edit');
    let cpf_edit = $('#cpf_edit');
    let email_edit = $('#email_edit');
    let curso_edit = $('#curso_edit');
    let semestre_entrada_edit = $('#semestre_entrada_edit');
    let id_edit = $('#id_edit');

    function exibirModalEditar(aluno, user){
      nome_edit.val(aluno.nome);
      cpf_edit.val(aluno.cpf);
      email_edit.val(user.email);
      curso_edit.val(aluno.curso);
      semestre_entrada_edit.val(aluno.semestre_entrada);
      id_edit.val(aluno.id)
      $('#editModal').modal('show');
    }

    //Deletar aluno
    let id_delete = $('#id_delete');
    function exibirModalDelete(aluno){
      id_delete.val(aluno.id)
      $('#deleteModal').modal('show');
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

  @endsection
