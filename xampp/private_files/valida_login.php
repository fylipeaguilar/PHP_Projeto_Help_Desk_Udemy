<?php

   //------------ INICIANDO RECURSO DE SESSÃO -----------//

    // A "ssession_start" tem que vir sempre antes de qualquer impressão de dados
    // E normalmete (padrão é a primeira instrução) ela é inserida bem no início da página
    session_start();

    // Utilizando a super global ($_SESSION)
    // Usamos o print_r porque ela é uma super global
    // print_r($_SESSION);
    // echo '<hr/>';

    //------------ RECUPERANDO OS DADOS DE UM MÉTODO GET  -----------//

    //Essa parte foi para entendermos o método e não é a melhor forma de implementação para logins
    // //Usase o print_r para plotas os dados de um array de forma que fica mais fácil de visualizar
    // print_r($_GET);

    // echo '<br>';

    // //Sintaxe da super global//
    // //A super global GET é um Array
    // echo $_GET['email'];
    // echo '<br>';
    
    // echo $_GET['senha'];
    // echo '<br>';


    //------------ Usuários do sistema -----------//

        // Adicionados "id" para salvar que abriu os usuários

        $usuarios_app = array (
            array('id' => 1, 'email' => 'user@gmail.com', 'senha' => '1234', 'perfil_id' => 1),
            array('id' => 2, 'email' => 'adm@gmail.com', 'senha' => '1234', 'perfil_id' => 1),
            array('id' => 3, 'email' => 'fylipe@gmail.com', 'senha' => '1234', 'perfil_id' => 2),
            array('id' => 4, 'email' => 'priscila@gmail.com', 'senha' => '1234', 'perfil_id' => 2)
        );

        // echo '<pre>';
        //     print_r($usuarios_app);
        // echo '<pre>';

    //------------ RECUPERANDO OS DADOS DE UM MÉTODO POST (method="post") -----------//

    // print_r($_POST);

    // echo '<br>';

    // //Sintaxe da super global//
    // //A super global GET é um Array
    // echo $_POST['email'];
    // echo '<br>';
    
    // echo $_POST['senha'];
    // echo '<br>';
   
    //------------ VALIDAÇÃO DE LOGIN -----------//

    // Nessa parte do cógigo, validamos se os dados de entrada (dados da página) são identicos 
    // aos dados da base de dados (neste caso estão fixos no código);

    //Variável para identificar se a autenticação foi realizada
    $usuario_autenticado = false;
    
    //Implementação para regra de perfil
    $usuario_id = null;
    $usuario_perfil_id = null;

    $perfis = array(1 => 'Administrativo', 2 => 'Usuário');


    // "foreach" percorre cada um dos elementos
    // elias atravez da instrução "as $variavel" da acesso aos dados de cada indice do array de forma individual
    foreach($usuarios_app as $user) {

        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
            $usuario_autenticado = true;
            $usuario_id = $user['id'];
            $usuario_perfil_id = $user['perfil_id'];
        }
    }

    //Testando a variável "usuario_autenticado"

    if($usuario_autenticado) {
        echo 'Usuário autenticado!!!';
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        //Utilizando a função nativa "header"
        //Sintaxe de utilização do header se dá da seguinte maneira
        //header('Location: pagina?variavel=valor')
        header('Location: home.php');

    } else {
        //echo 'Erro na autenticação do usuário!!!';

        // Controlando a sessão do usuário
        $_SESSION['autenticado'] = 'NAO';
        
        //Processo para retornar para a tela de login com um mensagem de erro
        //Utilizando a função nativa "header"
        //Sintaxe de utilização do header se dá da seguinte maneira
        //header('Location: pagina?variavel=valor')
        header('Location: index.php?login=erro');
    
    }

?>
