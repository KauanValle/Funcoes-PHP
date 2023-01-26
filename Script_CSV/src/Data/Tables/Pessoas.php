<?php

namespace Quest\ScriptCSV\Data\Tables;

use PDO;
use Quest\ScriptCSV\Data\dbContext;

class Pessoas implements ITables
{
    private $table = 'pessoas';
    private $con;

    public function setConexao($con)
    {
        $this->con = $con;
    }

    public function pegarDados($data)
    {
        $stmt = $this->con->prepare("SELECT * FROM pessoas WHERE nome = ? and sobrenome = ?");
        $stmt->bindParam(1, $data['nome']);
        $stmt->bindParam(2, $data['sobrenome']);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }

    public function atualizarDados($data)
    {
        $stmt = $this->con->prepare("UPDATE pessoas SET nome = ?, sobrenome = ?, data_nascimento = ? where id = ?");
        $stmt->bindParam(1, $data['nome']);
        $stmt->bindParam(2, $data['sobrenome']);
        $stmt->bindParam(3, $data['data_nascimento']);
        $stmt->bindParam(4, $data['id']);
        $stmt->execute();
    }

    public function salvarDados($data)
    {
        $dados = json_decode(json_encode($this->pegarDados($data)), true);
        if ($dados) {
            $data['id'] = $dados['id'];
            $this->atualizarDados(json_decode(json_encode($data), true));
        }else {
            $stmt = $this->con->prepare("INSERT INTO " . $this->table . "(nome, sobrenome, data_nascimento) VALUES (?, ?, ?)");
            $stmt->bindParam(1, $data['nome']);
            $stmt->bindParam(2, $data['sobrenome']);
            $stmt->bindParam(3, $data['data_nascimento']);
            $stmt->execute();
        }
    }
}