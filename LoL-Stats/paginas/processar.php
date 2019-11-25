<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['enviar'])) {

	$nickname = $_POST['nickname'];
	$region = $_POST['region'];
	$elo = $_POST['elo'];
	$level = $_POST['level'];

	$sql = "INSERT INTO summoner (nickname, region, elo, level) VALUES ('$nickname','$region', '$elo', '$level')";

	executar_sql($conexao, $sql);	

	echo "Contato'" . $nickname . "' cadastrado com sucesso!";

}

?>

<br><br>
<a href="?pg=listar">Ir para listagem de contatos</a>
