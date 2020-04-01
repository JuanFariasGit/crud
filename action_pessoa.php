<?php
declare(strict_types=1);

session_start();
require_once "vendor/autoload.php";

$logar    = new App\Model\Logar();
$logarDao = new App\Model\LogarDaoMysql();   

if($logarDao->checkLogin()) {
    $pessoa    = new App\Model\Pessoa();
    $pessoaDao = new App\Model\PessoaDaoMysql();
    
    switch($_GET['option']) {
        case 1:
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $pessoa->setCpf($_REQUEST['cpf']);
                $pessoa->setNome($_REQUEST['nome']);
                $pessoaDao->create($pessoa);
                die(header("Location: http://".$_SERVER['HTTP_HOST']."/crud"));
            } 
        break;    

        case 2:
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $pessoa->setId($_REQUEST['id']);
                $pessoa->setCpf($_REQUEST['cpf']);
                $pessoa->setNome($_REQUEST['nome']);
                $pessoaDao->update($pessoa);
                die(header("Location: http://".$_SERVER['HTTP_HOST']."/crud"));
            } 
        break;

        default:
            if($_SERVER['REQUEST_METHOD'] == "GET") {
                $id = explode("=", $_REQUEST['option'])[1];
                $pessoaDao->delete($id);        
                die(header("Location: http://".$_SERVER['HTTP_HOST']."/crud"));
            }
        break;
    }

} else {
    die(header("Location: http://".$_SERVER['HTTP_HOST']."/crud/login"));
}
