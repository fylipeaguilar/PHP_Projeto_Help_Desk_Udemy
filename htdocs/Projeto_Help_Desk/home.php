<!-- ---------- Include e Requre ----------->

<?php 

  require_once "validador_acesso.php";

  //print_r($_SESSION);

?>

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

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-home {
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

        <div class="card-home">
          <div class="card">
            <div class="card-header">
              Menu
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-6 d-flex justify-content-center">
                  <a href="abrir_chamado.php">
                    <img src="formulario_abrir_chamado.png" width="70" height="70">
                  </a>
                </div>
                <div class="col-6 d-flex justify-content-center">
                  <a href="consultar_chamado.php">
                    <img src="formulario_consultar_chamado.png" width="70" height="70">
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>