@extends("templates.app")

@section("body")
  @extends("templates.componentes.header")
  <div class="container">
    <h1><strong>Alunos</strong></h1>
    <a type="button" data-bs-toggle="modal" data-bs-target="#criarModal">
      <img src="{{asset("images/add-icon.png")}}" class="add-button" alt="Adicionar Aluno">
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
          <div class="listing-card">
            <div class="container">
              <div class="row justify-content-md-center">
                <div class="col informacoes">
                  <a type="button" class="ver" style="text-decoration: none; color: black;" onclick="exibirModalVer({{$aluno}}, {{$aluno->user}})">
                    <label class="labelIndex">{{$aluno->nome}} - {{$aluno->cpf}} - {{$aluno->email}} {{$aluno->cpf}} {{$aluno->curso}} {{$aluno->semestre_entrada}} </label>
                    <hr class="labelIndex">
                    <label class="labelIndex">CPF: {{$aluno->cpf}} </label>
                  </a>
                  @include("alunos.components.modal_show")
                </div>
                <div class="col opcoes">
                  <a type="button" class="edit" onclick="exibirModalEditar({{$aluno}}, {{$aluno->user}})">
                    <img src="{{asset("images/editar.png")}}" class="option-button" alt="Editar Aluno">
                  </a>
                  <a type="button" class="delete" onclick="exibirModalDelete({{$aluno}})">
                    <img src="{{asset("images/excluir.png")}}" class="option-button" alt="Excluir Aluno">
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        @include("alunos.components.modal_show")
        @include("alunos.components.modal_delete")
        @include("alunos.components.modal_edit")
      </div>
    @endif
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
  <script type="text/javascript">
    //Editar aluno
    let nome_edit = $('#nome_edit');
    let cpf_edit = $('#cpf_edit');
    let email_edit = $('#email_edit');
    let senha_edit = $('#email_edit');
    let curso_edit = $('#curso_edit');
    let semestre_entrada_edit = $('#semestre_entrada_edit');
    let id_edit = $('#id_edit');

    function exibirModalEditar(aluno, user){
      nome_edit.val(aluno.nome);
      cpf_edit.val(aluno.cpf);
      email_edit.val(user.email);
      senha_edit.val(user.password);
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

    //Visualizar aluno
    let nome_show = $('#nome_show');
    let cpf_show = $('#cpf_show');
    let email_show = $('#email_show');
    let curso_show = $('#curso_show');
    let semestre_entrada_show = $('#semestre_entrada_show');

    function exibirModalVer(aluno, user){
      nome_show.text(aluno.nome);
      cpf_show.text(aluno.cpf);
      email_show.text(user.email);
      curso_show.text(aluno.cpf);
      semestre_entrada_show.text(aluno.semestre_entrada);
      $('#verModal').modal('show');
    }
  </script>

  @endsection
