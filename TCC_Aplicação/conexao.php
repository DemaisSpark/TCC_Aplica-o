<?php
//Este arquivo faz a ponte entre o PHP e o banco de dados MYSQL, para isso este deve conter os dados correspondentes ao MySQL Connections criado no MySQL Workbench

define('HOST', '127.0.0.1');
// Define o endereço IP do host que sera usado para conectar ao MySQL, contem o valor padrão do MYSQL Workbench

define('USUARIO', 'root');
// Define o usuario que sera usado para conectar ao MySQL, contem o nome padrão do MYSQL Workbench

define('SENHA', 'senha123');
// Define a senha que sera usado para conectar ao MySQL, conten a senha escolhida na criação do MYSQL Workbench

define('DB', 'tcc_db');
// Define o nome do banco dedo banco de dados que usaremos dentro do MySQL, conten o nome do BD criado dentro do MYSQL Workbench

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');
// Função que recebe os dados necessarios para estabelecer a conexão com o MySQL, em conjunto com um comando para o caso desta conexão não acontecer.
