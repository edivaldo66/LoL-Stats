<?php

	require_once("config/conexao_bd.php");

	$conexao = conecta_bd();

	require_once("config/config_geral.php");

	$pagina = 'inicio';

	if(isset($_GET['pg'])){
	    $pagina = $_GET['pg'];
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>LoL Stats</title>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="css/estilo-grid.css">

	<link rel="stylesheet" type="text/css" href="css/estilo-grid-700.css" media="screen and (max-width:320px)">

	<link rel="stylesheet" type="text/css" href="css/estilo-grid-1200.css" media="screen and (max-width:600px)">

	<link rel="stylesheet" type="text/css" href="css/estilo-grid-1200.css" media="screen and (max-width:1024px)">

	<link rel="stylesheet" type="text/css" href="css/estilo-grid-1200.css" media="screen and (max-width:1200px)">
	
</head>
<body>

	<div id="container">

		<div id="header">
			<h1 align="center">LoL Stats</h1>
		</div>

		<div id="menu">
			<ul>
				<li><a href="">Início</a></li>
				<li><a href="?pg=sobre">Sobre</a></li>
				<li><a href="">Campeões</a></li>
				<li><a href="?pg=cadastro">Cadastrar</a></li>
				<li><a href="?pg=listar">Listar</a></li>
			</ul>
		</div>		

		<div id="main">
			<div id="content">
				<div id="pagina">
					<?php 

				      include("paginas/".$pagina.".php"); 

				    ?>
				</div>
			</div>
		</div>

		<div id="footer">
			<p align="center">Todos os direitos reservados</p>
		</div>
		
	</div>

</body>
</html>