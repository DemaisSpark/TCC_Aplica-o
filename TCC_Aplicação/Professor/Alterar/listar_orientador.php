<?php

session_start();
// Permite o uso de sessões no codigo

include("../../conexao.php");
// Conecta a pagina conexao.php, permitindo o uso de $conexao, que nos conecta ao banco de dados

$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
// Recebe o valor de pagina, proveniente da pagina editar_orientador.php

$qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
// Recebe o valor de qnt_result_pg, proveniente da pagina editar_orientador.php

$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;
// Calcular o inicio da visualização, neste caso o valor de $pagina

$user = ($_SESSION['usuario']);
// Conecta $user a variavel contida em $_SESSION['usuario'], que esta presente na pagina listar_curso

$gerenciador = mysqli_real_escape_string($conexao, $user);
// Conecta $gerenciador a variavel $user e a conexão estabelecida com o BD por meio de $conexao

$result_orientador = "SELECT * FROM orientador WHERE gerenciador_orientador = '$gerenciador' ORDER BY orientador_id DESC LIMIT $inicio, $qnt_result_pg";
// Seleciona todas as colunas da tabela orientador, ordenando elas pelo campo orientador_id, em ordem decrescente

$resultado_orientador = mysqli_query($conexao, $result_orientador);
// Executa o comando de $result_orientador no banco de dados, usando $conexao e $result_orientador como parametros

