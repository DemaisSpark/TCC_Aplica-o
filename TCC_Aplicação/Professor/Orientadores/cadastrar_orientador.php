<?php

session_start();
// Permite o uso de sessões no codigo

include("../../conexao.php");
// conecta a pagina conexao.php, permitindo o uso de $conexao, que nos conecta ao banco de dados

$orientador = mysqli_real_escape_string($conexao, trim($_POST['orientador']));
// Conecta $orientador a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao

$nome_orientador = mysqli_real_escape_string($conexao, trim($_POST['nome_orientador']));
// Conecta $nome_orientador a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao

$contato_orientador = mysqli_real_escape_string($conexao, trim($_POST['contato_orientador']));
// Conecta $curso a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao

$instituição_orientador = mysqli_real_escape_string($conexao, trim($_POST['instituição_orientador']));
// Conecta $instituição_orientador a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao

$curso_login = mysqli_real_escape_string($conexao, trim($_POST['curso_login']));
// Conecta $curso a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao

$gerenciador_orientador = mysqli_real_escape_string($conexao, trim($_POST['gerenciador_orientador']));
// Conecta $gerenciador_orientador a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao

$gerenciador_nome_orientador = mysqli_real_escape_string($conexao, trim($_POST['gerenciador_nome_orientador']));
// Conecta $gerenciador_nome_orientador a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao

$gerenciador_contato_orientador = mysqli_real_escape_string($conexao, trim($_POST['gerenciador_contato_orientador']));
// Conecta $curso a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao

$status_vagas = mysqli_real_escape_string($conexao, trim($_POST['status_vagas']));
// Conecta $status_vagas a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao

$temas = mysqli_real_escape_string($conexao, trim($_POST['temas']));
// Conecta $temas a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao

$sql = "select count(*) as total from orientador where orientador = '$orientador' AND curso_login = '$curso_login'";
// Seleciona o numero total de valores correspondentes a $orientador, contidos na tabela orientador

$result = mysqli_query($conexao, $sql);
// Executa o comando de $sql no banco de dados, usando $conexao e $sql como parametros

$row = mysqli_fetch_assoc($result);
// Tranforma o resultado da variavel anterior em um numero correspondente a quantidade de linhas, que corresponde a quantidade de resultados positivos na consulta

if($row['total'] == 1) {
	$_SESSION['orientador_existe'] = true;
	header('Location: cadastro_orientador.php');
	exit;
	// Se o orientador já estiver presente no banco de dados, o codigo redireciona a pagina cadastro_orientador.php e o valor $_SESSION['orientador_existe'], ativando sua notificação correspondente em cadastro_orientador.php
}

$sqlsq = "select count(*) as total from curso where curso = '$curso_login'";
// Seleciona o numero total de valores correspondentes a $curso, por meio de count(*), contidos na tabela curso. Por meio do comando select na tabela usuario onde o campo usuario deve ter valor igua ao valor contido em $curso

$resultsq = mysqli_query($conexao, $sqlsq);
// Executa o comando de $sqls no banco de dados, usando $conexao e $sqls como parametros

$rowsq = mysqli_fetch_assoc($resultsq);
// Tranforma o resultado da variavel anterior em um numero correspondente a quantidade de linhas, que corresponde a quantidade de resultados positivos na consulta

if($rowsq['total'] == 0) {
	$_SESSION['curso_não_existe'] = true;
	header('Location: cadastro_orientador.php');
	exit;
	// Se o usuario não estiver presente no banco de dados, o codigo redireciona a pagina cadastro_orientador.php e o valor $_SESSION['curso_não_existe'], ativando sua notificação correspondente em cadastro_orientador.php
}

$sqls = "select count(*) as total from usuario where usuario = '$orientador'";
// Seleciona o numero total de valores correspondentes a $orientador, por meio de count(*), contidos na tabela usuario. Por meio do comando select na tabela usuario onde o campo usuario deve ter valor igua ao valor contido em $orientador

$results = mysqli_query($conexao, $sqls);
// Executa o comando de $sqls no banco de dados, usando $conexao e $sqls como parametros

$rows = mysqli_fetch_assoc($results);
// Tranforma o resultado da variavel anterior em um numero correspondente a quantidade de linhas, que corresponde a quantidade de resultados positivos na consulta

if($rows['total'] == 0) {
	$_SESSION['orientador_não_existe'] = true;
	header('Location: cadastro_orientador.php');
	exit;
	// Se o usuario não estiver presente no banco de dados, o codigo redireciona a pagina cadastro_orientador.php e o valor $_SESSION['orientador_não_existe'], ativando sua notificação correspondente em cadastro_orientador.php
}

$sql = "INSERT INTO orientador (orientador, nome_orientador, contato_orientador, instituição_orientador, curso_login, gerenciador_orientador, gerenciador_nome_orientador, gerenciador_contato_orientador, status_vagas, temas, data_orientador) VALUES ('$orientador', '$nome_orientador', '$contato_orientador', '$instituição_orientador', '$curso_login', '$gerenciador_orientador', '$gerenciador_nome_orientador', '$gerenciador_contato_orientador', '$status_vagas', '$temas', NOW())";
//Insere no banco de dados os seguintes valores em suas respectivas colunas

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro_orientador'] = true;
}
// Se a consulta for validada com sucesso, o codigo retorna $_SESSION['status_cadastro_orientador'], ativando sua notificação correspondente em cadastro.php

$conexao->close();
// Encerra a conexão com o banco de dados

header('Location: cadastro_orientador.php');
// Redireciona para a pagina cadastro_orientador.php ao fim da conexão que teve uma consulta validada com sucesso, sem interrupções no codigo
exit;
?>