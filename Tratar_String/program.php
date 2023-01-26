<?php

/*
 * Primeiros passsos para rodar o código:
 *
 * 1. Executar o comando 'composer dump-autoload'.
 * 2. Executar o comando 'php program.php'.
 */

/*
 * Considerações:
 *  Foi criado uma classe Mensagem.php onde ela será a iniciadora da mensagem, tendo os seguintes métodos:
 *
 *  1. defineMensagem($string) - Esse método irá definir a mensagem.
 *  2. tratarAcentos() - Esse método irá tratar os acentos, retirando os mesmos.
 *  3. letrasMaiusculas() - Esse método irá transformar a frase em letras maiusculas.
 *  4. imprimirMensagem() - Esse método irá imprimir a mensagem definida e depois da suas tratativas.
 *
 *  Obs: Cada método é independente, foi criado diferentes funçoes para abstrair o maximo, caso deseje utilizar
 *  somente a função de tratar acentos ou somente a de letras maiusculas etc...
 */

use Quest\TratarString\Mensagem;

require 'vendor/autoload.php';

$mensagem = new Mensagem();

$mensagem->defineMensagem("Olá mundo! Seja bem vindo a Quest Jornada \n");
//$mensagem->defineMensagem("ÁÉÍÓÚáéíóú! äëïöü");
$mensagem->trataAcentos();
$mensagem->letrasMaiusculas();
$mensagem->imprimirMensagem();