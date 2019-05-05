<?php
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 17/11/2017
 * Time: 10:56
 */

namespace Source;


class ServiceUsuario implements IServiceUsuario
{
    private $db, $usuario, $tabela = "concar.usuarios";

    public function getDb(){
        return $this->db;
    }

    function __construct(IConexao $db, IUsuario $usuario)
    {
        $this->db = $db->conexao();
        $this->usuario = $usuario;
    }
    public function cadastrar($nome, $email, $senha)
    {
        $query = "INSERT INTO {$this->tabela} (nome, email, senha) VALUES (:nome, :email, :senha )";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        try{
            return $stmt->execute();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
    public function verificaUnicidade($email)
    {
        $query = "SELECT * FROM {$this->tabela} WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function logar($email)
    {
        $query = "SELECT senha FROM {$this->tabela} WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $senhaReal = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        if(count($senhaReal) <= 0){
            echo 'Email não Registrado';
            return false;
        }
        $s = implode(':', $senhaReal[0]);
        return $s;
    }
    public function pegaDados($email)
    {
        $query = "SELECT * FROM {$this->tabela} WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}