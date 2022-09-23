@extends("templates.app")

@section("body")


  <div class="container">
    <div>
      <h1><strong>Vinculos</strong></h1>
      <a type="button" data-bs-toggle="modal" data-bs-target="#criarModal">
        <img src="{{asset("images/add-icon.png")}}" class="add-button" alt="Adicionar Professor">
      </a>
      @include("vinculos.componentes.modal_criar")
    </div>

    <div style="text-align: right; margin-top: 20px">
      <form action="{{ route("vinculos.index" )}}" method="get">
        <input class="input-modal-create input-search" type="text" name="search" placeholder="Pesquisar por">
        <button class="btn btn-primary submit">Pesquisar</button>
      </form>
    </div>
    
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
                {{-- <div class="col-100 status-card"></div> --}}
                <div class="col informacoes">
                  <a type="button" class="ver" style="text-decoration: none; color: black;" onclick="exibirModalVer({{$vinculo}}, {{$vinculo->professor}}, {{$vinculo->aluno}})">
                    <label class="labelIndex">{{$vinculo->professor->nome}} - {{$vinculo->aluno->nome}}</label>
                    <hr class="labelIndex">
                    <label class="labelIndex">{{$vinculo->programa}} </label>
                  </a>
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
  </div>

  <script>
    function exibirModalEditar(vinculo){
      $('#id_edit').val(vinculo.id);
      $("#select-alunos-edit").find("option[value=" + vinculo.aluno_id + "]").attr("selected", true).trigger("chosen:updated");
      $("#select-professores-edit").find("option[value=" + vinculo.professor_id + "]").attr("selected", true).trigger("chosen:updated");
      $("#select-bolsa-edit").find("option[value=" + vinculo.bolsa + "]").attr("selected", true).trigger("chosen:updated");
      $("#select-programas-edit").find("option[value=" + vinculo.programa + "]").attr("selected", true).trigger("chosen:updated");
      $("#semestre-edit").val(vinculo.semestre);
      vinculo.valor_bolsa ? $("#valor-bolsa-edit").val(vinculo.valor_bolsa).attr("disabled", false) : $("#valor-bolsa-edit").val('').attr("disabled", true);
      vinculo.curso ? $("#curso-edit").val(vinculo.curso).attr("disabled", false) : $("#curso-edit").val('').attr("disabled", true);
      vinculo.disciplina ? $("#disciplina-edit").val(vinculo.disciplina).attr("disabled", false) : $("#disciplina-edit").val('').attr("disabled", true);
      vinculo.data_inicio ? $("#data-inicio-edit").val(vinculo.data_inicio).attr("disabled", false) : $("#data-inicio-edit").val('').attr("disabled", true);
      vinculo.data_fim ? $("#data-fim-edit").val(vinculo.data_fim).attr("disabled", false) : $("#data-fim-edit").val('').attr("disabled", true);

      $("#editarModal").modal("show");
    }
  </script>

@endsection