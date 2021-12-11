<?php
//Este arquivo é responsavel por validar o login, seja este um sucesso ou não.

session_start();
// Permite o uso de sessões no codigo

include('../conexao.php');
// Conecta a pagina conexao.php, permitindo o uso de $conexao, que nos conecta ao banco de dados

if(empty($_POST['curso']) || empty($_POST['senha_curso'])) {
	header('Location: aluno.php');
	exit();
}
// Garante que a pagina login.php não possa ser diretamente acessada, sem preencher os campos curso e senha_curso na pagina aluno.php

$curso = mysqli_real_escape_string($conexao, $_POST['curso']);
// Conecta $curso a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por mei de $conexao

$senha_curso = mysqli_real_escape_string($conexao, $_POST['senha_curso']);
// Conecta $senha_curso a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por mei de $conexao

$query = "select curso from curso where curso = '{$curso}' and senha_curso = md5('{$senha_curso}')";;
// Verifica se os valores recebidos pelo formulario estão presentes no banco de dados, selecionando o valor curso da tabela curso onde o valor do campo curso é igual ao valor de $curso 

$querys = "select nome_curso from curso where curso = '{$curso}' and senha_curso = md5('{$senha_curso}')";
// Verifica se os valores recebidos pelo formulario estão presentes no banco de dados, selecionando o valor do campo nome da tabela usuario onde as colunas usuario e senha tem valores que correspondem aqueles contidos em $usuario e $senha

$result = mysqli_query($conexao, $query);
// Executa o comando da $query no banco de dados, usando $conexao e $query como parametros

$results = mysqli_query($conexao, $querys);
// Executa o comando da $query no banco de dados, usando $conexao e $query como parametros

$row = mysqli_num_rows($result);
// Tranforma o resultado da variavel anterior em um numero correspondente a quantidade de linhas, que corresponde a quantidade de resultados positivos na consulta

if($row == 1) {
	$curso_bd = mysqli_fetch_assoc($result);
	$_SESSION['curso'] = $curso_bd['curso'];
	// Atribui o valor de $usuario_bd['usuario'] para $usuario_bd['usuario'];, sendo que este teve seu valor obtido pela execução de $result no banco de dados
	$curso_db = mysqli_fetch_assoc($results);
	$_SESSION['nome_curso'] = $curso_db['nome_curso'];
	// Atribui o valor de $usuario_bd['usuario'] para $usuario_bd['usuario'];, sendo que este teve seu valor obtido pela execução de $result no banco de dados
	header('Location: editar_orientador_aluno.php');
	exit();
	// Se um resultado for encontrado, o codigo redireciona para a pagina editar_orientador_aluno.php junto do valor $_SESSION['curso'], ativando sua notificação correspondente em editar_orientador_aluno.php.php
} else {
	$_SESSION['curso_nao_autenticado'] = true;
	header('Location: aluno.php');
	exit();
	// Se nenhum resultado for encontrado, o codigo redireciona para a pagina aluno.php junto do valor $_SESSION['curso_nao_autenticado'], ativando sua notificação correspondente em aluno.php
}