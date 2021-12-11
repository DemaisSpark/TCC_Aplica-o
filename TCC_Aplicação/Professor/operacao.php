<?php
//session_start();
//Este comando permite o uso de sessões.
include('verifica_login.php');
//Este comando estabelece a necessidade da conexão ser validada pelo arquivo verifica_login.php, antes de poder prosseguir, fazendo a verificação da presença de $_SESSION['curso']
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
    <link rel="stylesheet" href="../css/bulma.min.css" />
    <!-- Link do arquivo CSS Bulma -->
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <!-- Link do arquivo CSS Login -->
    <link rel="stylesheet" href="styles/debug.css">
</head>

<body>
    <!-- Corpo do site -->
    <section class="hero is-success is-fullheight">
    <!-- Seção que contem todos os elementos do site -->
    <section class="hero has-background-black" >
			<div class="hero-body" style = "padding: 1.0rem 1.0rem;">
				<div class="container">
                <h1 class="title is-size-4 has-text-white">Nome: <?php echo $_SESSION['nome'];?> | Login: <?php echo $_SESSION['usuario'];?> | Email: <?php echo $_SESSION['email'];?> | <a href="../logout.php"> Logout </a> | <a href="Perfil/edicao_perfil.php"> Editar </a></h1>
                    <!-- Apresenta o nome do usuario e uma função de logout-->
				</div>
			</div>
	</section>
    <!-- Seção que contem a aba de cabeçalho da pagina-->
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <div class="box">
                    <!-- Contem a caixa portal aluno e seu botão --> 
                    <h3 class="title has-text-grey">Gerenciador de Cursos</h3>
                    <!-- nomeia a caixa portal aluno --> 
                        <div class="field">
                            <div class="control">
                                <button onclick="window.location.href='funcoes.php'" class="button is-block is-link is-large is-fullwidth">Organizar Cursos</button>
                                <!-- Define a presença e funcionamento do botão Visualizar Cursos, redirecionando para a pagina funcoes.php-->
                            </div>
                        </div>   
                    </div>
                    <div class="box">
                    <!-- Contem a caixa portal professor e seu botão --> 
                    <h3 class="title has-text-grey">Orientador de Cursos</h3>
                    <!-- nomeia a caixa portal professor --> 
                        <div class="field">
                            <div class="control">
                                <button onclick="window.location.href='Orientador/editar_orientador_curso.php'" class="button is-block is-link is-large is-fullwidth">Visualizar Cursos</button>
                                <!-- Define a presença e funcionamento do botão Organizar Cursos, redirecionando para a pagina editar_disciplina_orientador.php-->
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>