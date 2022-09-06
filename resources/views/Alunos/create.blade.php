<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastrar um novo aluno</title>
    </head>
    <body>
        <form action="{{ route('cadastrar_aluno') }}" method="POST">
            @csrf
            <label>Nome</label><br>
            <input type="text" name="nome"><br>

            <label>Cpf</label><br>
            <input type="text" name="cpf"><br>

            <label>Curso</label><br>
            <input type="text" name="curso"><br>

            <label>Semestre de entrada</label><br>
            <input type="text" name="semestre_entrada"><br>

            <button>Cadastrar</button>
        </form>
    </body>
</html>