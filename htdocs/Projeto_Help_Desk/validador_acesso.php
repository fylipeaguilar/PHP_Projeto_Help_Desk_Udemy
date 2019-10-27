<?php

  session_start();

  // Se o valor por diferente da variável "!isset($_SESSION['autenticado']" OU
  // o valor da variável "$_SESSION['autenticado']" for diferente de "SIM"
  // vai para o redirecionamento e volta para a página de login.
  if(!isset($_SESSION['autenticado']) ||  $_SESSION['autenticado'] != 'SIM') {
    header('Location: index.php?login=erro2');
    //echo $_SESSION['autenticado'];
  }
  
?>