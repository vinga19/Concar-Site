<?php
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 17/11/2017
 * Time: 10:46
 */

namespace Source;

interface IUsuario
{
    public function getId();
    public function getNome();
    public function getEmail();
    public function getTelefone();
    public function getSenha();

    public function setId($id);
    public function setNome($nome);
    public function setEmail($email);
    public function setTelefone($telefone);
    public function setSenha($senha);
}