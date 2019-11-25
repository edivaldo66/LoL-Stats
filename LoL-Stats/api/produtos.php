<?php

// Lista todos os produtos cadastrados
function listarProdutos(){

	$conexao = conecta_bd();

	$sql = "SELECT * FROM produto";

	$result = executar_sql($conexao, $sql);		

	$resposta = array("Produtos" => array());

	if ($result) {
	    
	    while ($row = $result->fetch_assoc()) {

	    	// $respostaAux = array();

	    	// $respostaAux['Codigo'] = $row->id;
	    	// $respostaAux['NomeProduto'] = $row->nome;

	    	if ($row['imagem'] != ''){
	    		$row['imagem'] = 'http://localhost/projeto_webservice/imgs/' . $row['imagem'];
	    	}

	    	$resposta["Produtos"][] = $row;

	    }
	}
	
	echo json_encode($resposta);

}

// Excluir produto, de acordo com ID
function excluirProdutoPorId($id){

	$conexao = conecta_bd();
	
	$sql = "DELETE FROM produto WHERE id = $id";

	$result = executar_sql($conexao, $sql);			
	
	if ($result) {
	    echo json_encode(array('code' => 1, 'msg' => 'Produto excluído com sucesso!'));
	}
	else{
		echo json_encode(array('code' => 0, 'msg' => 'Erro!'));
	}	

}


// Lista um produto cadastrado, filtrando pelo ID
function listarProdutosPorId($id){

	$conexao = conecta_bd();
	
	$sql = "SELECT * FROM produto WHERE id = $id";

	$result = executar_sql($conexao, $sql);		

	$resposta = array("Produtos" => array());

	if ($result) {
	    
	    while ($row = $result->fetch_assoc()) {

	    	// $respostaAux = array();

	    	// $respostaAux['Codigo'] = $row->id;
	    	// $respostaAux['NomeProduto'] = $row->nome;

	    	$resposta["Produtos"][] = $row;

	    }
	}

	echo json_encode($resposta);

}

// Lista um produto cadastrado, filtrando pelo Nome
function listarProdutosPorNome($nome){

	$conexao = conecta_bd();
	
	$sql = "SELECT * FROM produto WHERE nome LIKE '$nome%'";

	$result = executar_sql($conexao, $sql);		

	$resposta = array("Produtos" => array());

	if ($result) {
	    
	    while ($row = $result->fetch_assoc()) {

	    	// $respostaAux = array();

	    	// $respostaAux['Codigo'] = $row->id;
	    	// $respostaAux['NomeProduto'] = $row->nome;

	    	$resposta["Produtos"][] = $row;

	    }
	}

	echo json_encode($resposta);

}


// Cadastrar um produto
function cadastrarProduto($dados){

	$dados = json_decode($dados);	

	$conexao = conecta_bd();

	$nome = $dados->nome;
	$descricao = $dados->descricao;
	$valor = $dados->valor;	

	$sql = "INSERT INTO produto (nome, descricao, valor) VALUES ('$nome', '$descricao', $valor)";	

	$result = executar_sql($conexao, $sql);

	if ($result) {
	    echo json_encode(array('code' => 1, 'msg' => 'Produto cadastrado com sucesso!'));
	}
	else{
		echo json_encode(array('code' => 0, 'msg' => 'Erro!'));
	}

}

// Editar um produto
function editarProduto($dados, $id){

	$dados = json_decode($dados);	

	$conexao = conecta_bd();

	$nome = $dados->nome;
	$descricao = $dados->descricao;
	$valor = $dados->valor;	

	$sql = "UPDATE produto SET nome='$nome', descricao='$descricao', valor=$valor WHERE id = $id";	

	$result = executar_sql($conexao, $sql);

	if ($result) {
	    echo json_encode(array('code' => 1, 'msg' => 'Produto alterado com sucesso!'));
	}
	else{
		echo json_encode(array('code' => 0, 'msg' => 'Erro!'));
	}

}

if($acao == 'listarProdutos'){

	listarProdutos();

}
elseif($acao == 'listarProdutosPorId'){

	$id = $_GET['idProduto'];

	listarProdutosPorId($id);

}
elseif($acao == 'listarProdutosPorNome'){

	$nome = $_GET['nomeProduto'];

	listarProdutosPorNome($nome);

}
elseif($acao == 'cadastrarProduto'){	

	$dados = file_get_contents("php://input");

	cadastrarProduto($dados);

}
elseif($acao == 'excluirProdutoPorId'){

	$id = $_GET['idProduto'];

	excluirProdutoPorId($id);

}
elseif($acao == 'editarProduto'){

	$id = $_GET['idProduto'];
	$dados = file_get_contents("php://input");

	editarProduto($dados, $id);

}

?>