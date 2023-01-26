<?php

namespace Quest\TratarString;

class Utils
{
    protected function RetiraAcentos(string $string)
    {
        // Transforma uma string de um formato de caracteres para outro formado.
        $string = iconv("UTF-8", "ASCII//TRANSLIT//IGNORE", $string);

        // Após retirar os acentos, ele ira ficar com aspas simples e duplas no código e com um str_replace irá retirar as mesmas.
        return str_replace(array("'", '"'), '', $string);
    }
}