<?php
//Este arquivo é responsavel por verificar a presença de $_SESSION['curso'], prevnindo acesso indevido ao resto das paginas

session_start();
// Permite o uso de sessões no codigo

if(!$_SESSION['curso']) {
	header('Location: aluno.php');
	exit();
	// Caso não se esteja logado como um usuario, o codigo te redireciona para a pagina aluno.php, previnindo acessos indevidos a outras paginas
}