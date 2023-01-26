<?php
namespace Quest\ScriptCSV;

use Quest\ScriptCSV\Arquivo\Arquivo;

require 'vendor/autoload.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arquivos</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        h1 {
            font-size: 20px;
            font-weight: 300;
        }

        .container {
            display: flex;
        }

        .containerInputs {
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 5px 5px 5px #DDD;
            background-color: #DDD;
            margin: 20px;
            padding: 20px;
            border: 2px solid #CCC;
            border-radius: 10px;
        }

        .inputs {
            margin: 20px 0;
        }

        input {
            margin: 0 0 10px 0;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="containerInputs">
        <h1>Suba aqui seu arquivo .csv!</h1>
        <div class="inputs">
            <form action="./" method="POST" enctype="multipart/form-data">
                <input type="file" name="file"><br>
                <input type="submit" value="Subir arquivo" name="arquivo">
            </form>

            <?php
            if (isset($_POST['arquivo'])) {
                $fileTmpPath = $_FILES['file']['tmp_name'];
                $fileName = $_FILES['file']['name'];

                $uploadFileDir = './src/ArquivosUpados/';

                $dest_path = $uploadFileDir . $fileName;
                move_uploaded_file($fileTmpPath, $dest_path);

                $arquivo = new Arquivo();

                $arquivo->setPath($fileName);
                $arquivo->lerArquivo();
                $arquivo->salvarDados();

                header('location:/');
            }

            ?>
        </div>
    </div>
</div>
</body>
</html>