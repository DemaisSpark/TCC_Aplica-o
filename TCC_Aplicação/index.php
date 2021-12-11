<?php
//Este comando permite o uso de sessões.
session_start();
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
    <link rel="stylesheet" href="css/bulma.min.css" />
    <!-- Link do arquivo CSS Bulma -->
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <!-- Link do arquivo CSS Login -->
</head>

<body>
    <!-- Corpo do site -->
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <div class="box">
                    <!-- Contem a caixa portal aluno e seu botão --> 
                    <h3 class="title has-text-grey">Portal Aluno</h3>
                    <!-- nomeia a caixa portal aluno --> 
                        <div class="field">
                            <div class="control">
                                <button onclick="window.location.href='./Aluno/aluno.php'" class="button is-block is-link is-large is-fullwidth">Visualizar Cursos</button>
                                <!-- Define a presença e funcionamento do botão Visualizar Cursos, que redireciona para a pagina aluno.php-->
                            </div>
                        </div>   
                    </div>
                    <div class="box">
                    <!-- Contem a caixa portal professor e seu botão --> 
                    <h3 class="title has-text-grey">Portal Professor</h3>
                    <!-- nomeia a caixa portal professor --> 
                        <div class="field">
                            <div class="control">
                                <button onclick="window.location.href='./Professor/professor.php'" class="button is-block is-link is-large is-fullwidth">Organizar Cursos</button>
                                <!-- Define a presença e funcionamento do botão Organizar Cursos, que redireciona para a pagina professor.php-->
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>