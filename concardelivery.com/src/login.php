<?php

use Source\Conexao, Source\ServiceUsuario, Source\Usuario;

require_once "IConexao.php";
require_once "Conexao.php";
require_once "IUsuario.php";
require_once "Usuario.php";
require_once "IServiceUsuario.php";
require_once "ServiceUsuario.php";
require_once "Conn.php";

session_start();

$email = strtolower(trim($_POST['emailLogin']));
$senha = trim($_POST['senhaLogin']);

$conn = new Conexao($dns, $user, $pass);
$usuario = new Usuario;
$service = new ServiceUsuario($conn, $usuario);

$usuario->setEmail($email);
$usuario->setSenha($senha);

$Email = $usuario->getEmail();
$Senha = $usuario->getSenha();

$senhaReal = $service->logar($Email);

if(password_verify($Senha, $senhaReal) && $senhaReal != false)
{
    $usuarioValido = $service->pegaDados($Email);
    $_SESSION['nome'] = $usuarioValido[0]['nome'];
    $_SESSION['email'] = $Email;
    $_SESSION['senha'] = $Senha;
    
    header("Location: ../public/dash.php");
}
else if($senhaReal != false)
{
    echo "Senha Incorreta!";
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header("Location: ../public/index.html");
    
}