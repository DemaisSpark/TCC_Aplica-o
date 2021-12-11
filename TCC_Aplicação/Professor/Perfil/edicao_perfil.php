<?php
session_start();
// Permite o uso de sessões no codigo
?>

<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SISTEMA DE VERIFICAÇÂO DE VAGAS TCC<</title>
    <!-- Titulo do site, localizado na aba -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Fonte a ser usado no site -->
    <link rel="stylesheet" href="../../css/bulma.min.css" />
    <!-- Link do arquivo CSS Bulma -->
    <link rel="stylesheet" type="text/css" href="../../css/login.css">
    <!-- Link do arquivo CSS Login -->
</head>

<body>
<!-- Corpo do site -->
    <section class="hero is-success is-fullheight">
    <!-- Seção que contem todos os elementos do site -->

    <section class="hero has-background-black" >
			<div class="hero-body" style = "padding: 1.0rem 1.0rem;">
				<div class="container">
                <h1 class="title is-size-4 has-text-white">Nome: <?php echo $_SESSION['nome'];?> | Login: <?php echo $_SESSION['usuario'];?> | Email: <?php echo $_SESSION['email'];?> | <a href="../../logout.php"> Logout | </a></h1>
                    <!-- Apresenta o nome do usuario e uma função de logout-->
				</div>
			</div>
	</section>
    <!-- Seção que contem a aba de cabeçalho da pagina-->

        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Edição de Perfil</h3>
                    <!-- Texto dentro do Formulario de Cadastro -->

                    <?php
                        if(isset($_SESSION['status_cadastro'])):
                        //condição para a notificação aparecer, proveniente da pagina cadastrar.php
                    ?>
                    <div class="notification is-success">
                      <p>Edição efetuada!</p>
                      <p>Faça login informando o seu usuário e senha <a href="../professor.php">aqui</a></p>
                      <!-- Mensagem de sucesso de cadastro, utilizando o retorno de $_SESSION['status_cadastro'], apresenta um link que redireciona para a pagina onde o login deve ser feito -->
                    </div>
                    <?php
                        endif;
                        unset($_SESSION['status_cadastro']);
                        // Previne que a notificação apareça ao entrar no site
                    ?>

                    <?php
                        if(isset($_SESSION['email_existe'])):
                        //condição para a notificação aparecer, proveniente da pagina cadastrar.php
                    ?>
                    <div class="notification is-info">
                        <p>O email escolhido já existe. Informe outro e tente novamente.</p>
                        <!-- Mensagem de falha de cadastro, utilizando o retorno de $_SESSION['email_existe'] -->
                    </div>
                    <?php
                        endif;
                        unset($_SESSION['email_existe']);
                        // Previne que a notificação apareça ao entrar no site
                    ?>

                    <?php
                        if(isset($_SESSION['cpf_existe'])):
                        //condição para a notificação aparecer, proveniente da pagina cadastrar.php
                    ?>
                        <div class="notification is-info">
                        <p>O CPF escolhido já existe. Informe outro e tente novamente.</p>
                        <!-- Mensagem de falha de cadastro, utilizando o retorno de $_SESSION['email_existe'] -->
                    </div>
                    <?php
                        endif;
                        unset($_SESSION['cpf_existe']);
                        // Previne que a notificação apareça ao entrar no site
                    ?>
                    
                    <div class="box">
                    <!-- Contem os campos usuario, nome, email, senha, junto do botão entrar -->
                        <form action="editar_perfil.php" method="POST">
                        <!-- Formulario que redireciona os valores inserido para arquivo cadastrar.php, por meio do metodo POST, quando o botão de entrar enviar uma resposta -->

                            <div class="field">
                            <!-- Contem o campo Nome-->
                                <div class="control">
                                    <input name="nome" type="text" class="input is-large" placeholder="<?php echo $_SESSION['nome'];?>" required>
                                    <!-- Define o funcionamento e parametros do campo nome -->
                                </div>
                            </div>

                            <div class="field">
                            <!-- Contem o campo email-->
                                <div class="control">
                                    <input name="email" type="email" class="input is-large" placeholder="<?php echo $_SESSION['email'];?>" required>
                                    <!-- Define o funcionamento e parametros do campo email -->
                                </div>
                            </div>
                            
                            <div class="field">
                            <!-- Contem o campo senha-->
                                <div class="control">
                                    <input name="senha" class="input is-large" type="password" placeholder="Senha" required>
                                    <!-- Define o funcionamento e parametros do campo senha -->
                                </div>
                            </div>
                            
                            <div class="field">
                            <!-- Contem o campo Nome-->
                                <div class="control">
                                    <input name="cpf" type="text" class="input is-large" placeholder="CPF" required>
                                    <!-- Define o funcionamento e parametros do campo nome -->
                                </div>
                            </div>

                            <input name="usuario" type="hidden" value="<?php echo $_SESSION['usuario'];?>" />

                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Editar</button>
                            <!-- Define a presença e funcionamento do botão Entrar -->
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