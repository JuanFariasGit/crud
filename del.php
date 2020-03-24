<?php
require_once "vendor/autoload.php";

$pessoa    = new \model\Pessoa;
$pessoaDao = new \model\PessoaDaoMysql;

if($_SERVER['REQUEST_METHOD'] == "GET"):

    $pessoaDao->delete($_REQUEST['id']);    
    header("Location: index.php");

endif;