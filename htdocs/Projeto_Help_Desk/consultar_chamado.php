<!-- ---------- Include e Requre ----------->

<?php require_once "validador_acesso.php" ?>

  <!--
    INCLUDE e REQUIRE são funções de inclusão, para que o código não fique repetitivo
    a diferença dos comando está no caso de ocorrência de erro da chamada.

    include: exibi um warning e executa os demais comando.
    include_once: exibi um warning e executa os demais comando, apenas uma vez.
    Require: gera um fatal error e os demais comando não são executados (após a chamada).
    require_once: gera um fatal error e os demais comando não são executados (após a chamada)
                  apenas uma vez.
  -->

<!------------------------------------------>


<!-- ---------- LEITURA DO ARQUIVO  ----------->
<?php 

  //print_r($_SESSION);

  // Declarando o array para guardar os chamados
  $chamados = array();

  // **** (1) - ABRIR O ARQUIRO ****
  // Foi necessário criar uma variável do arqvuivo que abrimos
  // para utilizar o comando "fwrite"
  // https://www.php.net/manual/en/function.fopen.php
  // "a" neste caso vamos utilizar o parâmetro "R", que abre o arquivo para leitura
  $arquivoChamado = fopen('../../private_files/chamados.txt', 'r');

  // **** (2) - LER O ARQUIRO ****
  // Temos que percorrer o arquivo enquanto houver linhas 
  // para serem recuperadas.
  // Para condição de parada do while, podemos utilizar a função "feof"
  // A função "feof" testa pelo fim de um arquivo EOF (end of file) essa
  // função é nativa do PHP
  while (!feof($arquivoChamado)) {
    //o parametro fgets(ref.arquivo, 'bits ou quebra de linha')
    $registro = fgets($arquivoChamado);
    $chamados [] = $registro;
  }

  // **** (3) - FECHAR O ARQUIRO ****
  fclose($arquivoChamado);

  // echo '<pre>';
  //   print_r($chamados);
  // echo '<pre/>';
?>
<!------------------------------------------>


<!-- ---------- FRONT-END DA APLICAÇÃO  ----------->
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">SAIR</a>          
        </li>
      </ul>      
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
              <?php

              foreach ($chamados as $item_chamados) { ?>

                <?php

                  $dados_chamados = explode('|', $item_chamados);


                  //print_r($dados_chamados);
                  // echo $_SESSION['perfil_id'] . '<br>';
                  // echo $_SESSION['id'] . '<br>';
                  // echo $dados_chamados[0] . '<br>';

                  //implementação de visualização para perfil
                  if ($_SESSION['perfil_id'] == 2) {
                    // só vamos exibir os chamados se eles tiverem sido criados pelo usuáio
                    if ($_SESSION['id'] != $dados_chamados[0])  {
                      continue;
                    }
                  }


                  if(count($dados_chamados) < 3) {
                    // Se for menor que 3 (id, titulo, categoria ou descricao)
                    // Para não imprimir o ultimo array vazio.
                    continue;
                  }

                  // echo "<pre>";
                  //   print_r($dados_chamados);
                  // echo "</pre>";
                ?>

                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?=$dados_chamados[1]?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?=$dados_chamados[2]?></h6>
                    <p class="card-text"><?=$dados_chamados[3]?></p>
                  </div>
                 </div>
              <?php } ?>
              

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>