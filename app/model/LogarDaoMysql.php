<?php
declare(strict_types=1);

namespace App\Model;

class LogarDaoMysql implements LogarDao
{
    public function login(Logar $l) : bool
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
    
    public function logout() : void
    {
        if($_GET['url'] == 'action_login/logout') {
            unset($_SESSION['login-session']);
            die(header("Location: http://".$_SERVER['HTTP_HOST']."/crud/login"));
        }    
    }
    
    public function checkLogin() : bool
    {
       if(!empty($_SESSION['login-session'])) {
           return true;
       } else {
           return false;
       }
    }
    
}