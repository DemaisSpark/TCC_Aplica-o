<?php
//session_start();
//Este comando permite o uso de sessões.
include('../verifica_login.php');
//Este comando estabelece a necessidade da conexão ser validada pelo arquivo verifica_login.php, antes de poder prosseguir, fazendo a verificação da presença de $_SESSION['nome']
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SISTEMA DE VERIFICAÇÂO DE VAGAS TCC</title>
    <!-- Titulo do site, localizado na aba -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Fonte a ser usado no site -->
    <link rel="stylesheet" href="../../css/bulma.min.css" />
    <!-- Link do arquivo CSS Bulma -->
    <link rel="stylesheet" type="text/css" href="../../css/login.css">
    <!-- Link do arquivo CSS Login -->
    <link rel="stylesheet" href="../../styles/debug.css">
    <!-- Link do arquivo debug.css Login -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Link do JQuery -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- Link do arquivo CSS Bootstrap -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <!-- Link do arquivo popper do Bootstrap -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- Link do arquivo do Bootstrap -->
</head>

<body>
    <!-- Corpo do site -->
    <section class="hero is-success is-fullheight">
    <!-- Seção que contem todos os elementos do site -->
    <section class="hero has-background-black" >
			<div class="hero-body" style = "padding: 1.0rem 1.0rem;">
				<div class="container">
                <h1 class="title is-size-4 has-text-white">Nome: <?php echo $_SESSION['nome'];?> | Login: <?php echo $_SESSION['usuario'];?> | Email: <?php echo $_SESSION['email'];?> | <a href="../../logout.php"> Logout </a> | <a href="../Perfil/edicao_perfil.php"> Editar </a></h1>
                    <!-- Apresenta o nome do usuario e uma função de logout-->
				</div>
			</div>
	</section>
    <!-- Seção que contem a aba de cabeçalho da pagina-->
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-9 is-offset-2" style = "position: relative; bottom: 50px;">
                    <h3 class="title has-text-centered has-text-grey">Escolha o orientador a Editar (Gerenciador)</h3>
                    <div class="box">
                        
                    <span id="conteudo"></span>
                    <!-- Necessario para o funcionamento do script-->

                    <!-- Inicio dos comandos script responsaveis pelo funcionamento da Listagem -->
                    <script>
                        var qnt_result_pg = 50; 
                        // Quantidade de registros apresentados por página
                        var pagina = 1; 
                        // Página inicial
                        $(document).ready(function () {
                        // Executa a função do script
                            listar_orientador(pagina, qnt_result_pg); 
                            // Chamar a Função para listar os registros, passando as variaveis pagina e qnt_result_pg como parametros
                        });
                        
                        function listar_orientador(pagina, qnt_result_pg){
                        // Função que cria a lista, usando pagina e qnt_result_pg como seus parametros
                            var dados = {
                            // Declara as variaveis que serão usadas na função
                                pagina: pagina,
                                // recebe o valor contido em pagina, neste caso; 1
                                qnt_result_pg: qnt_result_pg
                                // recebe o valor contido em qnt_result_pg, neste caso; 50
                            }
                            $.post('listar_orientador.php', dados , function(retorna){
                            // Executa a função do script e aireciona a função para a pagina listar_orientador.php
                                $("#conteudo").html(retorna);
                                //Subtitui o valor no seletor id="conteudo"
                            });
                        }
                    </script>
                    <!-- Final dos comandos script responsaveis pelo funcionamento da Listagem -->
                </div>
                <div class="control">
                    <button onclick="window.location.href='../funcoes.php'" class="button is-block is-link is-small">Retornar</button>
                    <!-- Define a presença e funcionamento do botão Retornar-->
                </div>
            </div>
        </div>
    </section>

    <!-- Inicio dos comandos responsaveis pelo funcionamento da Janela Modal Editar -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <!-- Estabelece os parametros de funcionamento da janela modal, permitindo que esta seja chamada por um botão -->
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <!-- Cabeçalho da Janela Modal -->
                    <h4 class="modal-title" id="exampleModalLabel"></h4>
                    <!-- Titulo da parte superior Esquerda da Janela Modal-->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <!-- Botão de fechar da parte superior direita da Janela Modal -->
                </div>
                <div class="modal-body">
                <!-- Corpo da Janela Modal -->
                
                    <form method="POST" action="processa_orientador.php" enctype="multipart/form-data">
                    <!-- Cria o formulario cujo os valores serão redirecionados para o arquivo insere.php, funcionando de maneira similar ao outos formularios de cadastro-->
                        
                        <div class="form-group">
                        <!-- Contem o campo orientador-->
                        <label for="recipient-name" class="control-label">Nome orientador:</label>
                        <!-- Label acima do campo orientador-->
                        <input name="nome_orientador" type="text" class="form-control" id="recipient-name">
                        <!-- Caixa que permite a inserção de texto para alterar o valor de orientador, similar ao da pagina cadastro_orientador-->
                        </div>

                        <div class="form-group">
                        <!-- Contem o campo instituição-->
                        <label for="detalhes" class="control-label">Instituição:</label>
                        <!-- Label acima do campo instituição-->
                        <input name="instituição_orientador" type="text" class="form-control" id="detalhes">
                        <!-- Caixa que permite a inserção de texto para alterar o valor de instituição, similar ao da pagina cadastro_orientador-->
                        </div>

                        <input name="orientador_id" type="hidden" class="form-control" id="id-orientador" value="">
                        <!-- Transfere o valor de orientador_id para a pagina processa.php sem altera-lo, para que seja usado como um parametro -->

                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                        <!-- Botão Cancelar no rodape da Janela Modal -->
                        <button type="submit" class="btn btn-danger">Alterar</button>
                        <!-- Botão Alterar no rodape da Janela Modal -->

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Final dos comandos responsaveis pelo funcionamento da Janela Modal Editar -->

    <!-- Inicio dos comandos script responsaveis pelo funcionamento da Janela Modal Editar -->
    <script type="text/javascript">
        $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extrai o valor das colunas correspondente aos parametros contidos no botão da pagina listar orientador para ser usado na janela modal, nest caso orientador_id
        var recipientnome = button.data('whatevernome') // Extrai o valor das colunas correspondente aos parametros contidos no botão da pagina listar orientador para ser usado na janela modal, nest caso orientador
        var recipientdetalhes = button.data('whateverdetalhes') // Extrai o valor das colunas correspondente aos parametros contidos no botão da pagina listar orientador para ser usado na janela modal, neste caso instituição
        var modal = $(this) // Variavel que funciona como um recipiente para a atribuição das variaveis provenientes do botão editar, localizado na pagina listar_orientador
        modal.find('.modal-title').text('ID orientador: ' + recipient) // Utiliza o valor de orientador_id, extraido por whatever e atrebuido a variavel recipient
        modal.find('#id-orientador').val(recipient) // Utiliza o valor de orientador_id, extraido por whatever e atrebuido a variavel recipient
        modal.find('#recipient-name').val(recipientnome) // Utiliza o valor de orientador, extraido por whatevernome e atrebuido a variavel recipientnome
        modal.find('#detalhes').val(recipientdetalhes) // Utiliza o valor de instituição, extraido por whateverdetalhes e atrebuido a variavel recipientdetalhes
        // modal.find('#detalhes2').val(recipientdetalhes2) Utiliza o valor de instituição, extraido por whateverdetalhes e atrebuido a variavel recipientdetalhes
        // modal.find('#detalhes3').val(recipientdetalhes3) Utiliza o valor de instituição, extraido por whateverdetalhes e atrebuido a variavel recipientdetalhes
        })
    </script>
    <!-- Final dos comandos script responsaveis pelo funcionamento da Janela Modal Editar -->
</body>
</html>