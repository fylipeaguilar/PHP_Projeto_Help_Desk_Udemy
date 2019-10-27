<?php

	// Vamos utilizar a super global POST para 
	// interceptar os dados de envio o formulário

	session_start();


	// Criando arquivo de texto
	// O próprio PHP tem uma funcão nativa para essa função

	// Podemos usar a função "fopen('nome do arquivo', 'qual ação terá como arquivvo')"
	// Para entender melhor esses parâmetros podemos acessar
	// https://www.php.net/manual/en/function.fopen.php
	// "a" neste caso vamos utilizar o parâmetro "a", que abre o arquivo para escrita

	// **** TRABALHANDO O ARQUIVO ****
	// (Opção 1) - Vamos utilizar a função "str_replace" evitar falhar se vier o mesmo caracter no titulo ou na descrição

	$titulo = str_replace('|', '*', $_POST['titulo']);
	$categoria = str_replace('|', '*', $_POST['categoria']);
	$descricao = str_replace('|', '*', $_POST['descricao']);

	// (Opção 2) - Vamos utilizar a função "implode" evitar falhar se vier o mesmo caracter no titulo ou na descrição.
	// A função "implode" transforma um array em uma string

	// Temos que formar o array em uma estrutura de texto
	// Utilizamos o PHP_EOL (para armazenas uma quebra de linha)
	// Esse comando é bacana, ele armazena a quebra de linha de
	// acordo com o sistema operacional que o PHP está instalado.
	$texto = $_SESSION['id'] . '|' . $titulo . '|' . $categoria . '|' . $descricao . PHP_EOL;

	// *** (1) ABRRINDO O ARQUIVO ***
	// Foi necessário criar uma variável do arqvuivo que abrimos
	// para utilizar o comando "fwrite"
	$arquivoChamado = fopen('../../private_files/chamados.txt', 'a');

	// *** (2) ESCREVENDO NO ARQUIVO ***
	// Vamos utilizar a função fwrite ('referêna do arquivo', '');
	// Temos que criar um variável do arqvuivo que abrimos
	fwrite($arquivoChamado, $texto);

	// *** (3) FECHANDO O ARQUIVO ***
	// Depois de escriver no arquivo é necessário fechar o arquivo
	fclose($arquivoChamado);

	// Por fim vamos Redirecionar a página "home"
	header('Location: home.php');

	//echo $texto;

?>