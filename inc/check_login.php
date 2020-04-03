<?php 
declare(strict_types=1);

session_start();
require_once "vendor/autoload.php";

$logar    = new App\Model\Logar();
$logarDao = new App\Model\LogarDaoMysql();