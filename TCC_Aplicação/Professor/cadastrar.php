<?php
session_start();
// Permite o uso de sessões no codigo

include("../conexao.php");
// conecta a pagina conexao.php, permitindo o uso de $conexao, que nos conecta ao banco de dados

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
// Conecta $nome a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao

$usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
// Conecta $usuario a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao

$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
// Conecta $email a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao

$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
// Conecta $senha a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao, sendo que md5 codifica o campo por razões de segurança

$cpf = mysqli_real_escape_string($conexao, trim(md5($_POST['cpf'])));
// Conecta $cpf a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao, sendo que md5 codifica o campo por razões de segurança

$sql = "select count(*) as total from usuario where usuario = '$usuario'";
// Seleciona o numero total de valores correspondentes a $usuario, por meio de count(*), contidos na tabela usuario. Por meio do comando select na tabela usuario onde o campo usuario deve ter valor igua ao valor contido em $usuario

$result = mysqli_query($conexao, $sql);
// Executa o comando de $sql no banco de dados, usando $conexao e $sql como parametros

$row = mysqli_fetch_assoc($result);
// Tranforma o resultado da variavel anterior em um numero correspondente a quantidade de linhas, que corresponde a quantidade de resultados positivos na consulta

if($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: cadastro.php');
	exit;
	// Se o usuario já estiver presente no banco de dados, o codigo redireciona a pagina cadastro.php e o valor $_SESSION['usuario_existe'], ativando sua notificação correspondente em cadastro.php
}

$sqls = "select count(*) as total from usuario where email = '$email'";
// Seleciona o numero total de valores correspondentes a $email, por meio de count(*), contidos na tabela usuario. Por meio do comando select na tabela usuario onde o campo email deve ter valor igua ao valor contido em $email

$results = mysqli_query($conexao, $sqls);
// Executa o comando de $sqls no banco de dados, usando $conexao e $sqls como parametros

$rows = mysqli_fetch_assoc($results);
// Tranforma o resultado da variavel anterior em um numero correspondente a quantidade de linhas, que corresponde a quantidade de resultados positivos na consulta

if($rows['total'] == 1) {
	$_SESSION['email_existe'] = true;
	header('Location: cadastro.php');
	exit;
	// Se o email já estiver presente no banco de dados, o codigo redireciona a pagina cadastro.php e o valor $_SESSION['email_existe'], ativando sua notificação correspondente em cadastro.php
}

$sqlsq = "select count(*) as total from usuario where cpf = '$cpf'";
// Seleciona o numero total de valores correspondentes a $cpf, por meio de count(*), contidos na tabela usuario. Por meio do comando select na tabela usuario onde o campo cpf deve ter valor igua ao valor contido em $cpf

$resultsq = mysqli_query($conexao, $sqlsq);
// Executa o comando de $sqlsq no banco de dados, usando $conexao e $sqlsq como parametros

$rowsq = mysqli_fetch_assoc($resultsq);
// Tranforma o resultado da variavel anterior em um numero correspondente a quantidade de linhas, que corresponde a quantidade de resultados positivos na consulta

if($rowsq['total'] == 1) {
	$_SESSION['cpf_existe'] = true;
	header('Location: cadastro.php');
	exit;
	// Se o cpf já estiver presente no banco de dados, o codigo redireciona a pagina cadastro.php e o valor $_SESSION['cpf_existe'], ativando sua notificação correspondente em cadastro.php
}

$sql = "INSERT INTO usuario (usuario, senha, nome, email, cpf) VALUES ('$usuario', '$senha', '$nome', '$email', '$cpf')";
//Insere no banco de dados os valores nome, usuario, senha, data_cadastro em suas respectivas colunas

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}
// Se a consulta for valiada com sucesso, o codigo retorna um valor postivo para $_SESSION['status_cadastro'], ativando sua notificação correspondente em cadastro.php

$conexao->close();
// Encerra a conexão com o banco de dados

header('Location: cadastro.php');
// Redireciona para a pagina cadastro.php ao fim da conexão
exit;
?>