<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Content-Type");

require_once("../config/conexao_bd.php");

require_once("../config/config_geral.php");

$acao = "";

if (!isset($_GET['acao'])) {
	echo "Bem-vindo à API";
}
else{

	$acao = $_GET['acao'];

}

include('produtos.php');


?>