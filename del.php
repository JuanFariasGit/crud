<?php
require_once "vendor/autoload.php";

$pessoa    = new App\Model\Pessoa;
$pessoaDao = new App\Model\PessoaDaoMysql;

if($_SERVER['REQUEST_METHOD'] == "GET"):

    $pessoaDao->delete($_REQUEST['id']);    
    header("Location: index.php");

endif;