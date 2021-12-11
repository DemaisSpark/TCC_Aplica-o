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
    <title>SISTEMA DE VERIFICAÇÂO DE VAGAS TCC</title>
    <!-- Titulo do site, localizado na aba -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Fonte a ser usado no site -->
    <link rel="stylesheet" href="../css/bulma.min.css" />
    <!-- Link do arquivo CSS Bulma -->
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <!-- Link do arquivo CSS Login -->
</head>

<body>
<!-- Corpo do site -->
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Sistema de Login</h3>
                    <!-- Texto dentro do Formulario de login -->

                    <?php
                    if(isset($_SESSION['nao_autenticado'])):
                        //condição para a notificação aparecer, proveniente da pagina login.php
                    ?>
                    <div class="notification is-danger">
                      <p>ERRO: Usuário ou senha inválidos.</p>
                      <!-- Texto da notificação -->
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    // Previne que a notificação apareça ao entrar no site
                    ?>
                    <!-- Notificação que aparece caso o usuario digite valores inválidos nos campos usuário ou senha -->

                    <div class="box">
                    <!-- Contem os campos login e senha, junto do botão entrar -->
                        <form action="login.php" method="POST">
                        <!-- Formulario que redireciona os valores inserido para arquivo login.php, por meio do metodo POST, quando o botão de entrar enviar uma resposta -->
                            
                        <div class="field">
                        <!-- Contem o campo usuario-->
                            <div class="control">
                                <input name="usuario" name="text" class="input is-large" placeholder="Seu usuário" autofocus="" required>
                                <!-- Define o funcionamento e parametros do campo login -->
                            </div>
                        </div>

                        <div class="field">
                        <!-- Contem o campo senha-->
                            <div class="control">
                                <input name="senha" class="input is-large" type="password" placeholder="Sua senha" required>
                                <!-- Define o funcionamento e parametros do campo senha -->
                            </div>
                        </div>

                        <button type="submit" class="button is-block is-link is-large is-fullwidth">Entrar</button>
                        <!-- Define a presença e funcionamento do botão Entrar -->
                        </form>

                        <div class="field">
                            <div class="control">
                                <!-- truque de formatação-->
                            </div>
                        </div>   

                        <div class="field">
                                <div class="control">
                                <button onclick="window.location.href='cadastro.php'" class="button is-block is-link is-large is-fullwidth">Cadastrar</button>
                            <!-- Define a presença e funcionamento do botão cadastra, que redireciona para a pagina cadastro.php-->
                            </div>
                        </div>  
                        <span style="color:#3273dc;"><a href="Esqueci/esqueci_senha.php"> Esqueci Senha </a></span>
                    </div>
                    <div class="control">
                        <button onclick="window.location.href='../index.php'" class="button is-block is-link is-small">Retornar</button>
                        <!-- Define a presença e funcionamento do botão Retornar-->
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>