<?php
namespace App\Model;

class Logar
{
    private $email;
    private $senha;
    
    public function getEmail() 
    {
        return $this->email;
    }

    public function getSenha() 
    {
        return $this->senha;
    }

    public function setEmail($email) 
    {
        $this->email = $email;
    }

    public function setSenha($senha) 
    {
        $this->senha = md5($senha);
    }
    
}

interface LogarDao
{
    public function login(Logar $l);
    public function logout();
    public function checkLogin();
}