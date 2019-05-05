<?php

namespace Source;

class Conexao implements IConexao
{
    private $dns;
    private $usuario;
    private $senha;

    function __construct($dns, $usuario, $senha)
    {
        $this->dns = $dns;
        $this->usuario = $usuario;
        $this->senha = $senha;
    }

    public function conexao(){
        return new \PDO($this->dns, $this->usuario, $this->senha,
            array(
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_PERSISTENT => false,
                \PDO::ATTR_EMULATE_PREPARES => false,
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            )
        );
    }
}