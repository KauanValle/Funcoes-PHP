<?php

namespace Quest\ScriptCSV\Data;

use PDO;
use Quest\ScriptCSV\Data\Tables\ITables;

class dbContext
{
    public $user;
    public $password;
    private $dns;
    public $con;
    private $conexaoAberta = false;

    public function __construct($host = '127.0.0.1', $dbname = 'Quest', $user = 'root', $password = 'root', $port = '8889')
    {
        $this->dns = 'mysql:host=' . $host . ';port=' . $port . ';dbname=' . $dbname;
        $this->user = $user;
        $this->password = $user;

        $this->conectar();
    }

    public function conectar()
    {
        try {
            if (!$this->conexaoAberta) {
                $this->con = new PDO(
                    $this->dns, $this->user, $this->password) or print (mysql_error()
                );
                $this->conexaoAberta = true;
            }
        } catch (\PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }

    public function salvarDados($array, ITables $table)
    {
        $table->setConexao($this->con);
        $table->salvarDados($array);
    }
}