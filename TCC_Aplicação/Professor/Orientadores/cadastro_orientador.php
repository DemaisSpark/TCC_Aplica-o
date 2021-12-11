<?php
//session_start();
//Este comando permite o uso de sessões.
include('../verifica_login.php');
//Este comando estabelece a necessidade da conexão ser validada pelo arquivo verifica_login.php, antes de poder prosseguir, fazendo a verificação da presença de $_SESSION['usuario']
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
</head>

<body>
    <!-- Corpo do site -->
    <section class="hero is-success is-fullheight">
    <!-- Seção que contem todos os elementos do site -->
    <section class="hero has-background-black" >
			<div class="hero-body" style = "padding: 1.0rem 1.0rem;">
				<div class="container">
                <h1 class="title is-size-4 has-text-white">Nome: <?php echo $_SESSION['nome'];?> | Login: <?php echo $_SESSION['usuario'];?> | Email: <?php echo $_SESSION['email'];?> | <a href="../logout.php"> Logout </a> | <a href="../Perfil/edicao_perfil.php"> Editar </a></h1>
                    <!-- Apresenta o nome do usuario e uma função de logout-->
				</div>
			</div>
	</section>
    <!-- Seção que contem a aba de cabeçalho da pagina-->
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4" style = "position: relative; bottom: 50px;">
                    <h3 class="title has-text-centered has-text-grey">Inserir Orientadores</h3>
                    <!-- Texto acima da caixas -->

                    <?php
                    if(isset($_SESSION['status_cadastro_orientador'])):
                    //condição para a notificação aparecer, proveniente da pagina cadastrar_orientador.php
                    ?>
                    <div class="notification is-success">
                      <p>Orientador inserida!</p>
                      <p>Para inserir orientadors, acesse a pagina <a href="../Alterar/editar_orientador.php">editar</a></p>
                      <!-- Mensagem de sucesso de cadastro -->
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['status_cadastro_orientador']);
                    //previne notificação apareça ao entrar no site
                    ?>

                    <?php
                    if(isset($_SESSION['orientador_existe'])):
                    //condição para a notificação aparecer, proveniente da pagina cadastrar_orientador.php
                    ?>
                    <div class="notification is-info">
                        <p>O usuario em questão já esta relacionado a este curso. Informe outro e tente novamente.</p>
                        <!-- Mensagem de erro no cadastro -->
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['orientador_existe']);
                    //previne notificação apareça ao entrar no site
                    ?>

                    <?php
                    if(isset($_SESSION['curso_não_existe'])):
                    //condição para a notificação aparecer, proveniente da pagina cadastrar_orientador.php
                    ?>
                    <div class="notification is-info">
                        <p>Por favor insira um Login de Curso cadastrado</p>
                        <!-- Mensagem de erro no cadastro -->
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['curso_não_existe']);
                    //previne notificação apareça ao entrar no site
                    ?>

                    <?php
                    if(isset($_SESSION['orientador_não_existe'])):
                    //condição para a notificação aparecer, proveniente da pagina cadastrar_orientador.php
                    ?>
                    <div class="notification is-info">
                        <p>Por favor insira um usuario cadastrado como Orientador</p>
                        <!-- Mensagem de erro no cadastro -->
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['orientador_não_existe']);
                    //previne notificação apareça ao entrar no site
                    ?>

                    <div class="box is-centered" style = "width: 100%">
                    <!-- Caixa que irá conter os botões desta pagina -->
                        <form action="cadastrar_orientador.php" method="POST">
                        <!-- Esta função redireciona o site ao arquivo insere.php-->

                            <div class="field">
                            <!-- Contem o campo orientador-->
                                <div class="control">
                                    <input name="orientador" type="text" class="input is-large" placeholder="Login do Orientador" autofocus="" required />
                                    <!-- Define o funcionamento e parametros do campo orientador -->
                                </div>
                            </div>

                            <div class="field">
                            <!-- Contem o campo nome_orientador-->
                                <div class="control">
                                    <input name="nome_orientador" type="text" class="input is-large" placeholder="Nome Completo do Orientador" required />
                                    <!-- Define o funcionamento e parametros do campo nome_orientador -->
                                </div>
                            </div>
                            
                            <div class="field">
                            <!-- Contem o campo instituição-->
                                <div class="control">
                                    <input name="contato_orientador" type="email" class="input is-large" placeholder="Email do Orientador" required />
                                    <!-- Define o funcionamento e parametros do campo instituição -->
                                </div>
                            </div>

                            <div class="field">
                            <!-- Contem o campo instituição-->
                                <div class="control">
                                    <input name="instituição_orientador" type="text" class="input is-large" placeholder="Nome da Instituição/Centro de Ensino" required />
                                    <!-- Define o funcionamento e parametros do campo instituição -->
                                </div>
                            </div>

                            <div class="field">
                            <!-- Contem o campo instituição-->
                                <div class="control">
                                    <input name="curso_login" type="text" class="input is-large" placeholder="Login do Curso Mestre" required />
                                    <!-- Define o funcionamento e parametros do campo instituição -->
                                </div>
                            </div>

                            <input name="gerenciador_orientador" type="hidden" value="<?php echo $_SESSION['usuario'];?>" />
                            <!-- Envia o valor de $_SESSION['usuario'] como gerenciador_orientador para ser usado na pagina cadastrar_orientador.php -->

                            <input name="gerenciador_nome_orientador" type="hidden" value="<?php echo $_SESSION['nome'];?>" />
                            <!-- Envia o valor de $_SESSION['nome'] como gerenciador_nome_orientador para ser usado na pagina cadastrar_orientador.php -->

                            <input name="gerenciador_contato_orientador" type="hidden" value="<?php echo $_SESSION['email'];?>" />
                            <!-- Envia o valor de $_SESSION['email'] como gerenciador_nome_orientador para ser usado na pagina cadastrar_orientador.php -->

                            <input name="status_vagas" type="hidden" value="fechado" />
                            <!-- Envia o valor de status_vagas ara ser usado na pagina cadastrar_orientador.php -->

                            <input name="temas" type="hidden" value="Texto" />
                            <!-- Envia o valor de temas ara ser usado na pagina cadastrar_orientador.php -->

                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Inserir</button>
                            <!-- Define a presença e funcionamento do botão Inserir-->
                        </form>
                    </div>
                    <div class="control">
                        <button onclick="window.location.href='../funcoes.php'" class="button is-block is-link is-small">Retornar</button>
                        <!-- Define a presença e funcionamento do botão Retornar-->
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>