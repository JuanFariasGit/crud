<?php
declare(strict_types=1);

namespace App\Model;

class Logar
{
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $senha;
    
    public function getEmail() : string
    {
        return $this->email;
    }

    public function getSenha() : string
    {
        return $this->senha;
    }

    public function setEmail(string $email) : void
    {
        $this->email = $email;
    }

    public function setSenha(string $senha) : void
    {
        $this->senha = md5($senha);
    }
    
}

interface LogarDao
{
    public function login(Logar $l) : bool;
    public function logout() : void;
    public function checkLogin() : bool;
}