<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content modal-create">
      <div class="modal-header" >
        <h5 class="modal-title title" >Editar Aluno</h5>
        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="form-edit" action="{{route('alunos.update')}}" method="post">
        @csrf
        <input type="hidden" name="id_edit" id="id_edit">
        <div class="modal-body">
          <div class="mb-3" style="">
            <label for="nome_edit" class="form-label">Nome</label>
            <input name="nome_edit"id="nome_edit" class="form-control input-modal-create" type="text" placeholder="Digite o nome" >
          </div>

          <div class="row">
            <div class="col-sm- 12 col-md-6 mb-3">
              <label for="cpf_edit" class="form-label">CPF</label>
              <input name="cpf_edit" id="cpf_edit" class="form-control input-modal-create" type="text" placeholder="Digite o CPF">
            </div>
            
            <div class="col-sm- 12 col-md-6 mb-3">
              <label for="curso_edit" class="form-label">Curso</label>
              <input name="curso_edit" id="curso_edit" class="form-control input-modal-create" type="text" placeholder="Digite o curso">
            </div> 

            <div class="col-sm- 12 col-md-6 mb-3">
              <label for="email_edit" class="form-label">E-mail</label>
              <input name="email_edit" id="email_edit" class="form-control input-modal-create" type="text" placeholder="Digite o email">
            </div> 

            <div class="col-sm- 12 col-md-6 mb-3">
              <label for="senha_edit" class="form-label">Senha</label>
              <input name="senha_edit" id="senha_edit" class="form-control input-modal-create" type="password" placeholder="Digite a senha">
            </div> 

            <div class="col-sm- 12 col-md-6 mb-3">
              <label for="semestre_entrada_edit" class="form-label">Semestre de entrada</label>
              <input name="semestre_entrada_edit" id="semestre_entrada_edit" class="form-control input-modal-create" type="text" placeholder="Digite o semestre de entrada">
            </div>
          </div>
          <button id="submit_edit" type="submit" class="btn btn-primary submit-button" style="margin-top: 30px;">Salvar informações</button>
        </div>
      </form>
    </div>
  </div>
</div>
