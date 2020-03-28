<?php
session_start();
require_once "vendor/autoload.php";

$logar = new App\Model\Logar();
$logarDao = new App\Model\LogarDaoMysql();

if($logarDao->checkLogin()) {

    $pessoa    = new App\Model\Pessoa();
    $pessoaDao = new App\Model\PessoaDaoMysql();

    if($_SERVER['REQUEST_METHOD'] == "GET") {
        $pessoaDao->delete($_REQUEST['id']);

        die(header("Location: http://".$_SERVER['HTTP_HOST']."/crud"));
    }
} else {
    die(header("Location: http://".$_SERVER['HTTP_HOST']."/crud/login"));
}
