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
          <div class="row">
            <div class="col-sm- 12 col-md-6 mb-3">
              <label for="nome" class="form-label">Nome</label>
              <input name="nome" id = "nome" type="text" placeholder="Digite o nome" 
                class="form-control input-modal-create @error('nome') is-invalid @enderror" value="{{ old('nome') }}">
                @error('nome')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }} </strong>
                  </span>
                @enderror
            </div>
            <div class="col-sm- 12 col-md-6 mb-3">
              <label for="cpf" class="form-label">CPF</label>
              <input name="cpf" id = "cpf" type="text" placeholder="Digite o CPF" 
               class="form-control input-modal-create @error('cpf') is-invalid @enderror" value="{{ old('cpf') }}">
              @error('cpf')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }} </strong>
                  </span>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-sm- 12 col-md-6 mb-3">
              <label for="email" class="form-label">E-mail</label>
              <input name="email" class="form-control input-modal-create" type="text" placeholder="Digite o e-mail">
            </div>
            <div class="col-sm- 12 col-md-6 mb-3">
              <label for="password" class="form-label">Senha</label>
              <input name="password" class="form-control input-modal-create" type="password" placeholder="Digite a senha">
            </div>
          </div>
          <button type="submit" class="btn btn-primary submit-button" style="margin-top: 30px;">Cadastrar servidor</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
    $(function () {
      $('#cpf').mask('000.000.000-00');
    });
</script>
