<?php
namespace Quest\TratarString;

class Mensagem extends Utils
{
    public $mensagem;
    public $maiusculo = false;

    public function defineMensagem($string)
    {
        // Faz a verificação se a frase tem pelomenos 3 caracteres.
        if(strlen($string) < 3)
        {
            $this->mensagem = "Informe uma frase com no minimo 3 caracteres.";
            return;
        }
        $this->mensagem = $string;
    }

    public function trataAcentos()
    {
        // Chama a função da classe Utils que é extendida, onde aplica a regra para retirada dos acentos.
        $this->mensagem = $this->RetiraAcentos($this->mensagem);
        if($this->maiusculo)
        {
            $this->letrasMaiusculas();
        }
    }

    public function letrasMaiusculas()
    {
        // Transforma a frase em maiuscula.
        $this->mensagem = strtoupper($this->mensagem);
        $this->maiusculo = true;
    }

    public function imprimirMensagem()
    {
        // Imprime no console a mensagem.
        echo $this->mensagem;
    }


}