<?php

use Source\Conexao, Source\ServiceUsuario, Source\Usuario;

require_once "IConexao.php";
require_once "Conexao.php";
require_once "IUsuario.php";
require_once "Usuario.php";
require_once "IServiceUsuario.php";
require_once "ServiceUsuario.php";
require_once "Conn.php";

// if($_POST){
//     //check $_POST vars are set, exit if any missing
// 	if(!isset($_POST["nome"]) || !isset($_POST["email"]) || !isset($_POST["senha"]))
// 	{
// 		$output = json_encode(array('type'=>'error', 'text' => 'Input fields are empty!'));
//         echo "Erro primeira condição";
//         die($output);
// 	}

// 	//Sanitize input data using PHP filter_var().
// 	$user_Name        = filter_var($_POST["nome"], FILTER_SANITIZE_STRING);
// 	$user_Email       = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
// 	$user_Senha     = filter_var($_POST["senha"], FILTER_SANITIZE_STRING);
	
// 	//additional php validation
// 	if(strlen($user_Name)<3) // If length is less than 3 it will throw an HTTP error.
// 	{
// 		$output = json_encode(array('type'=>'error', 'text' => 'Nome muito curto ou campo estava vazio!'));
// 		die($output);
// 	}
// 	if(!filter_var($user_Email, FILTER_VALIDATE_EMAIL)) //email validation
// 	{
// 		$output = json_encode(array('type'=>'error', 'text' => 'Por favor entre com um email válido!'));
// 		die($output);
// 	}
	
// 	if(strlen($user_Senha)<5) //check emtpy message
// 	{
// 		$output = json_encode(array('type'=>'error', 'text' => 'Senha muito curta!'));
// 		die($output);
// 	}
    
//     $nome = trim($user_Name);
//     $senha = password_hash(trim($user_Senha), PASSWORD_DEFAULT);
//     $email = strtolower(trim($user_Email));

//     $usuario = new Usuario;
//     $conn = new Conexao($dns, $user, $pass);
//     $service = new ServiceUsuario($conn, $usuario);

//     // $usuario->setNome($nome);
//     // $usuario->setSenha($senha);
//     // $usuario->setEmail($email);
        
// 	if($service->verificaUnicidade($email)!= NULL)
// 	{
//         echo "Erro segunda condição";
//         $output = json_encode(array('type'=>'error', 'text' => 'Email já cadastrado'));    
//         die($output);
// 	}else{
//         echo "Passou!";
// 		$output = json_encode(array('type'=>'message', 'text' => 'Olá '.$user_Name .', você foi cadastrado com sucesso!'));
//         $service->cadastrar($nome, $email, $senha);
//         header("Location: ../public/dash.html");
//         die($output);
// 	}
// }

// ini_set('default_charset', 'UTF-8');

session_start();

$nome = trim($_POST['nome']);
$senha = password_hash(trim($_POST['senha']), PASSWORD_DEFAULT);
$email = strtolower(trim($_POST['email']));

//echo strlen($nome)." ".strlen($senha)." ".strlen($email);

if($nome != NULL
    && $senha!= NULL
    && $email!= NULL
    && strlen($nome) <= 100
    && strlen($senha) <= 100
    && strlen($email) <= 100
    && strlen($nome) >= 3
    && strlen($email) >= 4
    && strlen($senha) >= 6
){
    $usuario = new Usuario;
    $conn = new Conexao($dns, $user, $pass);
    $service = new ServiceUsuario($conn, $usuario);

    $usuario->setNome($nome);
    $usuario->setSenha($senha);
    $usuario->setEmail($email);

    $Nome = $usuario->getNome();
    $Senha = $usuario->getSenha();
    $Email = $usuario->getEmail();

    //echo $Nome." ".$Senha." ".$Email;

    if(!$service->verificaUnicidade($Email)){
        $service->cadastrar($Nome, $Email, $Senha);
        $retorno = array("resposta"=>"2");
        echo json_encode($retorno);
        $_SESSION['email'] = $Email;
        $_SESSION['senha'] = $Senha;
        $_SESSION['nome'] = $Nome;
        header("Location: ../public/dash.php");
    }else{
        $retorno = array("resposta"=>"1");
        echo json_encode($retorno);
        
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        unset($_SESSION['nome']);
        header("Location: ../public/index.html");
        //echo "Cadastro não efetuado! Email já cadastrado!";
    }

}else{
    $retorno = array("resposta"=>"0");
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    unset($_SESSION['nome']);
    header("Location: ../public/index.html");
    echo json_encode($retorno);
    //echo 'Todos os campos devem ser preenchidos!!!';
}
