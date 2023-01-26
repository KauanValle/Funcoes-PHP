<?php

namespace Quest\ScriptCSV\Arquivo;

use Quest\ScriptCSV\Data\dbContext;
use Quest\ScriptCSV\Data\Tables\Pessoas;

class Arquivo
{
    private $path;
    private $colunasBanco;
    private $colunas;
    private $pessoas;
    private $conn;

    public function __construct()
    {
        $this->colunas = 0;
        $this->colunasBanco = [];
        $this->pessoas = [];
        $this->conn = new dbContext();
    }

    public function setPath($path)
    {
        $this->path = './src/ArquivosUpados/' . $path;
    }

    public function lerArquivo()
    {
        if (empty($this->path)) {
            echo "É necessário informar o path do arquivo para realizar a leitura.";
            return;
        }

        $arquivo = fopen($this->path, "r");

        while ($linha = fgetcsv($arquivo, 1000, ",")) {
            if ($this->colunas++ == 0) {
                for ($i = 0; $i < count($linha); $i++) {
                    $this->colunasBanco[] .= $linha[$i] . "\n";
                }
                continue;
            }

            $this->pessoas[] = [
                'nome' => $linha[0],
                'sobrenome' => $linha[1],
                'data_nascimento' => $linha[2]
            ];
        }
    }

    public function salvarDados()
    {
        foreach ($this->pessoas as $pessoas) {
            $this->conn->salvarDados($pessoas, new Pessoas());
        }
    }
}