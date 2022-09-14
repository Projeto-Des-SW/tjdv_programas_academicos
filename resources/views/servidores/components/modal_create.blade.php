<div class="modal fade" id="criarModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content modal-create">
      <div class="modal-header" >
        <h5 class="modal-title title" >Cadastro de servidor</h5>
        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route("servidores.store")}}" method="post">
        @csrf
        <div class="modal-body">
          <div class="mb-3" style="">
            <label for="nome" class="form-label">Nome</label>
            <input name="nome" class="form-control input-modal-create" type="text" placeholder="Digite o nome" >
          </div>
          <div class="row">
            <div class="col-sm- 12 col-md-6 mb-3">
              <label for="cpf" class="form-label">CPF</label>
              <input name="cpf" class="form-control input-modal-create" type="text" placeholder="Digite o CPF">
            </div>
              
            <div class="col-sm- 12 col-md-6 mb-3">
              <label for="email" class="form-label">E-mail</label>
              <input name="email" class="form-control input-modal-create" type="text" placeholder="Digite o e-mail">
            </div>
            <div class="col-sm- 12 col-md-6 mb-3">
              <label for="password" class="form-label">E-mail</label>
              <input name="password" class="form-control input-modal-create" type="password" placeholder="Digite a senha">
            </div>

          </div>
          <button type="submit" class="btn btn-primary submit-button" style="margin-top: 30px;">Cadastrar servidor</button>
        </div>
      </form>
    </div>
  </div>
</div>

