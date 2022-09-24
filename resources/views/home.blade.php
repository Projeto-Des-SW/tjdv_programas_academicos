@extends("templates.app")

@section("body")
    
    <h1><strong>Programas</strong></h1>
    <div class="container">
        <button class="block">
            <img src="{{asset("images/vinculo.png")}}" alt="Todas as bolsas"/>
            <h3 class="text-home">Todas as bolsas</h3>    
        </button>

        <button class="block">
            <img src="{{asset("images/vinculo.png")}}" alt="Todas as bolsas"/>
            <h3 class="text-home">Monitorias</h3>
        </button>

        <button class="block">
            <img src="{{asset("images/vinculo.png")}}" alt="Todas as bolsas"/>
            <h3 class="text-home">Tutorias</h3>
        </button>

        <button class="block">
            <img src="{{asset("images/vinculo.png")}}" alt="Todas as bolsas"/>
            <h3 class="text-home">PAVI</h3>
        </button>

        <button class="block">
            <img src="{{asset("images/vinculo.png")}}" alt="Todas as bolsas"/>
            <h3 class="text-home">BIA</h3>
        </button>

        <button class="block">
            <img src="{{asset("images/vinculo.png")}}" alt="Todas as bolsas"/>
            <h3 class="text-home">PET</h3>
        </button>
    </div>
@endsection