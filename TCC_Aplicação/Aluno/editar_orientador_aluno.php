<?php
//session_start();
//Este comando permite o uso de sessões.
include('verifica_login_aluno.php');
//Este comando estabelece a necessidade da conexão ser validada pelo arquivo verifica_login_aluno.php, antes de poder prosseguir, fazendo a verificação da presença de $_SESSION['nome']
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
    <link rel="stylesheet" href="../css/bulma.min.css"/>
    <!-- Link do arquivo CSS Bulma -->
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <!-- Link do arquivo CSS Login -->
    <link rel="stylesheet" href="../styles/debug.css">
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
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-8 is-offset-2" style = "position: relative; bottom: 50px;">
                    <h3 class="title has-text-centered has-text-grey">Orientadores do Curso: <?php echo $_SESSION['nome_curso'];?></h3>
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
                            listar_orientador_aluno(pagina, qnt_result_pg); 
                            // Chamar a Função para listar os registros, passando as variaveis pagina e qnt_result_pg como parametros
                        });
                        
                        function listar_orientador_aluno(pagina, qnt_result_pg){
                        // Função que cria a lista, usando pagina e qnt_result_pg como seus parametros
                            var dados = {
                            // Declara as variaveis que serão usadas na função
                                pagina: pagina,
                                // recebe o valor contido em pagina, neste caso; 1
                                qnt_result_pg: qnt_result_pg
                                // recebe o valor contido em qnt_result_pg, neste caso; 50
                            }
                            $.post('listar_orientador_aluno.php', dados , function(retorna){
                            // Executa a função do script e aireciona a função para a pagina listar_orientador_aluno.php
                                $("#conteudo").html(retorna);
                                //Subtitui o valor no seletor id="conteudo"
                            });
                        }
                    </script>
                    <!-- Final dos comandos script responsaveis pelo funcionamento da Listagem -->
                </div>
                
                <div class="control">
                    <button onclick="window.location.href='../logout.php'" class="button is-block is-link is-small">Logout</button>
                    <!-- Define a presença e funcionamento do botão Retornar-->
                </div>

            </div>
        </div>
    </section>
</body>
</html>