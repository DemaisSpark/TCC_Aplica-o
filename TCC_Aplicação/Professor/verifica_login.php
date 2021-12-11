<?php
//Este arquivo é responsavel por verificar a presença de $_SESSION['usuario'], previnindo acessos indevidos ao resto das paginas

session_start();
// Permite o uso de sessões no codigo

if(!$_SESSION['usuario']) {
	header('Location: professor.php');
	exit();
	// Caso não se esteja logado como um usuario, o codigo te redireciona para professor.php, previnindo acessos indevidos
}