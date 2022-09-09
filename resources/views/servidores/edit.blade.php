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

            <label for="">Email</label><br>
            <input type="text" name="email" value="{{ $servidor->retornar_usuario($servidor->id_user)->email }}"><br>

            <label for="">Senha</label><br>
            <input type="password" name="senha"><br>

            <button>Salvar</button>
        </form> 
    </body>
</html>