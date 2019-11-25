<?php

if($_GET['acao'] == 'remover'){
	$idSummoner = $_GET['id'];

	$sql = "DELETE FROM summoner WHERE id = " . $idSummoner;

	$result = executar_sql($conexao, $sql);

	if($result === TRUE){
		echo "Contato excluído com sucesso!";
	}
}

?>

<h1>Listagem de Contatos</h1>

<div id="container">

<div id="formulario">

<table class="table">
	
	<tr>
		<td>id</td>
		<td>Nickname</td>
		<td>Region</td>
		<td>Elo</td>
		<td>Level</td>
		<td></td>
		<td></td>
	</tr>

	<?php 		

		$sql = "SELECT * FROM summoner";

		$result = executar_sql($conexao, $sql);	



		if ($result) {
		    
		    while ($row = $result->fetch_object()) {

		    	?>


				<tr>
			        <td><b><?= $row->id ?></b></td>
			        <td><?= $row->nickname ?></td>
			        <td><?= $row->region ?></td>
			        <td><?= $row->elo ?></td>
			        <td><?= $row->level ?></td>
			        <td><a href="?pg=alterar&id=<?= $row->id ?>">Alterar</a></td>
			        <td><a href="?pg=listar&acao=remover&id=<?= $row->id ?>" onclick="return confirm('Desejar remover este contato?');">Remover</a></td>
		        <tr>

		    	<?php
		    }
		    
		    $result->close();
		}

	?>
	

</table>
</div>
</div>