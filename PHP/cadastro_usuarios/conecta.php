<?php

//Atribuição do campos vindo do formulário para variavel	

$nome 			 = $_POST['nome'];
$email 			 = $_POST['email'];
$comentarios  	 = $_POST['comentarios'];
$erro 			 = 0;

//VALINDANDO OS CAMPOS

//Verifica se o campo nome não está em branco
if (empty($nome) OR strstr($nome, ' ')==false) {
	echo "Favor digitar o seu nome corretamente.<br>";
	$erro = 1;
}

//Verifica se o campo email está preenchido corretamente
if (strlen($email)< 8 || strstr($email, '@')==false) {
	echo "Favor digitar o seu email corretamente.<br>";
	$erro = 1;
}

//Verifica se o campo comentarios está vazio
if (empty($comentarios)) {
	echo "Favor entre com algum comentário.<br>";
	$erro = 1;
}

//Verifica se não houve erro - neste caso chama a include para inserir os dados
if ($erro == 0) {
	echo "Todos os dados foram digitados corretamente.<br>";
	
}

//CONEXAO BANCO DE DADOS
		//cria a conexao mysqli_connect('localizacao BD', 'usuario de acesso', 'senha', 'banco de dados')
		$conexao = mysqli_connect('localhost', 'root', '', 'fatec');

		//ajusta o charset de comunicação entre a aplicação e o banco de dados
		mysqli_set_charset($conexao, 'utf8');

		//verifica a conexão
		if ($conexao->connect_error) {
		    die("Falha ao realizar a conexão: " . $conexao->connect_error);
} 


//INSERINDO DADOS NA TABELA 
$sql = "INSERT INTO cadastro VALUES";
$sql .= "('','$nome','$email',  '$comentarios')";

if ($conexao->query($sql) === TRUE) {
	echo  "Cadastro realizado  com sucesso!";
} else {
	echo "Erro: " . $sql . "<br>" . $conexao->error;
}

$conexao->close();
?>