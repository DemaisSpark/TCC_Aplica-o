<?php
// Pagina responsavel por receber os dados do formulario da janela modal de edição e executar a alteração no banco de dados

	include_once("../../conexao.php");
	// Conecta a pagina conexao.php, permitindo o uso de $conexao, que nos conecta ao banco de dados

	$orientador_id = mysqli_real_escape_string($conexao, $_POST['orientador_id']);
	// Conecta $orientador_id a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao

	$status_vagas = mysqli_real_escape_string($conexao, trim($_POST['status_vagas']));
	// Conecta $orientador_id a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao

	$temas = mysqli_real_escape_string($conexao, $_POST['temas']);
	// Conecta $orientador_id a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao

	echo "$orientador_id - $status_vagas - $temas";
	// Imprime estas variaveis que serão usadas no seguinte comando para o banco de dados

	$result_orientador = "UPDATE orientador SET status_vagas = '$status_vagas', temas = '$temas' WHERE orientador_id = '$orientador_id'";
	// Atualiza a tabela orientador com os valores recebidos por orientador_id e $instituição, tendo $orientador_id como parametro de busca
	
	$resultado_orientador = mysqli_query($conexao, $result_orientador);	
	// Executa o comando de $result_orientador no banco de dados, usando $conexao e $result_orientador como parametros
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conexao) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=editar_orientador_curso.php'>
				<script type=\"text/javascript\">
					alert(\"Orientador alterada com Sucesso.\");
				</script>
			";
		// Se uma alteração no banco de dados for bem sucedida o codigo retorna este alerta
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=editar_orientador_curso.php'>
				<script type=\"text/javascript\">
					alert(\"Orientador não foi alterado com Sucesso.\");
				</script>
			";
		// Se uma alteração no banco de dados não for bem sucedida o codigo retorna este alerta
		}?>
	</body>
</html>

<?php $conexao->close(); ?>
<!-- Fechar a conexão com o BD -->