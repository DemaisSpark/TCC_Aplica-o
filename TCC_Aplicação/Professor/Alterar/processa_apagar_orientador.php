<?php
// Pagina responsavel por receber os dados do botão apagar e executar a alteração no banco de dados

	include_once("../../conexao.php");
	// Conecta a pagina conexao.php, permitindo o uso de $conexao, que nos conecta ao banco de dados

	$orientador_id = $_GET['id'];
	// Conecta $orientador_id a variavel recebida pelo formulario, neste caso id, que usa seu valor como variavel de entrada, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao

	$result_orientador = "DELETE FROM orientador WHERE orientador_id  = '$orientador_id'";
	// Deleta na a tabela orientador todas as linhas cujo o valor do campo orientador_id é igual ao valor proveniente de $orientador_id
	
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=editar_orientador.php'>
				<script type=\"text/javascript\">
					alert(\"Orientador Apagada com Sucesso\");
				</script>
			";
		// Se uma alteração no banco de dados for bem sucedida o codigo retorna este alerta
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=editar_orientador.php'>
				<script type=\"text/javascript\">
					alert(\"Orientador não foi Apagado com Sucesso.\");
				</script>
			";
		// Se uma alteração no banco de dados não for bem sucedida o codigo retorna este alerta
		}?>
	</body>
</html>

<?php $conexao->close(); ?>
<!-- Fechar a conexão com o BD -->