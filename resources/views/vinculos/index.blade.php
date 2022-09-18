@extends("templates.app")

@section("body")
  <div class="container">
    <h1><strong>Vinculos</strong></h1>
    <a type="button" data-bs-toggle="modal" data-bs-target="#criarModal">
      <img src="{{asset("images/add-icon.png")}}" class="add-button" alt="Adicionar Professor">
    </a>
    @include("vinculos.componentes.modal_criar")

    @if (sizeof($vinculos) == 0)
      <div class="empty">
        <p>
          Não há vinculos Cadastrados
        </p>
      </div>
    @else
      <div id="list">
        @foreach ($vinculos as $vinculo)
          <div class="listing-card">
            <div class="container">
              <div class="row justify-content-md-center">
                <div class="col informacoes">
                  <a type="button" class="ver" style="text-decoration: none; color: black;" onclick="exibirModalVer({{$vinculo}}, {{$vinculo->professor}}, {{$vinculo->aluno}})">
                    <label class="labelIndex">{{$vinculo->professor->nome}} - {{$vinculo->aluno->nome}}</label>
                    <hr class="labelIndex">
                    <label class="labelIndex">{{$vinculo->programa}} </label>
                  </a>
                  @include("vinculos.componentes.modal_ver")
                </div>
                <div class="col opcoes">
                  <a type="button" class="edit" onclick="exibirModalEditar({{$vinculo}})">
                    <img src="{{asset("images/editar.png")}}" class="option-button" alt="Editar Vinculo">
                  </a>
                  <a type="button" class="delete" onclick="exibirModalDelete({{$vinculo->id}})">
                    <img src="{{asset("images/excluir.png")}}" class="option-button" alt="Excluir Vinculo">
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        @include("vinculos.componentes.modal_ver")
        @include("vinculos.componentes.modal_delete")
        @include("vinculos.componentes.modal_edit")
      </div>
    @endif

    <script>
      let status_ver = $('#status_ver');
      let bolsa_ver = $('#bolsa_ver');
      let nome_aluno_ver = $('#nome_aluno_ver');
      let nome_professor_ver = $('#nome_professor_ver');
      let data_inicio_ver = $('#data_inicio_ver');
      let data_fim_ver = $('#data_fim_ver');

      function exibirModalVer(vinculo, professor, aluno){
        status_ver.text(vinculo.status)
        if (vinculo.bolsa == "REMUNERADA"){
          bolsa_ver.text("R$ " + vinculo.valor_bolsa)
        }else{
          bolsa_ver.text(vinculo.bolsa)
        }
        nome_aluno_ver.text(aluno.nome)
        nome_professor_ver.text(professor.nome)
        data_inicio_ver.text(vinculo.data_inicio)
        data_fim_ver.text(vinculo.data_fim)
        $('#verModal').modal('show');
      }

      let id_delete = $("#id_delete")
      function exibirModalDelete(id){
        id_delete.val(id)
        $('#deleteModal').modal('show');
      }
    </script>

  </div>

 
 @endsection
 