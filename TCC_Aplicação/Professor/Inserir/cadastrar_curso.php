<?php

session_start();
// Permite o uso de sessões no codigo

include("../../conexao.php");
// conecta a pagina conexao.php, permitindo o uso de $conexao, que nos conecta ao banco de dados

$nome_curso = mysqli_real_escape_string($conexao, trim($_POST['nome_curso']));
// Conecta $nome_curso a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao

$curso = mysqli_real_escape_string($conexao, trim($_POST['curso']));
// Conecta $curso a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao

$instituição_curso = mysqli_real_escape_string($conexao, trim($_POST['instituição_curso']));
// Conecta $instituição a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao

$senha_curso = mysqli_real_escape_string($conexao, trim(md5($_POST['senha_curso'])));
// Conecta $senha_curso a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao

$gerenciador = mysqli_real_escape_string($conexao, trim($_POST['gerenciador']));
// Conecta $gerenciador a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao

$gerenciador_nome = mysqli_real_escape_string($conexao, trim($_POST['gerenciador_nome']));
// Conecta $gerenciador_nome a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao

$sql = "select count(*) as total from curso where curso = '$curso'";
// Seleciona o numero total de valores correspondentes a $curso, contidos na tabela curso

$result = mysqli_query($conexao, $sql);
// Executa o comando de $sql no banco de dados, usando $conexao e $sql como parametros

$row = mysqli_fetch_assoc($result);
// Transforma o resultado da variavel anterior em um numero correspondente a quantidade de linhas, que corresponde a quantidade de resultados positivos na consulta

if($row['total'] == 1) {
	$_SESSION['curso_existe'] = true;
	header('Location: cadastro_curso.php');
	exit;
	// Se o curso já estiver presente no banco de dados, o codigo redireciona a pagina cadastro_curso.php e o valor $_SESSION['curso_existe'], ativando sua notificação correspondente em cadastro_curso.php
}

$sql = "INSERT INTO curso (curso, senha_curso, nome_curso, instituição_curso, gerenciador, gerenciador_nome, data_curso) VALUES ('$curso', '$senha_curso', '$nome_curso', '$instituição_curso', '$gerenciador', '$gerenciador_nome', NOW())";
//Insere no banco de dados os seguintes valores em suas respectivas colunas

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro_curso'] = true;
}
// Se a consulta for validada com sucesso, o codigo retorna $_SESSION['status_cadastro_curso'], ativando sua notificação correspondente em cadastro.php

$conexao->close();
// Encerra a conexão com o banco de dados

header('Location: cadastro_curso.php');
// Redireciona para a pagina cadastro_curso.php ao fim da conexão
exit;
?>