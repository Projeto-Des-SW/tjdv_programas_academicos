@extends("layouts.app")

@section("body")
  <h1>Hey there</h1>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button>

  @include("professors.componentes.modal_create")

@endsection
