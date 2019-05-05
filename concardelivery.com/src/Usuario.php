<?php
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 17/11/2017
 * Time: 10:50
 */

namespace Source;


class Usuario implements IUsuario
{
    private $id, $nome, $email, $telefone, $senha;

    public function getId()
    {
        return $this->id;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getTelefone()
    {
        return $this->telefone;
    }
    public function getSenha()
    {
        return $this->senha;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
        return $this;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
        return $this;
    }
}