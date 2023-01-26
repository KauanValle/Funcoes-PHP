<?php

namespace Quest\ScriptCSV\Data\Tables;

interface ITables
{
    public function salvarDados($array);
    public function setConexao($con);
    public function pegarDados($data);
}