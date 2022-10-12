<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<style>
  .submit{
    border: none;
    color: white;
    background-color: blue;
  }
</style>
<body>
  Olá, {{ $professor->nome }}! <br/><br/>
  
  O aluno {{ $aluno->user->name}}, enviou o frequência mensal referente a {{$mes}}
  do programa {{ $vinculo->programa}}, que teve inicio em {{$vinculo->data_inicio}}. <br/>
  Nesse mês, o orientado trabalhou {{$frequenciaMensal->tempo_total}} horas. <br/><br/>
  
  A frequência mensal está abaixo. <br/> <br/>

  Por favor, avalie a frequência mensal. <br/>
  <label for="">    1h 2h 3h 4h</label><br/>
  <hr/>
  <form action="{{route('vinculos.avaliarRelFinal')}}" method="POST">
    @csrf
    @method('POST')
    <input type="hidden" name="id_vinculo" value="{{$frequenciaMensal->id}}">
    <input type="radio" name="status" id="status_relatorio" value="APROVADO" checked/> Aprovado
    <input type="radio" name="status" id="status_relatorio" value="REPROVADO"/> Reprovado
    <br/><br/>
    Observação:<br/>
    <textarea name="observacao" id="observacao" style="width: 40%; height: 40px;" required></textarea><br/><br/>
    <button class="submit" type="submit">Enviar</button>
  </form>

</body>
</html>

