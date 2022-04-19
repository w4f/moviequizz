<?php

namespace App\Http\Controllers;

use App\Pergunta;
use Illuminate\Http\Request;

class PerguntaController extends Controller
{
    public function index()
    {
        $perguntas = Pergunta::find(1);
        $tentativas = 0;
        $dica1 = "";
        $dica2 = "";
        $dica3 = "";
        $dica4 = "";
        $resultado = "";
        $venceu = 0;
        return view('game', ['perguntas' => $perguntas, 'tentativas' => $tentativas, 'dica1' => $dica1, 'dica2' => $dica2, 'dica3' => $dica3, 'dica4' => $dica4, 'resultado' => $resultado, 'venceu' => $venceu  ]);
    }

    public function verifica(Request $request)
    {
        
        $perguntas = Pergunta::find(1);
        $venceu = 0;
        $filme = $request->input('filme');
        $tentativas = $request->input('tentativas') + 1;

        if ($tentativas == 1) {
            $dica1 = $perguntas->dica1;
            $dica2 = "";
            $dica3 = "";
            $dica4 = "";
            $resultado = "";
        } elseif ($tentativas == 2) {
            $dica1 = $perguntas->dica1;
            $dica2 = $perguntas->dica2;
            $dica3 = "";
            $dica4 = "";
            $resultado = "";
        } elseif ($tentativas == 3) {
            $dica1 = $perguntas->dica1;
            $dica2 = $perguntas->dica2;
            $dica3 = $perguntas->dica3;
            $dica4 = "";
            $resultado = "";
        } elseif ($tentativas == 4) {
            $dica1 = $perguntas->dica1;
            $dica2 = $perguntas->dica2;
            $dica3 = $perguntas->dica3;
            $dica4 = $perguntas->dica4;
            $resultado = "";
        } else {
            $dica1 = $perguntas->dica1;
            $dica2 = $perguntas->dica2;
            $dica3 = $perguntas->dica3;
            $dica4 = $perguntas->dica4;
            $resultado = "Você perdeu, tente novamente amanhã!"; 
            $venceu = 2;          
        }

        if ($filme == $perguntas->resposta) {
            $resultado = "Você venceu, tente descobrir um novo filme amanhã!";
            $tentativas = 0;
            $venceu = 1;
            $dica1 = "";
            $dica2 = "";
            $dica3 = "";
            $dica4 = "";
            
        }
        return view('game', ['perguntas' => $perguntas, 'tentativas' => $tentativas, 'dica1' => $dica1, 'dica2' => $dica2, 'dica3' => $dica3, 'dica4' => $dica4, 'resultado' => $resultado, 'venceu' => $venceu  ]);
    }
}