@extends("templates.app")

@section("body")

    <div class="container">
        <h1><strong>Frequencia mensal</strong></h1><br/>

        <form action="{{route('vinculos.salvarFrequenciaMensal')}}" method="post">
            @csrf
            <input type="hidden" id="idVinculo" name="idVinculo" value="{{$idVinculo}}"/>
            <div class="row">
                <div class="container form-group col-lg-4  ">
                    <label for="mes" class="teste-1">Selecione o mês</label>
                    <select name="mes" id="mes" class="input-modal-create form-control">
                        <option value=""></option>
                        <option value="1">Janeiro</option>
                        <option value="2">Fevereiro</option>
                        <option value="3">Março</option>
                        <option value="4">Abril</option>
                        <option value="5">Maio</option>
                        <option value="6">Junho</option>
                        <option value="7">Julho</option>
                        <option value="8">Agosto</option>
                        <option value="9">Setembro</option>
                        <option value="10">Outubro</option>
                        <option value="11">Novembro</option>
                        <option value="12">Dezembro</option>
                    </select>
                </div>
            </div><br/><br/>

            <div id="formulario_frequencia">

            </div>

            <br/><br/><input class="btn btn-success" type="submit" style="width: 200px;" value="Salvar"/>

        </form>
    </div>

    <script>
        $("#mes").change( function(){
            let qntDias;
            let formulario = "";
            $("#formulario_frequencia").html('');
    
            //verificando quantos dias tem o mes
            if ($(this).val() == 1){
                qntDias = 31;
            } else if ($(this).val() == 2){
                qntDias = 29;
            } else if ($(this).val() == 3){
                qntDias = 31;
            } else if ($(this).val() == 4){
                qntDias = 30;
            } else if ($(this).val() == 5){
                qntDias = 31;
            } else if ($(this).val() == 6){
                qntDias = 30;
            } else if ($(this).val() == 7){
                qntDias = 31;
            } else if ($(this).val() == 8){
                qntDias = 31;
            } else if ($(this).val() == 9){
                qntDias = 30;
            } else if ($(this).val() == 10){
                qntDias = 31;
            } else if ($(this).val() == 11){
                qntDias = 30;
            } else{
                qntDias = 31;
            }
    
            //fazendo colunas do formulario
            formulario += `
                <div class="container row" style="margin-left: 5rem">
                    <div class="col-2" style="background-color: #0D2579">
                        <label class="text-light">Dias/Horas</label>
                    </div>
                    <div class="col-2 " style="background-color: #0D2579">
                        <label class="text-light">1h</label>
                    </div>
                    <div class="col-2" style="background-color: #0D2579">
                        <label class="text-light">2h</label>
                    </div>
                    <div class="col-2" style="background-color: #0D2579">
                        <label class="text-light">3h</label>
                    </div>
                    <div class="col-2" style="background-color: #0D2579">
                        <label class="text-light">4h</label>
                    </div>    
                </div>
            `;

            for (i = 0; i < qntDias; i++){
                formulario += `
                <div class="container row" style="margin-left: 5rem">
                    <div class="col-2 p-3" style="background-color: #0D2579">
                        <label class="text-white"> Dia ${i + 1}</label>
                    </div>
                    <div class="col-2 bg-light p-3 ">
                        <input type="radio" class="dia" id="dia${i + 1}" name="dia${i + 1}" value="1">
                    </div>
                    <div class="col-2 bg-light p-3 ">
                        <input type="radio" class="dia" id="dia${i + 1}" name="dia${i + 1}" value="2">
                    </div>
                    <div class="col-2 bg-light p-3 ">
                        <input type="radio" class="dia" id="dia${i + 1}" name="dia${i + 1}" value="3">
                    </div>
                    <div class="col-2 bg-light p-3 ">
                        <input type="radio" class="dia" id="dia${i + 1}" name="dia${i + 1}" value="4">
                    </div>    
                </div><br/>
                `; 
            }
    
            $("#formulario_frequencia").html(formulario);    
        });

        // $(".dia").click(function(){
        //     if ($(this).prop("checked")){
        //         console.log('a')
        //         $(this).prop("checked",false);
        //     } else {
        //         console.log('b')
        //         $(this).prop("checked",true);
        //     }
        // });
    </script>

@endsection

