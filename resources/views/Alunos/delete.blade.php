<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Excluir um aluno</title>
    </head>
    <body>
        <form action="{{ route('excluir_aluno', ['id' => $aluno->id]) }}" method="POST">
            @csrf
            <label for="">Tem certeza que deseja excluir esse Aluno?</label><br>
            <input type="text" name="nome" value="{{ $aluno->nome }}"><br>
            
            <button>Sim</button>
            <button>Cancelar</button>
        </form> 
    </body>
</html>