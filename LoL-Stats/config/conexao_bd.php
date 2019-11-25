<?php

function conecta_bd($host='localhost', $usuario='root', $senha='', $bd='LoL_Stats'){
	
	$mysqli = null;

	$mysqli = new mysqli($host, $usuario, $senha, $bd);

	if ($mysqli->connect_error) {
	    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	}

	return $mysqli;

}

function executar_sql($conexao, $sql){

	$result_query = $conexao->query($sql);

	return $result_query;

}

?>