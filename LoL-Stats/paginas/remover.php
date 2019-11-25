<?php

$idSummoner = $_GET['id'];

$sql = "DELETE FROM summoner WHERE id = " . $idSummoner;

$result = executar_sql($conexao, $sql);

if($result === TRUE){
	echo "Contato excluído com sucesso.";
}


?>