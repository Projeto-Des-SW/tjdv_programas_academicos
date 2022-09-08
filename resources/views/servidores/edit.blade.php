<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edite um servidor</title>
    </head>
    <body>
        <form action="{{ route('editar_servidor', ['id' => $servidor->id]) }}" method="POST">
            @csrf
            <label for="">Nome</label><br/>
            <input type="text" name="nome" value="{{ $servidor->nome }}"><br/>

            <label for="">CPF</label><br>
            <input type="text" name="cpf" value="{{ $servidor->cpf }}"><br>

             <!-- Alterar e-mail e senha de user -->

            <button>Salvar</button>
        </form> 
    </body>
</html>