if(($resultado_orientador) AND ($resultado_orientador->num_rows != 0)){
//Verificar se encontrou resultado na tabela "orientador"
?>
<!-- Não pode ser escrito em php -->
<table class="table table-striped table-bordered table-hover">
<!-- Inicia a tabela que sera usada para exiir os conteudos do banco de dados selecionados pelo comando de $resultado_orientador  -->
	<thead>
		<tr>
			<th>ID</th>
			<!-- Cria a coluna na tabela -->
			<th>Orientador</th>
			<!-- Cria a coluna orientador na tabela -->
			<th>Nome Orientador</th>
			<!-- Cria a coluna Nome orientador na tabela -->
			<th>Login Curso</th>
			<!-- Cria a coluna curso na tabela -->
			<th>Instituição</th>
			<!-- Cria a coluna Instituição na tabela -->
		</tr>
	</thead>
	<tbody>
		<?php
		while($row_orientador = mysqli_fetch_assoc($resultado_orientador)){
		// Instrui o codigo a pegar o conteudo das linhas do banco de dados, seguindo o comando de $resultado_orientador
			?>
			<tr>
				<th><?php echo $row_orientador['orientador_id']; ?></th>
				<!-- Chama os valores correspondentes a orientador_id -->
				<td><?php echo $row_orientador['orientador']; ?></td>
				<!-- Chama os valores correspondentes a orientador -->
				<td><?php echo $row_orientador['nome_orientador']; ?></td>
				<!-- Chama os valores correspondentes a orientador -->
				<th><?php echo $row_orientador['curso_login']; ?></th>
				<!-- Chama os valores correspondentes a orientador_id -->
				<td><?php echo $row_orientador['instituição_orientador']; ?></td>
				<!-- Chama os valores correspondentes a instituição_orientador -->
				<td>
				    <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $row_orientador['orientador_id']; ?>">Visualizar</button>
					<!-- Estabelece o funcionamento do botão Visualizar que chama uma janela modal que apresenta as informações relativas a uma determinda linha da tabela orientador, com base no parametro orientador_id -->
					
					<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $row_orientador['orientador_id']; ?>" data-whatevernome="<?php echo $row_orientador['nome_orientador']; ?>" data-whateverdetalhes="<?php echo $row_orientador['instituição_orientador']; ?>">Editar</button>
					<!-- Estabelece o funcionamento do botão Editar, que chama uma janela modal que permite a edição dos dados de uma determinda linha da tabela orientador, retornando os parametros contidos nesse botão para o script localizado na pagina editar_orientador -->

					<a href="processa_apagar_orientador.php?id=<?php echo $row_orientador['orientador_id']; ?>"><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>
					<!-- Estabelece o funcionamento do botão Apagar, enviando o valor de orientador_id, que e atrebuido a variavel id e enviado para a pagina processa_apagar_orientador.php e redireciona a execução para o codigo contido nela -->
				</td>
			</tr>

			<!-- Inicio dos comandos responsaveis pelo funcionamento da Janela Modal Visualizar -->
			<div class="modal fade" id="myModal<?php echo $row_orientador['orientador_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<!-- Estabelece os parametros de funcionamento da janela modal, permitindo que esta seja chamada por um botão, por meio do parametro orientador_id que o botão tambem usa -->
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						<!-- Cabeçalho da Janela Modal -->
							<h4 class="modal-title text-center" id="myModalLabel">ID Orientador: <?php echo $row_orientador['orientador_id']; ?></h4>
							<!-- Titulo da parte superior Esquerda da Janela Modal, correspondendo ao valor orientador da linha em questão -->
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<!-- Botão de fechar da parte superior direita da Janela Modal -->
						</div>
						<div class="modal-body">
							<!-- Corpo da Janela Modal -->
							<p>Login Orientador: <?php echo $row_orientador['orientador']; ?></p>
							<!-- Apresenta os dados contidos na coluna orientador -->
							<p>Nome orientador: <?php echo $row_orientador['nome_orientador']; ?></p>
							<!-- Apresenta os dados contidos na coluna orientador_id -->
							<p>Login Curso: <?php echo $row_orientador['curso_login']; ?></p>
							<!-- Apresenta os dados contidos na coluna orientador -->
							<p>Instituição: <?php echo $row_orientador['instituição_orientador']; ?></p>
							<!-- Apresenta os dados contidos na coluna instituição_orientador -->
							<p>Gerenciador: <?php echo $row_orientador['gerenciador_nome_orientador']; ?></p>
							<!-- Apresenta os dados contidos na coluna gerenciador_nome_orientador -->
							<p>Data Criação: <?php echo $row_orientador['data_orientador']; ?></p>
							<!-- Apresenta os dados contidos na coluna instituição_curso -->
						</div>
					</div>
				</div>
			</div>
			<!-- Inicio dos comandos responsaveis pelo funcionamento da Janela Modal Visualizar -->
			<?php
		}?>
	</tbody>
</table>
<?php

$result_pg = "SELECT COUNT(orientador_id) AS num_result FROM orientador";
// Faz a paginação, obtendo o numero de linhas da tabela orientador por meio da da contagem da coluna orientador_id, sendo que o valor deste numero é atrinuido a num_result
$resultado_pg = mysqli_query($conexao, $result_pg);
// Executa o comando de $result_pg no banco de dados, usando $conexao e $result_pg como parametros
$row_pg = mysqli_fetch_assoc($resultado_pg);
// Lé o resultado da execução de $resultado_pg

$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
// Passa o valor da quantidade total de paginas e passa esse valor para $quantidade_pg

$max_links = 2;
// Limitar os link Antes e Depois

echo '<nav aria-label="paginacao">';
echo '<ul class="pagination">';
echo '<li class="page-item">';
echo "<span class='page-link'><a href='#' onclick='listar_orientador(1, $qnt_result_pg)'>Primeira</a></span>";
// Cria o link da pagina inicial, retornando a função listar_orientador(1, $qnt_result_pg) quando clicado, aparecendo como a palavra Primeira
echo '</li>';

for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
// Imprime as duas paginas anteriores, que estão apos a primeira pagina, por meio da operação $pagina - $max_links, que corresponde a $pagina - 1 que sofre incrementações de acordo com as paginas
	if($pag_ant >= 1){
	// Impede que o codigo imprima paginas menor que 1, ou seja 0 e -1
		echo "<li class='page-item'><a href='#' onclick='listar_orientador($pag_ant, $qnt_result_pg)'>$pag_ant </a></li>";
		// Cria o link da pagina inicial, retornando a função listar_orientador($pag_ant, $qnt_result_pg) quando clicado
	}
}

echo '<li class="page-item active">';
echo '<span class="page-link">';
echo " $pagina ";
// Pagina atual, que o usuario está visualizado
echo '</span>';
echo '</li>';

for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
// Imprime as duas paginas posteriores, que estão apos a pagina atual, por meio da operação $pagina + $max_links, que corresponde a $pagina +max_links que sofre incrementações de acordo com as paginas
	if($pag_dep <= $quantidade_pg){
	// Impede que o codigo imprima paginas maiores que o numero maximo de paginas
		echo "<li class='page-item'><a href='#' onclick='listar_orientador($pag_dep, $qnt_result_pg)'>$pag_dep</a></li>";
		// Cria o link da pagina final, retornando a função listar_orientador($pag_ant, $qnt_result_pg) quando clicado
	}
}

echo '<li class="page-item">';
echo "<span class='page-link'><a href='#' onclick='listar_orientador($quantidade_pg, $qnt_result_pg)'>Última</a></span>";
// Cria o link da pagina final, retornando a função listar_orientador($quantidade_pg, $qnt_result_pg) quando clicado, aparecendo como a palavra Última
echo '</li>';
echo '</ul>';
echo '</nav>';

}else{
	echo "<div class='alert alert-danger' role='alert'>Nenhum orientador encontrado para este usuário!</div>";
	// Retorna este texto caso a verificação termine em fracasso
}
