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
  Olá, {{ $professor->nome }}! <br>
  
  O aluno {{ $aluno->user->name}} acabou de submter um relatório final referente 
  ao programa {{ $vinculo->programa}}, em que o senhor o tem acompanhado por 
  {{$vinculo->quantidade_horas}} horas. <br>
  
  Por favor avaliar o relatório! <br>
  
  O arquivo está em anexo. <br> <br>
  
  <form action="http://localhost:8000/teste" method="get">
    @csrf
    <input name="avaliacao" type="text" id="">
    <button class="submit" type="submit">Salvar</button>
  </form>

</body>
</html>

