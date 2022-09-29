@extends("templates.app")

@section("body")

    <div class="container">
        <h1><strong>Frequencia mensal</strong></h1><br/>

        <form action="{{route('vinculos.salvarFrequenciaMensal')}}" method="post">
            @csrf
            <input type="hidden" id="idVinculo" name="idVinculo" value="{{$idVinculo}}"/>
            <div class="row">
                <div class="form-group col-lg-4 col-md-4 col-sm-3">
                    <label for="mes" class="form-label">Selecione o mês</label>
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

            <br/><br/><input class="btn btn-success" type="submit" style="width: 200px;" value="salvar"/>

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
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-2">
                        <label>1h</label>
                    </div>
                    <div class="col-2">
                        <label>2h</label>
                    </div>
                    <div class="col-2">
                        <label>3h</label>
                    </div>
                    <div class="col-2">
                        <label>4h</label>
                    </div>    
                </div>
            `;

            for (i = 0; i < qntDias; i++){
                formulario += `
                <div class="row"">
                    <div class="col-2">
                        <label> Dia ${i + 1}</label>
                    </div>
                    <div class="col-2">
                        <input type="radio" class="dia" id="dia${i + 1}" name="dia${i + 1}" value="1">
                    </div>
                    <div class="col-2">
                        <input type="radio" class="dia" id="dia${i + 1}" name="dia${i + 1}" value="2">
                    </div>
                    <div class="col-2">
                        <input type="radio" class="dia" id="dia${i + 1}" name="dia${i + 1}" value="3">
                    </div>
                    <div class="col-2">
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

