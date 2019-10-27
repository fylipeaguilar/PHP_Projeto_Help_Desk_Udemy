<?php
	
	// Remover índice de sessão
	// Função nativa do php "unset()" remover índices de um array

	// Destruir a variável de sessão
	// Função session_destroy(), destroi todos os indices dentro da 
	// sessão session

	session_start();

	// echo '<pre>';
	// 	print_r($_SESSION);
	// echo '<pre>';

	session_destroy();
	header('Location: index.php');

?>