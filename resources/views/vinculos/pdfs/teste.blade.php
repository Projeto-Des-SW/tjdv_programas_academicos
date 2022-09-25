<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{$vinculo->aluno->nome}}</title>
</head>
<body>

  <h1>{{$vinculo->programa}}</h1>
  <h1>{{$vinculo->aluno->nome}}</h1>
  <h1>{{$vinculo->professor->nome}}</h1>
  <h1>{{$vinculo->data_inicio}}</h1>
  <h1>{{$vinculo->data_fim}}</h1>
  
</body>
</html>