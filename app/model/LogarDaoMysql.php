<?php
namespace App\Model;

class LogarDaoMysql implements LogarDao
{
    public function login(Logar $l) 
    {
        $array = [];
  
        $query = "SELECT id FROM usuarios WHERE email = ? AND senha = ?";
        $stmt = Conexao::Con()->prepare($query);
        $stmt->bindValue(1, $l->getEmail());
        $stmt->bindValue(2, $l->getSenha());
        $stmt->execute();
       
        if($stmt->rowCount()>0) {
            $array = $stmt->fetch(\PDO::FETCH_ASSOC);
            $_SESSION['login-session'] = $array['id'];
    
            return true;
        } else {
            return false;
        }
    }
    
    public function logout()
    {
        
    }
    
    public function checkLogin()
    {
       if(!empty($_SESSION['login-session'])) {
           return true;
       } else {
           return false;
       }
    }
    
}