<?php

use Source\Conexao, Source\ServiceUsuario, Source\Usuario;

require_once "IConexao.php";
require_once "Conexao.php";
require_once "IUsuario.php";
require_once "Usuario.php";
require_once "IServiceUsuario.php";
require_once "ServiceUsuario.php";
require_once "Conn.php";

$conn = new Conexao($dns, $user, $pass);
$usuario = new Usuario;
$service = new ServiceUsuario($conn, $usuario);

$usuario = $service->pegaDados('edu@edu.com');
echo 'Nome: '.$usuario[0]['nome'].'<br> \n';
echo 'Email: '.$usuario[0]['email'];

var_dump($usuario);