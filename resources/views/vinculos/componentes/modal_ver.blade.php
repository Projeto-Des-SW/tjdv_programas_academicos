<div class="modal fade" id="verModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content modal-create">
      <div class="modal-header" >
        <h5 id="programa_ver" class="modal-title title"></h5>
        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm- 12 col-md-6 mb-3">
              <label class="form-label">Aluno</label>
              <div class="modal-ver" id="nome_aluno_ver" ></div>
            </div> 

            <div class="col-sm- 12 col-md-6 mb-3">
              <label for="status_ver" class="form-label">Status</label>
              <div class="modal-ver" id="status_ver" ></div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm- 12 col-md-6 mb-3">
              <label class="form-label">Professor</label>
              <div class="modal-ver" id="nome_professor_ver" ></div>
            </div> 

            <div class="col-sm- 12 col-md-6 mb-3">
              <label for="bolsa_ver" class="form-label">Bolsa</label>
              <div class="modal-ver" id="bolsa_ver" style="color: green"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm- 12 col-md-6 mb-3">
              <label class="form-label">Começo do Programa</label>
              <div class="modal-ver" id="data_inicio_ver" ></div>
            </div> 

            <div class="col-sm- 12 col-md-6 mb-3">
              <label for="end_ver" class="form-label">Previsão de fim do programa</label>
              <div class="modal-ver" id="data_fim_ver" ></div>
            </div>
          </div>
        
          <div style="margin-bottom: 15px; margin-top: 15px">
            <a class="btn btn-success" role="button" style="width: 230px">Formulário de Frequência</a>
            <p></p>
            <a class="btn btn-primary submit-button" data-bs-dismiss="modal" style="width: 230px" role="button">Voltar</a>
          </div> 

        </div>
    </div>
  </div>
</div>
<script>
  let status_ver = $('#status_ver');
  let bolsa_ver = $('#bolsa_ver');
  let nome_aluno_ver = $('#nome_aluno_ver');
  let nome_professor_ver = $('#nome_professor_ver');
  let data_inicio_ver = $('#data_inicio_ver');
  let data_fim_ver = $('#data_fim_ver');
  let programa_ver = $('#programa_ver')

  function exibirModalVer(vinculo, professor, aluno){
    status_ver.text(vinculo.status)
    
    if (vinculo.status == "VIGOR"){
      document.getElementById("status_ver").style.color = "blue";
    }else{
      document.getElementById("status_ver").style.color = "red";

    }

    if (vinculo.bolsa == "REMUNERADA"){
      bolsa_ver.text("R$ " + vinculo.valor_bolsa)
    }else{
      bolsa_ver.text(vinculo.bolsa)
    }
    programa_ver.text(vinculo.programa)
    nome_aluno_ver.text(aluno.nome)
    nome_professor_ver.text(professor.nome)
    
    let data = new Date(vinculo.data_inicio);
    data_inicio_ver.text(data.getDate() + "/" + data.getMonth() + "/" + data.getFullYear())
    
    data = new Date(vinculo.data_fim);
    data_fim_ver.text(data.getDate() + "/" + data.getMonth() + "/" + data.getFullYear())
    $('#verModal').modal('show');
  }

</script>
