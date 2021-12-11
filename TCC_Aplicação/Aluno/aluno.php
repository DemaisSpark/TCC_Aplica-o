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
                    <h3 class="title has-text-grey">Insira o Login/Senha TCC</h3>
                    <!-- Texto acima da caixa -->

                    <?php
                    if(isset($_SESSION['curso_nao_autenticado'])):
                    //condição para a notificação aparecer, proveniente da pagina login_aluno
                    ?>
                    <div class="notification is-danger">
                        <p>ERRO: Key inválida.</p>
                        <!-- Mensagem de erro -->
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['curso_nao_autenticado']);
                    //previne que a notificação apareça ao entrar no site
                    ?>

                    <!-- aparece caso o usuario digite valores inválidos no campo PIN -->
                    <div class="box">
                    <!-- Contem a caixa onde se insere a PIN e seu botão -->
                        <form action="login_aluno.php" method="POST">
                        <!-- Esta função redireciona o site ao arquivo login_aluno.php quando o botão de entrar enviar uma resposta -->
                            
                            <div class="field">
                            <!-- Contem o campo PIN-->
                                <div class="control">
                                    <input name="curso" name="text" class="input is-large" placeholder="Login do Curso" autofocus="" required />
                                    <!-- Define a presença e funcionamento do campo PIN -->
                                </div>
                            </div>

                            <div class="field">
                            <!-- Contem o campo senha-->
                                <div class="control">
                                    <input name="senha_curso" class="input is-large" type="password" placeholder="Senha do Curso" required>
                                    <!-- Define o funcionamento e parametros do campo senha -->
                                </div>
                            </div>

                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Entrar</button>
                            <!-- Define a presença e funcionamento do botão entrar -->
                        </form>
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