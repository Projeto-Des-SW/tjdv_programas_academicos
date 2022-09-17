@extends("templates.app")

@section("body")
  <div class="container">
    <h1><strong>Vinculos</strong></h1>
    <a type="button" data-bs-toggle="modal" data-bs-target="#criarModal">
      <img src="{{asset("images/add-icon.png")}}" class="add-button" alt="Adicionar Professor">
    </a>
  </div>
  @include("vinculos.componentes.modal_criar")


  @include("vinculos.componentes.modal_ver")
  @include("vinculos.componentes.modal_delete")
  @include("vinculos.componentes.modal_edit")
 
 
 @endsection
 