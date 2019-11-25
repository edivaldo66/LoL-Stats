<?php

$idSummoner = $_GET['id'];

if (isset($_POST['enviar'])) {


	$nickname = $_POST['nickname'];
	$region = $_POST['region'];
	$elo = $_POST['elo'];
	$level = $_POST['level'];

	$sql = "UPDATE summoner SET nickname='$nickname', region='$region', elo=$elo, level=$level";


	$sql .= " WHERE id = " . $idSummoner;	

	executar_sql($conexao, $sql);

}

$sql = "SELECT * FROM summoner WHERE id = " . $idSummoner;

$result = executar_sql($conexao, $sql);

$summoner = null;

if (!($summoner = $result->fetch_object())) {

	echo "Problema ao buscar contato.";

}

?>

<h1>Formulário de Alteração</h1>

<form action="" class="form-group" method="POST" enctype="multipart/form-data">
<p>Nickname: <input type="text" name="nickname" value="<?= $summoner->nickname ?>" id="nickname" class="form-control">         
</p>

<p>Region: <input type="text" name="region" value="<?= $summoner->region ?>" class="form-control" id="region">
</p>

<p>Elo: <input type="text" name="elo" value="<?= $summoner->elo ?>" class="form-control" id="elo">
</p>

<p>Level: <input type="text" name="level" value="<?= $summoner->level ?>" class="form-control" id="level">
</p>

<p>
	<input type="submit" name="enviar" value="Editar">

	<input type="reset" name="reset" value="Resetar">
</p>
</form>