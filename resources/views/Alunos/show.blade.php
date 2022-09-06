<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ver um aluno</title>
    </head>
    <body>
        <label for="">Nome</label><br/>
        <input type="text" name="nome" value="{{ $aluno->nome }}"><br/>

        <label for="">Cpf</label><br>
        <input type="text" name="cpf" value="{{ $aluno->cpf }}"><br>

        <label for="">E-mail</label><br>
        <input type="text" name="email" value="{{ $aluno->email }}"><br>

        <label for="">Curso</label><br>
        <input type="text" name="curso" value="{{ $aluno->curso }}"><br>

        <label for="">Semestre de entrada</label><br>
        <input type="text" name="semestre_entrada" value="{{ $aluno->semestre_entrada }}"><br>
    </body>
</html>