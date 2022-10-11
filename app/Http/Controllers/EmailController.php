<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function notificarPrazoFrequencia()
    {
        // Percorrer a lista de vinculos, filtrando status 'andamento' e onde nao existe frequencia

        $email_params = ["professor" => $vinculo->professor, "aluno" => $vinculo->aluno, "vinculo" => $vinculo];
        Mail::send("email.avaliacao_rel_final", $email_params, function ($mail) use ($vinculo) {
            $mail->from("tjdvprogramaacademicos@gmail.com", "TJDV");
            $mail->subject("Notificação de prazo de frequência mensal");
            $mail->to($vinculo->aluno->email);
        });
        
        // Modificar rota para pagina de sucesso
        return redirect(route("vinculos.index"));
    }
}
