<?php

/*
 * Considerações:
 *  Foi criado 2 arquivos:
 *      - program.php
 *          Arquivo feito para realizar o processo manualmente, para continuar com esse processo será necessário upar o
 *          arquivo .csv na pasta uploaded_files e setar a path dele com o nome do arquivo .csv
 *      - index.php
 *          Arquivo que tem uma pagina web onde pode realizar o processo de upload do arquivo através da tela. Para rodar
 *          esse arquivo é só rodar o comando: php -S localhost:3030
 *
 *  OBS: Ficar atendo ao arquivo Arquivo.php para conexão com banco de dados, se necessário mudar as infos, adicionar ao construtor ou
 *  adicionar manualmente nos parametros do construtor da classe dbContext.php.
 */

use Quest\ScriptCSV\Arquivo\Arquivo;

require 'vendor/autoload.php';

$arquivo = new Arquivo();

$arquivo->setPath('PessoasNovas.csv');
$arquivo->lerArquivo();
$arquivo->salvarDados();