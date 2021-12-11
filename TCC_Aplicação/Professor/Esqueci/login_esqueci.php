<?php
//Este arquivo é responsavel por validar o login, seja este um sucesso ou não

session_start();
// Permite o uso de sessões no codigo

include('../../conexao.php');
// Conecta a pagina conexao.php, permitindo o uso de $conexao, que nos conecta ao banco de dados

if(empty($_POST['usuario']) || empty($_POST['email']) || empty($_POST['cpf'])) {
	header('Location: esqueci_senha.php');
	exit();
}
// Garante que a pagina login_esqueci.php não possa ser diretamente acessada, sem preencher os campos usuario e senha na pagina professor.php, neste caso redireciona para a pagina professor.php

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
// Conecta $usuario a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por mei de $conexao

$email = mysqli_real_escape_string($conexao, $_POST['email']);
// Conecta $senha a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por mei de $conexao

$cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
// Conecta $senha a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por mei de $conexao

$query = "select usuario from usuario where usuario = '{$usuario}' and email = '{$email}' and cpf = md5('{$cpf}')";
// Verifica se os valores recebidos pelo formulario estão presentes no banco de dados, selecionando o valor do campo login da tabela usuario onde as colunas usuario e senha tem valores que correspondem aqueles contidos em $usuario e $senha

$querys = "select nome from usuario where usuario = '{$usuario}' and email = '{$email}' and cpf = md5('{$cpf}')";
// Verifica se os valores recebidos pelo formulario estão presentes no banco de dados, selecionando o valor do campo nome da tabela usuario onde as colunas usuario e senha tem valores que correspondem aqueles contidos em $usuario e $senha

$querysq = "select email from usuario where usuario = '{$usuario}' and email = '{$email}' and cpf = md5('{$cpf}')";
// Verifica se os valores recebidos pelo formulario estão presentes no banco de dados, selecionando o valor do campo email da tabela usuario onde as colunas usuario e senha tem valores que correspondem aqueles contidos em $usuario e $senha

$result = mysqli_query($conexao, $query);
// Executa o comando da $query no banco de dados, usando $conexao e $query como parametros

$results = mysqli_query($conexao, $querys);
// Executa o comando da $query no banco de dados, usando $conexao e $query como parametros

$resultsq = mysqli_query($conexao, $querysq);
// Executa o comando da $querysq no banco de dados, usando $conexao e $querysq como parametros

$row = mysqli_num_rows($result);
// Tranforma o resultado da variavel anterior em um numero correspondente a quantidade de linhas, que corresponde a quantidade de resultados positivos na consulta

if($row == 1) {
	$usuario_bd = mysqli_fetch_assoc($result);
	$_SESSION['usuario'] = $usuario_bd['usuario'];
	// Atribui o valor de $usuario_bd['usuario'] para $usuario_bd['usuario'];, sendo que este teve seu valor obtido pela execução de $result no banco de dados
	$usuario_db = mysqli_fetch_assoc($results);
	$_SESSION['nome'] = $usuario_db['nome'];
	// Atribui o valor de $usuario_db['nome'] para $usuario_bd['nome'];, sendo que este teve seu valor obtido pela execução de $results no banco de dados
	$usuario_bdb = mysqli_fetch_assoc($resultsq);
	$_SESSION['email'] = $usuario_bdb['email'];
	// Atribui o valor de $usuario_db['nome'] para $usuario_bd['nome'];, sendo que este teve seu valor obtido pela execução de $results no banco de dados
	header('Location: ../operacao.php');
	exit();
	// Se o usuario estiver presente, o codigo redireciona para a pagina funcoes.php junto do valor $_SESSION['usuario'], ativando sua notificação correspondente em funcoes.php
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: esqueci_senha.php');
	exit();
	// Se o usuario não estiver presente, o codigo redireciona para a pagina professor.php junto do valor $_SESSION['nao_autenticado'], ativando sua notificação correspondente em professor.php
}