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
        <input class="input-modal-create input-search" type="text" name="search" placeholder="Pesquisar por" old="{{$search}}">
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
        <br>
        @foreach ($vinculos as $vinculo)
          <div class="row justify-content-md-center listing-card">
            {{-- <div class="col-100 status-card"></div> --}}
            <div class="col-md-1 col-lg-1 status">
              <img src="{{asset("images/$vinculo->status.png")}}" class="status-icon">
            </div>
            <div class="col-md-9 col-lg-9 informacoes">
              <a type="button" style="text-decoration: none; color: black;" onclick="exibirModalVer({{$vinculo}}, {{$vinculo->professor}}, {{$vinculo->aluno}})">
                <label class="labelIndex">{{$vinculo->professor->nome}} - {{$vinculo->aluno->nome}}</label>
                <hr class="labelIndex">
                <label class="labelIndex">{{$vinculo->programa}} - {{$vinculo->bolsa}} - {{$vinculo->semestre}}</label>
              </a>
            </div>
            <div class="col-md-2 col-lg-2 opcoes">
              <a type="button" class="edit" onclick="exibirModalEditar({{$vinculo}})">
                <img src="{{asset("images/editar.png")}}" class="option-button" alt="Editar Vinculo">
              </a>
              <a type="button" class="delete" onclick="exibirModalDelete({{$vinculo}})">
                <img src="{{asset("images/excluir.png")}}" class="option-button" alt="Excluir Vinculo">
              </a>
            </div>
          </div>
          <br>
        @endforeach
        @include("vinculos.componentes.modal_ver")
        @include("vinculos.componentes.modal_delete")
        @include("vinculos.componentes.modal_edit")
    @endif
  </div>

@endsection
 