<?php 
declare(strict_types=1);

session_start();
require_once "vendor/autoload.php";

$logar    = new App\Model\Logar();
$logarDao = new App\Model\LogarDaoMysql();

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $logar->setEmail($_REQUEST['email']);
    $logar->setSenha($_REQUEST['senha']);

    if($logarDao->login($logar)) {
        die(header("Location: http://".$_SERVER['HTTP_HOST'].'/'.explode('/', $_SERVER['REQUEST_URI'])[1]));
    } else {
        die(header("Location: http://".$_SERVER['HTTP_HOST'].'/'.explode('/', $_SERVER['REQUEST_URI'])[1]."/login"));
    }
}

$logarDao->logout();
