<?php
// Pagina responsavel por receber os dados do formulario da janela modal de edição e executar a alteração no banco de dados

	include_once("../../conexao.php");
	// Conecta a pagina conexao.php, permitindo o uso de $conexao, que nos conecta ao banco de dados

	$curso_id = mysqli_real_escape_string($conexao, $_POST['curso_id']);
	// Conecta $curso_id a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao

	$nome_curso = mysqli_real_escape_string($conexao, trim($_POST['nome_curso']));
	// Conecta $curso a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao

	$instituição_curso = mysqli_real_escape_string($conexao, trim($_POST['instituição_curso']));
	// Conecta $instituição_curso a variavel recebida pelo formulario, por meio do metodo POST e da conexão estabelecida com o BD por meio de $conexao

	echo "$curso_id - $nome_curso - $instituição_curso";
	// Imprime estas variaveis que serão usadas no seguinte comando para o banco de dados

	$result_curso = "UPDATE curso SET nome_curso ='$nome_curso', instituição_curso = '$instituição_curso' WHERE curso_id = '$curso_id'";
	// Atualiza a tabela curso com os valores recebidos por $snome_curso e $instituição_curso, tendo $curso_id como parametro de busca
	
	$resultado_curso = mysqli_query($conexao, $result_curso);	
	// Executa o comando de $result_curso no banco de dados, usando $conexao e $result_curso como parametros
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conexao) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=editar_curso.php'>
				<script type=\"text/javascript\">
					alert(\"Curso alterado com Sucesso.\");
				</script>
			";
		// Se uma alteração no banco de dados for bem sucedida o codigo retorna este alerta
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=editar_curso.php'>
				<script type=\"text/javascript\">
					alert(\"Curso não foi alterado com Sucesso.\");
				</script>
			";
		// Se uma alteração no banco de dados não for bem sucedida o codigo retorna este alerta
		}?>
	</body>
</html>

<?php $conexao->close(); ?>
<!-- Fechar a conexão com o BD -->