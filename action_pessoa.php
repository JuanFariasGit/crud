<?php
declare(strict_types=1);

require_once "vendor/autoload.php";

$pessoa    = new App\Model\Pessoa();
$pessoaDao = new App\Model\PessoaDaoMysql();

switch($_GET['option']) {
    case "create":
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $pessoa->setCpf($_REQUEST['cpf']);
            $pessoa->setNome($_REQUEST['nome']);

            $pessoaDao->create($pessoa);
            die(header("Location: http://".$_SERVER['HTTP_HOST']."/crud"));
        } 
    break;    

    case "update":
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $pessoa->setId($_REQUEST['id']);
            $pessoa->setCpf($_REQUEST['cpf']);
            $pessoa->setNome($_REQUEST['nome']);
            
            $pessoaDao->update($pessoa);
            die(header("Location: http://".$_SERVER['HTTP_HOST']."/crud"));
        } 
    break;

    case "delete":
        if($_SERVER['REQUEST_METHOD'] == "GET") {
            $pessoaDao->delete($_REQUEST['id']);        
            die(header("Location: http://".$_SERVER['HTTP_HOST']."/crud"));
        }
    break;
}


