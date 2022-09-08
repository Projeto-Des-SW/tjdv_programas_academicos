<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ver um servidor</title>
    </head>
    <body>
        <label for="">Nome</label><br/>
        <input type="text" name="nome" value="{{ $servidor->nome }}"><br/>

        <label for="">CPF</label><br>
        <input type="text" name="cpf" value="{{ $servidor->cpf }}"><br>
    </body>
</html>