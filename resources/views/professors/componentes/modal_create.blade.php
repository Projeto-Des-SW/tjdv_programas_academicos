<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal-create">
      <div class="modal-header" >
        <h5 class="modal-title">Cadastro de Professor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route("professors.store")}}" method="post" >
        @csrf
        <div class="modal-body">
            <div class="mb-3" style="">
              <label for="nome" class="form-label">Nome</label>
              <input name="nome" class="form-control input-modal-create" type="text" placeholder="Digite o nome do professor" >
            </div>

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">SIAPE</label>
              <input name="siape" class="form-control input-modal-create" type="text" placeholder="Digite o SIAPE do professor">
            </div>

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">CPF</label>
              <input name="cpf" class="form-control input-modal-create" type="text" placeholder="Digite o CPF do professor">
            </div>
            
            <button type="submit" class="btn btn-primary submit-button" style="margin-top: 30px;">Cadastrar professor</button>
        </div>
      </form>
    </div>
  </div>
</div>

