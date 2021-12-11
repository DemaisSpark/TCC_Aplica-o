<?php
session_start();
// Permite o uso de sessões no codigo
session_destroy();
// Finaliza o uso de sessões no codigo
header('Location: index.php');
// Redireciona para a pagina index.php
exit();