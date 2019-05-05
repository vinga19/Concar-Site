<?php
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 17/11/2017
 * Time: 10:55
 */

namespace Source;


interface IServiceUsuario
{
    public function cadastrar($nome, $email, $senha);
    public function logar($email);
}