# Script_CSV

    Considerações:
    Foi criado 2 arquivos:
        - program.php
            Arquivo feito para realizar o processo manualmente, para continuar com esse processo será necessário upar o
            arquivo .csv na pasta uploaded_files e setar a path dele com o nome do arquivo .csv
        - index.php
            Arquivo que tem uma pagina web onde pode realizar o processo de upload do arquivo através da tela. Para rodar
            esse arquivo é só rodar o comando: php -S localhost:3030
  
    OBS: Ficar atendo ao arquivo Arquivo.php para conexão com banco de dados, se necessário mudar as infos, adicionar ao construtor ou
    adicionar manualmente nos parametros do construtor da classe dbContext.php.
    
# Tratar_String

    Considerações:
      Foi criado uma classe Mensagem.php onde ela será a iniciadora da mensagem, tendo os seguintes métodos:
 
        1. defineMensagem($string) - Esse método irá definir a mensagem.
        2. tratarAcentos() - Esse método irá tratar os acentos, retirando os mesmos.
        3. letrasMaiusculas() - Esse método irá transformar a frase em letras maiusculas.
        4. imprimirMensagem() - Esse método irá imprimir a mensagem definida e depois da suas tratativas.
  
    Obs: Cada método é independente, foi criado diferentes funçoes para abstrair o maximo, caso deseje utilizar
    somente a função de tratar acentos ou somente a de letras maiusculas etc...
