<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content modal-create">
      <div class="modal-header" >
        <h5 class="modal-title title" >Editar de Professor</h5>
        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="form-edit" action="{{route('professor.update')}}" method="post">
        @csrf
        <input type="hidden" name="id_edit" id="id_edit">
        <div class="modal-body">
          <div class="mb-3" style="">
            <label for="nome_edit" class="form-label">Nome</label>
            <input name="nome_edit"id="nome_edit" class="form-control input-modal-create" type="text" placeholder="Digite o nome do professor" >
          </div>
          <div class="row">
            <div class="col-sm- 12 col-md-6 mb-3">
              <label for="cpf_edit" class="form-label">CPF</label>
              <input name="cpf_edit" id="cpf_edit" class="form-control input-modal-create" type="text" placeholder="Digite o CPF do professor">
            </div> 

            <div class="col-sm- 12 col-md-6 mb-3">
              <label for="siape_edit" class="form-label">SIAPE</label>
              <input name="siape_edit" id="siape_edit" class="form-control input-modal-create" type="text" placeholder="Digite o SIAPE do professor">
            </div>
          </div>
          <button id="submit_edit" type="submit" class="btn btn-primary submit-button" style="margin-top: 30px;">Salvar informações</button>
        </div>
      </form>
    </div>
  </div>
</div>
