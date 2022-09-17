<div class="modal fade" id="criarModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content modal-create">
      <div class="modal-header" >
        <h5 class="modal-title title" >Cadastro de vínculo</h5>
        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route("vinculos.create")}}" method="post">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
              <div class="form-group">
                <label for="select-alunos" class="form-label">Selecione um aluno</label>
                <select name="select-alunos" id="select-alunos" class="form-control input-modal-create"><option value=""></option></select>
              </div>

              <div class="form-group">
                <label for="select-programas" class="form-label">Selecione um programa</label>
                <select name="select-programas" id="select-programas" class="form-control input-modal-create"><option value=""></option></select>
              </div>

              <div class="form-group">
                <label for="data-inicio" class="form-label">Selecione a data inicial</label>
                <input type="date" name="data-inicio" id="data-inicio" class="form-control input-modal-create"/>
              </div>

              <div class="form-group">
                <label for="semestre" class="form-label">Informe o semestre</label>
                <input type="text" name="semestre" id="semestre" class="form-control input-modal-create" placeholder="2022.2"/>
              </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6">
              <div class="form-group">
                <label for="select-professores" class="form-label">Selecione um professor</label>
                <select name="select-professores" id="select-professores" class="form-control input-modal-create"><option value=""></option></select>
              </div>

              <div class="form-group">
                <label for="select-bolsa" class="form-label">Selecione uma bolsa</label>
                <select name="select-bolsa" id="select-bolsa" class="form-control input-modal-create"><option value=""></option></select>
              </div>

              <div class="form-group">
                <label for="data-fim" class="form-label">Selecione a data final</label>
                <input type="date" name="data-fim" id="data-fim" class="form-control input-modal-create"/>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary submit-button" style="margin-top: 30px;">Cadastrar vínculo</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    $('#select-alunos').select2({
      placeholder: "Selecione um aluno",
      width: "100%",
    });
  });
</script>

